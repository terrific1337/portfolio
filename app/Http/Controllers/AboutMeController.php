<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutMe;

class AboutMeController extends Controller
{
    public function  index()
    {
        $aboutmes = AboutMe::orderBy('id')->get();
        $pageTitle = "About Me";
        return view('pages.aboutme', compact('aboutmes', 'pageTitle'));
    }
}
