<?php

namespace Database\Seeders;

use App\Models\Instructor;
use Illuminate\Database\Seeder;

class InstructorSeeder extends Seeder
{
    public function run(): void
    {
        Instructor::create([
            'name' => 'John Smith',
            'email' => 'john@example.com',
            'phone' => '09123456789',
        ]);

        Instructor::create([
            'name' => 'Sarah Johnson',
            'email' => 'sarah@example.com',
            'phone' => '09876543210',
        ]);

        Instructor::create([
            'name' => 'David Brown',
            'email' => 'david@example.com',
            'phone' => '09234567890',
        ]);

        Instructor::create([
            'name' => 'Emily Wilson',
            'email' => 'emily@example.com',
            'phone' => '09345678901',
        ]);
    }
}
