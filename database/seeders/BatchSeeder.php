<?php

namespace Database\Seeders;

use App\Models\Batch;
use Illuminate\Database\Seeder;

class BatchSeeder extends Seeder
{
   public function run(): void
    {
        Batch::create([
            'name' => 'Laravel Batch 1',
            'description' => 'Beginner Laravel training batch',
        ]);

        Batch::create([
            'name' => 'Laravel Batch 2',
            'description' => 'Intermediate Laravel training batch',
        ]);

        Batch::create([
            'name' => 'Laravel Batch 3',
            'description' => 'Advanced Laravel training batch',
        ]);
 }
}
