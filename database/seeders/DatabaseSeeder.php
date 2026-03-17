<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            JobCategorySeeder::class,
            CompanySeeder::class,
            JobVacancySeeder::class,
            JobApplicationSeeder::class,
        ]);
    }
}