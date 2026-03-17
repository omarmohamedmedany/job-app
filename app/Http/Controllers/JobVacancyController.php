<?php

namespace App\Http\Controllers;

use App\Models\JobVacancy;

class JobVacancyController extends Controller
{
    public function show(JobVacancy $jobVacancy)
    {
        $jobVacancy->load(['company', 'jobCategory']);
        return view('jobs.show', compact('jobVacancy'));
    }
}