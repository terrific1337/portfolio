<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        if (in_array(request()->route()->getActionMethod(), ['index'])) {
            return;
        }
    
        if (!Auth::check() || Auth::user()->level !== 5) {
            abort(403, 'Unauthorized');
        }
    }
    
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
        $tags = \App\Models\Tag::with('projects')->get();

        return view('dashboard.projects.index', [
            'projects' => $projects,
            'tags' => $tags,
            'pageTitle' => 'Manage Projects'
        ]);
    }

    public function create()
    {
        $projects = \App\Models\Project::all();
        $tags = \App\Models\Tag::all();
    
        return view('dashboard.projects.create', [
            'pageTitle' => 'Add New Project',
            'projects' => $projects,
            'tags' => $tags,
        ]);
    }
    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'repo' => 'nullable|string|max:255',
            'screenshot' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'demo' => 'nullable|string|max:255',
            'status' => 'required|in:planned,in-progress,completed',
            'category' => 'required|in:personal,school,work',
            'tags' => 'array',
            'tags' => 'exists:tags,id',
        ]);

        if ($request->hasFile('screenshot')) {
            $screenshotPath = 'storage/' . $request->file('screenshot')->store('images', 'public');
        } else {
            $screenshotPath = null;
        }

        $project = Project::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'repo' => $validated['repo'] ?? null,
            'demo' => $validated['demo'] ?? null,
            'screenshot' => $screenshotPath,
            'status' => $validated['status'],
            'category' => $validated['category'],
        ]);        

        $project->tags()->sync($validated['tags'] ?? []);

        return redirect()->route('dashboard.projects')->with('success', 'Project created successfully!');
    }

    public function edit(Project $project)
    {
        $tags = \App\Models\Tag::all();

        return view('dashboard.projects.edit', [
            'pageTitle' => 'Edit Project',
            'project' => $project,
            'tags' => $tags,
        ]);
    }
    
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'repo' => 'nullable|string|max:255',
            'screenshot' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'demo' => 'nullable|string|max:255',
            'status' => 'required|in:planned,in-progress,completed',
            'category' => 'required|in:personal,school,work',
            'tags' => 'array',
            'tags' => 'exists:tags,id',
        ]);
        
        if ($request->hasfile('screenshot')) {
            if ($project->screenshot && Storage::disk('public')->exists(str_replace('storage/', '', $project->screenshot))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $project->screenshot));
            }

            $screenshotPath = 'storage/' . $request->file('screenshot')->store('images', 'public');
        } else {
            $screenshotPath = $project->screenshot;
        }
        
        $project->update([
            'name' => $validated['name'],
            'screenshot' => $screenshotPath,
        ]);
        
        $project->tags()->sync($validated['tags'] ?? []);
        
        return redirect()->route('dashboard.projects')->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        if ($project->screenshot && Storage::disk('public')->exists(str_replace('storage/', '', $project->screenshot))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $project->screenshot));
        }
        
        $project->tags()->detach();
        $project->delete();

        return redirect()->route('dashboard.projects')->with('success', 'Project deleted successfully!');
    }

    public function addTag()
    {
        $projects = \App\Models\Project::all();

        return view('dashboard.projects.add-tag', [
            'pageTitle' => 'Add New Tag',
            'projects' => $projects
        ]);
    }

    public function storeTag(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'projects' => 'array',
            'projects.*' => 'exists:projects,id',
        ]);

        $tag = \App\Models\Tag::create([
            'name' => $validated['name']
        ]);
        
        $tag->projects()->sync($validated['projects'] ?? []);

        return redirect()->route('dashboard.projects')->with('success', 'Tag created successfully');
    }

    public function editTag(\App\Models\Tag $tag)
    {
        $projects = \App\Models\Project::all();
        
        return view('dashboard.projects.edit-tag' , [
            'pageTitle' => 'Edit Tag',
            'tag' => $tag,
            'projects' => $projects,
        ]);
    }

    public function updateTag(Request $request, \App\Models\Tag $tag)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'projects' => 'array',
            'projects.*' => 'exists:projects,id',
        ]);

        $tag->update([
            'name' => $validated['name']
        ]);

        $tag->projects()->sync($validated['projects'] ?? []);

        return redirect()->route('dashboard.projects')->with('success', 'Tag updated successfully!');
    }

    public function destroyTag(\App\Models\Tag $tag)
    {
        $tag->projects()->detach();
        $tag->delete();

        return redirect()->route('dashboard.projects')->with('success', 'Tag deleted successfully!');
    }
}
