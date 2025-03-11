<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        // Load projects with their related tags, ordered by the 'order' column
        $projects = Project::with('tags')->orderBy('order')->get();
        $pageTitle = 'Projects';
        // Return view and pass the $projects variable to it
        return view('pages.projects', compact('projects', 'pageTitle'));
    }
}