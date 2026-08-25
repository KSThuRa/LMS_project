<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $instructor = User::create([
            'name' => "JamesBond",
            'email' => "james@email.com",
            'password' => Hash::make('321'),
        ]);

        $student = User::create([
            'name' => "David",
            'email' => "david@email.com",
            'password' => Hash::make('123'),
        ]);

        $instructor->assignRole('Instructor');
        $student->assignRole('Student');
    }
}
