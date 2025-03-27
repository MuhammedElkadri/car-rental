<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File; 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarImage>
 */
class CarImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\CarImage::class;
     public function definition(): array
    {
        return [
            'car_id' => rand(1,Car::count()),
            'path' => 'images/imagesForCar/' . collect(File::files(public_path('images/imagesForCar')))->random()->getFilename()
        ];
    }
}
