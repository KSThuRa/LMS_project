<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
         $this->call([
        PermissionSeeder::class,
        RoleSeeder::class,
    ]);
    
        $admin = Role::firstOrCreate([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);

        $permissions = Permission::all();

        $admin->syncPermissions($permissions);
    }
}
