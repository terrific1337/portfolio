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
        $testimonials = Testimonial::OrderBy('id')->get();
        $pageTitle = "Testimonial";
        return view('pages.testimonials', compact('testimonials', 'pageTitle'));
    }
}
