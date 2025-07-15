<?php

declare(strict_types=1);

namespace App\Modules\Order\Database\Factories;

use App\Modules\Customer\Models\Customer;
use App\Modules\Order\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'customer_id' => Customer::factory()->create()->id,
            'order_date' => now(),
            'status' => $this->faker->sentence,
        ];
    }
}
