<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{

    public function definition(): array
    {
        return [
            'price' => fake()->numberBetween(0,1000),
            'title' => fake()->name,
            'brand_id' => Brand::factory()->create()->id,
            'user_id' => User::factory()->create()->id,
        ];
    }
}
