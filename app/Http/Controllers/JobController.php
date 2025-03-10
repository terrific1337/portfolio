<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;

class JobController extends Controller
{
    public function index()
    {
    $jobs = Jobs::all();
    $pageTitle = 'Jobs';
    return view('pages.jobs', compact('jobs', 'pageTitle'));
    }

    public function show($id)
    {
        $job = Jobs::findOrFail($id); // Get job by ID, or return 404 if not found
        $pageTitle = $job->companyname;
        return view('pages.jobs-show', compact('job', 'pageTitle'));
    }
}