<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\JobCategory;
use App\Models\JobVacancy;
use Illuminate\Database\Seeder;

class JobVacancySeeder extends Seeder
{
    public function run(): void
    {
        $companies = Company::all();
        $categories = JobCategory::all();

        $vacancies = [
            ['title' => 'Cloud Engineer', 'location' => 'Singapore', 'type' => 'Full-Time', 'salary' => 130000],
            ['title' => 'Cloud Engineer', 'location' => 'Remote', 'type' => 'Remote', 'salary' => 135000],
            ['title' => 'Software Architect', 'location' => 'San Francisco, CA', 'type' => 'Full-Time', 'salary' => 190000],
            ['title' => 'Mobile Developer', 'location' => 'New York, NY', 'type' => 'Hybrid', 'salary' => 95000],
            ['title' => 'Backend Developer', 'location' => 'Berlin, Germany', 'type' => 'Full-Time', 'salary' => 95000],
            ['title' => 'Full Stack Developer', 'location' => 'Amsterdam, Netherlands', 'type' => 'Hybrid', 'salary' => 110000],
            ['title' => 'Senior Frontend Developer', 'location' => 'London, UK', 'type' => 'Full-Time', 'salary' => 145000],
            ['title' => 'Senior Mobile Developer', 'location' => 'Berlin, Germany', 'type' => 'Full-Time', 'salary' => 140000],
            ['title' => 'Frontend Developer', 'location' => 'Amsterdam, Netherlands', 'type' => 'Hybrid', 'salary' => 85000],
            ['title' => 'Backend Developer', 'location' => 'Toronto, Canada', 'type' => 'Hybrid', 'salary' => 90000],
        ];

        foreach ($vacancies as $index => $vacancy) {
            JobVacancy::create(array_merge($vacancy, [
                'description' => 'We are looking for a talented ' . $vacancy['title'] . ' to join our team.',
                'company_id' => $companies[$index % count($companies)]->id,
                'job_category_id' => $categories[$index % count($categories)]->id,
            ]));
        }
    }
}