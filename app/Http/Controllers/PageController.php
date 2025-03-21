<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($page) 
    {
        $normalizedPage = strtolower(str_replace(['-', ' '], '', $page ?: 'home'));
        
        $validPages = ['home', 'contact', 'aboutme', 'projects', 'jobs', 'skills', 'testimonials', 'login'];

        if (!in_array($normalizedPage, $validPages)) {
            abort(404);
        }

        $pageTitles = [
            'aboutme' => 'About Me',
            'home' => 'Home',
            'contact' => 'Contact',
            'projects' => 'Projects',
            'jobs' => 'Jobs',
            'skills' => 'Skills',
            'login' => 'Login',
            'testimonials' => 'Testimonials',
        ];

        return view("pages.$normalizedPage", [
            'pageTitle' => $pageTitles[$normalizedPage] ?? ucfirst($normalizedPage)
        ]);
    }
}
