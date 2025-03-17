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

    public function dashboardIndex()
    {
        // Admin dashboard project list
        $jobs = Jobs::all();

        return view('dashboard.jobs.index', [
            'jobs' => $jobs,
            'pageTitle' => 'Manage Jobs'
        ]);
    }

    public function create()
    {
        return view('dashboard.jobs.create', ['pageTitle' => 'Add New Job']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'companyname' => 'required|string|max:255',
            'startdate' => 'required|date',
            'enddate' => 'required|date',
            'companydescription' => 'nullable|string',
            'location' => 'required|string|max:255',
            'jobtitle' => 'required|string|max:255',
            'status' => 'required|in:active,anactive,completed',
            'intern' => 'required|boolean',
            'contactperson' => 'nullable|string|max:255',
            'jobdescription' => 'nullable|string',
            'companysector' => 'nullable|string|max:255',
            'companywebsite' => 'nullable|string|max:255',
            'companylogo' => 'nullable|string|max:255',
        ]);

        \App\Models\Jobs::create([
            'companyname' => $validated['companyname'],
            'startdate' => $validated['startdate'],
            'enddate' => $validated['enddate'],
            'companydescription' => $validated['companydescription'] ?? null,
            'location' => $validated['location'],
            'jobtitle' => $validated['jobtitle'],
            'status' => $validated['status'],
            'intern' => $validated['intern'],
            'contactperson' => $validated['contactperson'] ?? null,
            'jobdescription' => $validated['jobdescription'] ?? null,
            'companysector' => $validated['companysector'] ?? null,
            'companywebsite' => $validated['company website'] ?? null,
            'companylogo' => $validated['companylogo'] ?? null,
        ]);

        return redirect()->route('dashboard.jobs')->with('success', 'Job added successfully!');
    }
}