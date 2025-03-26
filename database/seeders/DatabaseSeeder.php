<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Car;
use Illuminate\Database\Seeder;
use Database\Seeders\Permissions\PermissionsSeeder;
use Database\Seeders\Permissions\RolesSeeder;
use Database\Seeders\Users\UsersSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionsSeeder::class,
            RolesSeeder::class,
            UsersSeeder::class,
        ]);

        Car::factory()->count(50)->create();
    }
}
