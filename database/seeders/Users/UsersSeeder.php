<?php

namespace Database\Seeders\Users;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // إنشاء المستخدمين

        $admin = User::firstOrCreate([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);
        $admin->assignRole('admin');

         $owner = User::firstOrCreate([
             'name' => 'Car Owner',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);
        $owner->assignRole('car owner');

        $renter = User::firstOrCreate([
            'name' => 'Renter',
            'email' => 'renter@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);
        // $renter->assignRole('renter');

       
    }
}
