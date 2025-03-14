<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // Public page - Load projects with their related tags, ordered by the 'order' column
        $projects = Project::with('tags')->orderBy('order')->get();
        $pageTitle = 'Projects';

        return view('pages.projects', compact('projects', 'pageTitle'));
    }

    public function dashboardIndex()
    {
        // Admin dashboard project list
        $projects = Project::all();

        return view('dashboard.projects.index', [
            'projects' => $projects,
            'pageTitle' => 'Manage Projects'
        ]);
    }
}
