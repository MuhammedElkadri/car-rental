<?php

namespace Database\Seeders\Permissions;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    public function run() 
    {
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->syncPermissions(Permission::pluck('name')->toArray());

        $carOwner = Role::firstOrCreate(['name' => 'car owner']);
        $carOwner->syncPermissions(['cars.create', 'cars.edit', 'cars.delete']);

        
 
        


   
    }
}
