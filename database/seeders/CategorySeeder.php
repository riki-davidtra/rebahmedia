<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'YouTube'],
            ['name' => 'Tutorial'],
            ['name' => 'Backend Development'],
            ['name' => 'Frontend Development'],
            ['name' => 'API & Integration'],
            ['name' => 'Database'],
            ['name' => 'DevOps'],
            ['name' => 'Tips & Tricks'],
            ['name' => 'Optimization'],
        ];

        foreach ($data as $item) {
            Category::updateOrCreate(
                ['name' => $item['name']],
                [
                    'name'      => $item['name'],
                    'is_active' => true,
                ]
            );
        }
    }
}
