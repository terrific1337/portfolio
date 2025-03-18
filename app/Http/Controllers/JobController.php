<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;
use Illuminate\Support\Facades\Storage;

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
            'status' => 'required|in:active,inactive,completed',
            'intern' => 'required|boolean',
            'contactperson' => 'nullable|string|max:255',
            'jobdescription' => 'nullable|string',
            'companysector' => 'nullable|string|max:255',
            'companywebsite' => 'nullable|string|max:255',
            'companylogo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('companylogo')) {
            $validated['companylogo'] = 'storage/' . $request->file('companylogo')->store('images', 'public');
        } else {
            // fallback if no file was uploaded
            $validated['companylogo'] = null;
        }

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
            'companywebsite' => $validated['companywebsite'] ?? null,
            'companylogo' => $validated['companylogo'],
        ]);

        return redirect()->route('dashboard.jobs')->with('success', 'Job added successfully!');
    }

    public function edit(Jobs $job)
    {
        return view('dashboard.jobs.edit',[
            'job' => $job,
            'pageTitle' => 'Edit Job',
        ]);
    }

   
    public function update(Request $request, Jobs $job)
    {
        $validated = $request->validate([
            'companyname' => 'required|string|max:255',
            'startdate' => 'required|date',
            'enddate' => 'required|date',
            'companydescription' => 'nullable|string',
            'location' => 'required|string|max:255',
            'jobtitle' => 'required|string|max:255',
            'status' => 'required|in:active,inactive,completed',
            'intern' => 'required|boolean',
            'contactperson' => 'nullable|string|max:255',
            'jobdescription' => 'nullable|string',
            'companysector' => 'nullable|string|max:255',
            'companywebsite' => 'nullable|string|max:255',
            'companylogo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Fill regular fields
        $job->companyname = $validated['companyname'];
        $job->startdate = $validated['startdate'];
        $job->enddate = $validated['enddate'];
        $job->companydescription = $validated['companydescription'] ?? null;
        $job->location = $validated['location'];
        $job->jobtitle = $validated['jobtitle'];
        $job->status = $validated['status'];
        $job->intern = $validated['intern'];
        $job->contactperson = $validated['contactperson'] ?? null;
        $job->jobdescription = $validated['jobdescription'] ?? null;
        $job->companysector = $validated['companysector'] ?? null;
        $job->companywebsite = $validated['companywebsite'] ?? null;
    
        // Handle logo update and delete previous one if a new file is uploaded
        if ($request->hasFile('companylogo')) {
            // Delete old logo if exists
            if ($job->companylogo && Storage::disk('public')->exists(str_replace('storage/', '', $job->companylogo))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $job->companylogo));
            }
    
            // Upload new logo
            $job->companylogo = 'storage/' . $request->file('companylogo')->store('images', 'public');
        }
    
        $job->save();
    
        return redirect()->route('dashboard.jobs')->with('success', 'Job updated successfully!');
    }
    

    public function destroy(Jobs $job)
    {
        // Delete the stored logo file if it exists
        if ($job->companylogo && Storage::disk('public')->exists(str_replace('storage/', '', $job->companylogo))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $job->companylogo));
        }
    
        // Delete the job record
        $job->delete();
    
        return redirect()->route('dashboard.jobs')->with('success', 'Job deleted successfully!');
    }    
}