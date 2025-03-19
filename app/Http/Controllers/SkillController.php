<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::with('skill')->get();
        $pageTitle = 'Skills';
        return view('pages.skills', compact('categories', 'pageTitle'));
    }

    public function show($id)
    {
        $skill = Skill::findOrFail($id);
        $pageTitle = $skill->name;
        return view('pages.skills-show', compact('skill', 'pageTitle'));
    }

    public function dashboardIndex()
    {
        $skills = Skill::with('category')->get();
        $categories = \App\Models\Category::with('skill')->get();

        return view('dashboard.skills.index', [
            'skills' => $skills,
            'categories' => $categories,
            'pageTitle' => 'Manage Skills & Categories',
        ]);
    }

    public function create()
    {
        $categories = \App\Models\Category::all();

        return view('dashboard.skills.create', [
            'pageTitle' => 'Add New Skill',
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
        ]);

        // Handle icon upload
        if ($request->hasFile('icon')) {
            $iconPath = 'storage/' . $request->file('icon')->store('images', 'public');
        } else {
            $iconPath = null;
        }

        // Create skill
        $skill = Skill::create([
            'name' => $validated['name'],
            'icon' => $iconPath,
        ]);

        // Attach categories
        $skill->category()->sync($validated['categories'] ?? []);

        return redirect()->route('dashboard.skills')->with('success', 'Skill created successfully!');
    }

    public function edit(Skill $skill)
    {
        $categories = \App\Models\Category::all();

        return view('dashboard.skills.edit', [
            'pageTitle' => 'Edit Skill',
            'skill' => $skill,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
        ]);

        if ($request->hasFile('icon')) {
            if ($skill->icon && Storage::disk('public')->exists(str_replace('storage/', '', $skill->icon))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $skill->icon));
            }

            $iconPath = 'storage/' . $request->file('icon')->store('images', 'public');
        } else {
            $iconPath = $skill->icon; // keep old icon if not changed
        }

        $skill->update([
            'name' => $validated['name'],
            'icon' => $iconPath, // ✅ <--- THIS is the fix
        ]);

        $skill->category()->sync($validated['categories'] ?? []);

        return redirect()->route('dashboard.skills')->with('success', 'Skill updated successfully!');
    }

    public function destroy(Skill $skill)
    {
        if ($skill->icon && Storage::disk('public')->exists(str_replace('storage/', '', $skill->icon))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $skill->icon));
        }

        $skill->category()->detach();
        $skill->delete();

        return redirect()->route('dashboard.skills')->with('success', 'Skill deleted successfully!');
    }
    
    public function addCategory()
    {
        $skills = \App\Models\Skill::all();

        return view('dashboard.skills.add-category', [
            'pageTitle' => 'Add New Category',
            'skills' => $skills
        ]);
    }

    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'skills' => 'array',
            'skills.*' => 'exists:skills,id',
        ]);

        $category = \App\Models\Category::create([
            'name' => $validated['name']
        ]);

        $category->skill()->sync($validated['skills'] ?? []);
        
        return redirect()->route('dashboard.skills')->with('success', 'Category created successfully!');
    }

    public function editCategory(\App\Models\Category $category)
    {
        $skills = \App\Models\Skill::all();

        return view('dashboard.skills.edit-category', [
            'pageTitle' => 'Edit Category',
            'category' => $category,
            'skills' => $skills
        ]);
    }

    public function updateCategory(Request $request, \App\Models\Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'skills' => 'array',
            'skills.*' => 'exists:skills,id',
        ]);

        $category->update([
            'name' => $validated['name']
        ]);

        $category->skill()->sync($validated['skills'] ?? []);

        return redirect()->route('dashboard.skills')->with('success', 'Category updated successfully!');
    }

    public function destroyCategory(\App\Models\Category $category)
    {
        $category->skill()->detach();
        $category->delete();

        return redirect()->route('dashboard.skills')->with('success', 'Category deleted successfully!');
    }
}
