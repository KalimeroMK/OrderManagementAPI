<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Modules\Customer\Models\Customer;
use App\Modules\Order\Models\Order;
use App\Modules\Product\Models\Product;
use App\Modules\SpecialDay\Models\SpecialDay;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderDiscountsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_applies_all_discounts_correctly()
    {
        // Seed a special day
        $specialDay = SpecialDay::create(['date' => Carbon::today()->toDateString()]);

        // Create a customer with 6 previous orders
        $customer = Customer::factory()->create();
        Order::factory()->count(6)->create(['customer_id' => $customer->id]);

        // Create products
        $productA = Product::factory()->create(['price' => 120]);
        $productB = Product::factory()->create(['price' => 40]);

        // Create a new order on the special day
        $order = Order::factory()->create([
            'customer_id' => $customer->id,
            'order_date' => Carbon::today()->toDateString(),
        ]);
        $order->products()->attach($productA->id, ['quantity' => 1]);
        $order->products()->attach($productB->id, ['quantity' => 1]);

        // Call the API or action that calculates discounts
        $response = $this->getJson("/api/v1/orders/{$order->id}");
        $response->assertOk();
        $result = $response->json();

        $this->assertEquals(160, $result['subtotal']);
        $this->assertCount(3, $result['discounts']);
        $this->assertEqualsWithDelta(104, $result['total'], 0.01); // 160 - 16 - 8 - 32
        $this->assertEquals('Order > 100€', $result['discounts'][0]['name']);
        $this->assertEquals(16, $result['discounts'][0]['amount']);
        $this->assertEquals('Loyalty', $result['discounts'][1]['name']);
        $this->assertEquals(8, $result['discounts'][1]['amount']);
        $this->assertEquals('Special Day', $result['discounts'][2]['name']);
        $this->assertEqualsWithDelta(32, $result['discounts'][2]['amount'], 0.01);
    }

    /** @test */
    public function it_applies_bulk_discount_rule()
    {
        // Create a customer
        $customer = Customer::factory()->create();

        // Create a product
        $product = Product::factory()->create(['price' => 50]);

        // Create a new order
        $order = Order::factory()->create([
            'customer_id' => $customer->id,
            'order_date' => now()->toDateString(),
        ]);
        $order->products()->attach($product->id, ['quantity' => 3]);

        // Call the API or action that calculates discounts
        $response = $this->getJson("/api/v1/orders/{$order->id}");
        $response->assertOk();
        $result = $response->json();

        $this->assertEquals(150, $result['subtotal']);
        $this->assertTrue(collect($result['discounts'])->contains(fn ($d) => $d['name'] === 'Bulk Product'));
    }

    /** @test */
    public function it_does_not_apply_discounts_if_not_eligible()
    {
        $customer = Customer::factory()->create();
        $product = Product::factory()->create(['price' => 20]);
        $order = Order::factory()->create([
            'customer_id' => $customer->id,
            'order_date' => now()->toDateString(),
        ]);
        $order->products()->attach($product->id, ['quantity' => 1]);

        $response = $this->getJson("/api/v1/orders/{$order->id}");
        $response->assertOk();
        $result = $response->json();

        $this->assertEquals(20, $result['subtotal']);
        $this->assertEmpty($result['discounts']);
        $this->assertEquals(20, $result['total']);
    }
}
