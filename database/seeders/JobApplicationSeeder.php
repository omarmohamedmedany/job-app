<?php

namespace Database\Seeders;

use App\Models\JobApplication;
use App\Models\JobVacancy;
use App\Models\User;
use Illuminate\Database\Seeder;

class JobApplicationSeeder extends Seeder
{
    public function run(): void
    {
        $jobSeekers = User::where('role', 'job-seeker')->get();
        $vacancies = JobVacancy::all();
        $statuses = ['pending', 'accepted', 'rejected'];

        foreach ($jobSeekers as $seeker) {
            $randomVacancies = $vacancies->random(rand(1, 3));
            foreach ($randomVacancies as $vacancy) {
                JobApplication::create([
                    'user_id' => $seeker->id,
                    'job_vacancy_id' => $vacancy->id,
                    'status' => $statuses[array_rand($statuses)],
                    'score' => rand(60, 99),
                    'ai_feedback' => 'This candidate shows strong potential for the position.',
                ]);
            }
        }
    }
}