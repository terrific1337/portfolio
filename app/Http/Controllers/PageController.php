<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home', ['pageTitle' => 'Homepagina']);
    }

    public function contact()
    {
        return view('contact', ['pageTitle' => 'Contactpagina']);
    }

    public function aboutme()
    {
        return view('aboutme', ['pageTitle' => 'Over mij']);
    }

    public function projects()
    {
        return view('projects', ['pageTitle' => 'Projecten']);
    }

    public function jobs()
    {
        return view('jobs', ['pageTitle' => 'Werkervaring']);
    }
}
