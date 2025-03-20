<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Jobs;
use App\Models\User;
use App\Models\Skill;
use App\Models\Message;

class DashboardController extends Controller
{
    public function __construct()
    {
        if (!Auth::check() || Auth::user()->level !== 5) {
            abort(403, 'Unauthorized');
        }
    }
    
    public function index()
    {
        // Statistics
        $totalProjects = Project::count();
        $featuredProjects = Project::where('featured', true)->count();
        $totalJobs = Jobs::count();
        $totalUsers = User::count();
        $totalSkills = Skill::count();
        $totalMessages = Message::count();

        // Latest Items
        $latestUsers = User::latest()->take(5)->get();
        $latestMessages = Message::latest()->take(5)->get();

        return view('dashboard.home', [
            'pageTitle' => 'Dashboard Home',
            'totalProjects' => $totalProjects,
            'featuredProjects' => $featuredProjects,
            'totalJobs' => $totalJobs,
            'totalUsers' => $totalUsers,
            'totalSkills' => $totalSkills,
            'totalMessages' => $totalMessages,
            'latestUsers' => $latestUsers,
            'latestMessages' => $latestMessages,
        ]);
    }
}
