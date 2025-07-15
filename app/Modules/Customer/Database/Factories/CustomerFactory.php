<?php

declare(strict_types=1);

namespace App\Modules\Customer\Database\Factories;

use App\Modules\Customer\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Customer>
 */
class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'email' => $this->faker->sentence,
        ];
    }
}
