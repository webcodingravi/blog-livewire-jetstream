<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Laravel'],
            ['name' => 'PHP'],
            ['name' => 'Livewire'],
            ['name' => 'Frontend'],
            ['name' => 'Backend'],
            ['name' => 'API Development'],
            ['name' => 'Database'],
            ['name' => 'DevOps'],
            ['name' => 'UI/UX'],
            ['name' => 'Debugging'],
            ['name' => 'Tips & Tricks'],
            ['name' => 'Project'],
            ['name' => 'Beginner Guide'],
            ['name' => 'Advanced Tutorials'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['slug' => Str::slug($category['name'])],
                [
                    'name' => $category['name'],
                    'slug' => Str::slug($category['name']),
                ]
            );
        }
    }
}
