<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobVacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{
    public function index()
    {
        $applications = JobApplication::with(['jobVacancy.company'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('applications.index', compact('applications'));
    }

    public function create(JobVacancy $jobVacancy)
    {
        $jobVacancy->load('company');
        return view('applications.create', compact('jobVacancy'));
    }

    public function store(Request $request, JobVacancy $jobVacancy)
    {
        $request->validate([
            'resume' => 'required|file|mimes:pdf|max:2048',
        ]);

        $resumePath = $request->file('resume')->store('resumes', 'public');

        JobApplication::create([
            'user_id' => Auth::id(),
            'job_vacancy_id' => $jobVacancy->id,
            'resume_path' => $resumePath,
            'status' => 'pending',
        ]);

        return redirect()->route('applications.index')->with('success', 'Application submitted successfully!');
    }
}   