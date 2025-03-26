<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\Permissions\PermissionsSeeder;
use Database\Seeders\Permissions\RolesSeeder;
use Database\Seeders\Users\UsersSeeder;
use Database\Seeders\cars\CarDataSeeder;

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
            CarDataSeeder::class,
        ]);
    }
}
