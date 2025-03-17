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
        'license_plate' => strtoupper($this->faker->unique()->bothify('??###??')), // مثال: AB123CD
        'brand' => $this->faker->company,
        'model' => $this->faker->word,
        'color' => $this->faker->safeColorName,
        'year' => $this->faker->numberBetween(2000, 2024),
        'price_per_hour' => $this->faker->randomFloat(2, 5, 50),
        'price_per_day' => $this->faker->randomFloat(2, 20, 200),
        'price_per_month' => $this->faker->randomFloat(2, 500, 3000),
        'mileage' => $this->faker->numberBetween(1000, 200000),
        'transmission' => $this->faker->randomElement(['manual', 'automatic']),
        'seats' => $this->faker->numberBetween(2, 7),
        'luggage_capacity' => $this->faker->numberBetween(1, 5),
        'fuel' => $this->faker->randomElement(['petrol', 'diesel', 'electric', 'hybrid']),
        'fuel_efficiency' => $this->faker->randomFloat(2, 5, 20),
        'location' => $this->faker->city,
        'latitude' => $this->faker->latitude,
        'longitude' => $this->faker->longitude,
        'description' => $this->faker->paragraphs(6,true),
        
        // Features
        'sunroof' => $this->faker->boolean,
        'air_conditioning' => $this->faker->boolean,
        'child_seat' => $this->faker->boolean,
        'gps' => $this->faker->boolean,
        'usb_ports' => $this->faker->boolean,
        'ABS' => $this->faker->boolean,
        'rear_view_camera' => $this->faker->boolean,
        'entertainment_system' => $this->faker->boolean,
        'bluetooth' => $this->faker->boolean,
        'onboard_computer' => $this->faker->boolean,
        'audio_input' => $this->faker->boolean,
        'remote_central_locking' => $this->faker->boolean,
        'parking_sensors' => $this->faker->boolean,
        'music' => $this->faker->boolean,
        'car_kit' => $this->faker->boolean,
        
        // Status
        'status' => $this->faker->randomElement(['available', 'rented', 'maintenance', 'unavailable']),
        'insurance_status' => $this->faker->randomElement(['valid', 'expired', 'pending']),
        'damage_status' => $this->faker->optional()->sentence,
        
        // Availability
        'availability_from' => $this->faker->date,
        'availability_to' => $this->faker->optional()->date,
        
        // Relations
        'user_id' =>rand(1,User::count()), 
    ];
}
}
