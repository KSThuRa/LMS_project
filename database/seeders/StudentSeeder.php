<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '09123456789',
        ]);

        Student::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'phone' => '09234567890',
        ]);

        Student::create([
            'name' => 'Michael Brown',
            'email' => 'michael@example.com',
            'phone' => '09345678901',
        ]);

        Student::create([
            'name' => 'Emily Johnson',
            'email' => 'emily@example.com',
            'phone' => '09456789012',
        ]);

        Student::create([
            'name' => 'David Wilson',
            'email' => 'david@example.com',
            'phone' => '09567890123',
        ]);
    }
}
