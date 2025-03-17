<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
    $skills = Skill::all();
    $pageTitle = 'Skills';
    return view('pages.skills', compact('skills', 'pageTitle'));
    }

    public function show($id)
    {
        $skill = Skill::findOrFail($id);
        $pageTitle = $skill->companyname;
        return view('pages.skills-show', compact('skill', 'pageTitle'));
    }

    public function dashboardIndex()
    {
        // Admin dashboard project list
        $skills = Skill::all();

        return view('dashboard.skills.index', [
            'skills' => $skills,
            'pageTitle' => 'Manage Skills'
        ]);
    }
}
