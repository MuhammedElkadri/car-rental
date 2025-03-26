<?php

namespace Database\Seeders\cars;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\CarImage;
use App\Models\Review;

class CarDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إنشاء 5 سيارات
        Car::factory()->count(5)->create()->each(function ($car) {
            // إنشاء 10 صور لكل سيارة
            CarImage::factory()->count(7)->create([
                'car_id' => $car->id
            ]);
            
            // إنشاء 10 تقييمات لكل سيارة
            Review::factory()->count(10)->create([
                'car_id' => $car->id
            ]);
        });
    }
}
