<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
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
        $testimonials = Testimonial::all();
        $pageTitle = "Testimonials";
        return view('pages.testimonials', compact('testimonials', 'pageTitle'));
    }

    public function dashboardIndex()
    {
        $testimonials = Testimonial::all();
        
        return view('dashboard.testimonials.index', [
            'testimonials' => $testimonials,
            'pageTitle' => 'Manage Testimonials',
        ]);
    }

    public function create()
    {
        return view('dashboard.testimonials.create', ['pageTitle' => 'Add New Testimonial']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = 'storage/' . $request->file('photo')->store('images', 'public');
        } else {
            $validated['photo'] = null;
        }
        
        \App\Models\Testimonial::create([
            'name' => $validated['name'],
            'title' => $validated['title'],
            'content' => $validated['content'] ?? null,
            'photo' => $validated['photo'],
        ]);

        return redirect()->route('dashboard.testimonials')->with('success', 'Testimonial added successfully!');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('dashboard.testimonials.edit',[
            'testimonial' => $testimonial,
            'pageTitle' => 'Edit Testimonial',
        ]);
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $testimonial->name = $validated['name'];
        $testimonial->title = $validated['title'];
        $testimonial->content = $validated['content'] ?? null;
    
        if ($request->hasFile('photo')) {
            if ($testimonial->photo && Storage::disk('public')->exists(str_replace('storage/', '', $testimonial->photo))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $testimonial->photo));
            }

            $testimonial->photo = 'storage/' . $request->file('photo')->store('images', 'public');
        }

        $testimonial->save();

        return redirect()->route('dashboard.testimonials')->with('success', 'Testimonial updated successfully!');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->photo && Storage::disk('public')->exists(str_replace('storage/', '', $testimonial->photo))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $testimonial->photo));
        }

        $testimonial->delete();

        return redirect()->route('dashboard.testimonials')->with('success', 'Testimonial deleted successfully!');
    }
}
