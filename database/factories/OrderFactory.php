<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Customer\Models\Customer;
use App\Modules\Order\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'customer_id' => Customer::factory(),
            'order_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['pending', 'completed']),
        ];
    }
}
