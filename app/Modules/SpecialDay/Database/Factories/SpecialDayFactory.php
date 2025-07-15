<?php

declare(strict_types=1);

namespace App\Modules\SpecialDay\Database\Factories;

use App\Modules\SpecialDay\Models\SpecialDay;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpecialDayFactory extends Factory
{
    protected $model = SpecialDay::class;

    public function definition(): array
    {
        return [
            'date' => $this->faker->unique()->date(),
        ];
    }
}
