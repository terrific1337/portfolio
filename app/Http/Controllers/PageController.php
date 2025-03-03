<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages/home', ['pageTitle' => 'Home']);
    }

    // public function contact()
    // {
    //     return view('pages/contact', ['pageTitle' => 'Contact']);
    // }

    // public function aboutme()
    // {
    //     return view('pages/aboutme', ['pageTitle' => 'About Me']);
    // }

    // public function projects()
    // {
    //     return view('pages/projects', ['pageTitle' => 'Projects']);
    // }

    // public function jobs()
    // {
    //     return view('pages/jobs', ['pageTitle' => 'Jobs']);
    // }

    public function show($page) 
    {
        $normalizedPage = strtolower($page); // Convert input to lowercase
        $validPages = ['home', 'contact', 'aboutme', 'projects', 'jobs', 'skills', 'login', '']; // Allowed pages

        if (!in_array($normalizedPage, $validPages)) {
            abort(404); // Return 404 if not a valid page
        }

        return view("pages.$normalizedPage", ['pageTitle' => ucfirst($normalizedPage)]);
    }

}
