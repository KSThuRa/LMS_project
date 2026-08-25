<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        $admin = Role::create(['name' => 'admin']);


        $admin->givePermissionTo([
            'view users',
            'create users',
            'edit users',
            'delete users',
        ]);
         $permissions = [
            'view users',
            'create users',
            'edit users',
            'delete users',

            'view roles',
            'create roles',
            'edit roles',
            'delete roles',

            'view permissions',
            'create permissions',
            'edit permissions',
            'delete permissions',

            'view batches',
            'create batches',
            'edit batches',
            'delete batches',

            'view students',
            'create students',
            'edit students',
            'delete students',
        ];

        foreach ($permissions as $permission) {

            Permission::create_function([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
    }
}
}
