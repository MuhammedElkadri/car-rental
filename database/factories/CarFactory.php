<?php

namespace Database\Factories;

use File;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Car::class;
    
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'brand' => fake()->company(),
            'model' => fake()->word(),
            'year' => fake()->year(),
            'price_per_hour' => fake()->numberBetween(10, 100),
            'price_per_day' => fake()->numberBetween(100, 1000),
            'price_per_month' => fake()->numberBetween(1000, 10000),
            'status' => fake()->randomElement(['available', 'rented', 'unavailable']),
            'description' => fake()->sentence(),
            'user_id' =>User::factory(), 
               ];
    }
}
