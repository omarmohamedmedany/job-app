<?php

namespace Database\Seeders;

use App\Models\JobCategory;
use Illuminate\Database\Seeder;

class JobCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Frontend Development',
            'Backend Development',
            'Full Stack Development',
            'DevOps Engineering',
            'Mobile Development',
            'Cloud Engineering',
            'Software Architecture',
        ];

        foreach ($categories as $category) {
            JobCategory::create(['name' => $category]);
        }
    }
}