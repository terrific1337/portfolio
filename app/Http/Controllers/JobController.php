<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;

class JobController extends Controller
{
    public function index()
    {
    $jobs = Jobs::all();
    return view('jobs.index', compact('jobs'));
    }

    public function show($id)
    {
        $job = Jobs::findOrFail($id); // Get job by ID, or return 404 if not found
        return view('pages.jobs-show', compact('job'));
    }
}