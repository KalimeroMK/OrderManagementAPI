<?php

declare(strict_types=1);

namespace Tests\Feature\Modules\Order;

use App\Modules\Customer\Models\Customer;
use App\Modules\Order\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_ok()
    {
        $response = $this->getJson('/api/v1/orders');
        $response->assertOk();
    }

    public function test_store_creates_resource()
    {
        $related = $this->createRelatedModels();

        $data = array_merge([
            'order_date' => '2025-12-25',
            'status' => 'test',
        ], $related);

        $response = $this->postJson('/api/v1/orders', $data);
        $response->assertCreated();
    }

    public function test_show_returns_resource()
    {
        $model = Order::factory()->create();
        $response = $this->getJson("/api/v1/orders/{$model->id}");
        $response->assertOk();
    }

    public function test_update_modifies_resource()
    {
        $model = Order::factory()->create();

        $data = array_merge([
            'order_date' => '2025-12-31',
            'status' => 'test',
        ], $this->createRelatedModels());

        $response = $this->putJson("/api/v1/orders/{$model->id}", $data);
        $response->assertOk();
    }

    public function test_destroy_deletes_resource()
    {
        $model = Order::factory()->create();
        $response = $this->deleteJson("/api/v1/orders/{$model->id}");
        $response->assertNoContent();
    }

    protected function createRelatedModels(): array
    {
        // This will be replaced dynamically
        return [
            'customer_id' => Customer::factory()->create()->id,
        ];
    }
}
