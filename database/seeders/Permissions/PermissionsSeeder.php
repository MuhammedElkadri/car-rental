<?php

namespace Database\Seeders\Permissions;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            // User Management
            'view.dashboard',
            'edit.users',
        
            // Car Management
            'cars.create',
            'cars.edit',
            'cars.delete',
        
            // Bookings & Rentals
            'booking.rent',
            'booking.cancel',
            'booking.view.own',
        
        
            // Reviews & Ratings
            'reviews.leave',
            'reviews.delete',
        
            // Reports & Analytics
            'reports.view',
        
            // Permissions Management
            'permissions.create',
            'permissions.update',
            'permissions.delete',
            'permissions.view',
        
            // Roles Management
            'roles.create',
            'roles.update',
            'roles.delete',
            'roles.view',
        ];
        

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
