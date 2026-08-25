<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $categories = [
            [
                
                'name' => 'PHP',
            ],
            [

                'name' => 'Laravel',
            ],
            [

                'name' => 'ReactJS',
            ],
            [

                'name' => 'NextJS',
            ],
        ];

        foreach ($categories as $data) {
            Category::create($data);
        }
    }
}
