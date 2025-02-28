<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages/home', ['pageTitle' => 'Homepagina']);
    }

    public function contact()
    {
        return view('pages/contact', ['pageTitle' => 'Contactpagina']);
    }

    public function aboutme()
    {
        return view('pages/aboutme', ['pageTitle' => 'Over mij']);
    }

    public function projects()
    {
        return view('pages/projects', ['pageTitle' => 'Projecten']);
    }

    public function jobs()
    {
        return view('pages/jobs', ['pageTitle' => 'Werkervaring']);
    }
}
