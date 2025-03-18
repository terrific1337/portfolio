<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutMe;
use Illuminate\Support\Facades\Storage;

class AboutMeController extends Controller
{
    public function  index()
    {
        $aboutmes = AboutMe::orderBy('id')->get();
        $pageTitle = "About Me";
        return view('pages.aboutme', compact('aboutmes', 'pageTitle'));
    }

    public function dashboardIndex()
    {
        $aboutmes = AboutMe::all();

        return view('dashboard.aboutme.index', [
            'aboutmes' => $aboutmes,
            'pageTitle' => 'Manage About Me'
        ]);
    }

    public function create()
    {
        return view('dashboard.aboutme.create', ['pageTitle' => 'Add New About Me']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'text' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = 'storage/' . $request->file('image')->store('images', 'public');
        }   else {
            $validated['image'] = null;
        }

        \App\Models\AboutMe::create([
            'name' => $validated['name'],
            'text' => $validated['text'],
            'image' => $validated['image'],
        ]);

        return redirect()->route('dashboard.aboutme')->with('success', 'Section added successfully!');
    }

    public function edit(AboutMe $aboutme)
    {
        return view('dashboard.aboutme.edit',[
            'aboutme' => $aboutme,
            'pageTitle' => 'Edit About Me',
        ]);
    }

    public function update(Request $request, AboutMe $aboutme)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'text' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $aboutme->name = $validated['name'];
        $aboutme->text = $validated['text'] ?? null;
        
        if ($request->hasFile('image')) {
            if ($aboutme->image && Storage::disk('public')->exists(str_replace('storage/', '', $aboutme->image))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $aboutme->image));
            }

            $aboutme->image = 'storage/' . $request->file('image')->store('images', 'public');
        }

        $aboutme->save();

        return redirect()->route('dashboard.aboutme')->with('success', 'Section updated successfully!');
    }

    public function destroy(AboutMe $aboutme)
    {
        if ($aboutme->image && Storage::disk('public')->exists(str_replace('storage/', '', $aboutme->image))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $aboutme->image));
        }

        $aboutme->delete();
  
        return redirect()->route('dashboard.aboutme')->with('success', 'Section deleted successfully!');
    }
}
