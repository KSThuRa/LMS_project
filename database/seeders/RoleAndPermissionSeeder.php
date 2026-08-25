<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{

    public function run(): void
    {
      $instructor = Role::create(['name' => "Instructor"]);
      $student = Role::create(['name' => "Student"]);

      //Batch Permission
      $batchList = Permission::create(['name' => 'batchList']);
      $batchCreate = Permission::create(['name' => 'batchCreate']);
      $batchUpdate = Permission::create(['name' => 'batchUpdate']);
      $batchDelete = Permission::create(['name' => 'batchDelete']);


      //Instructor
      $instructorList = Permission::create(['name' => 'instructorList']);
      $instructorCreate = Permission::create(['name' => 'instructorCreate']);
      $instructorUpdate = Permission::create(['name' => 'instructorUpdate']);
      $instructorDelete = Permission::create(['name' => 'instructorDelete']);

      $instructor->givePermissionTo([
        $batchList,
        $batchCreate,
        $batchUpdate,
        $batchDelete,

        $instructorCreate,
        $instructorList,
        $instructorDelete,
        $instructorUpdate,
      ]);

      $student->givePermissionTo([
        $batchList,

        $instructorList,
      ]);

    }
}
