<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    $users = User::all();
    $pageTitle = 'Users';
    return view('pages.users', compact('users', 'pageTitle'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $pageTitle = $user->companyname;
        return view('pages.users-show', compact('user', 'pageTitle'));
    }

    public function dashboardIndex()
    {
        $users = User::all();

        return view('dashboard.users.index', [
            'users' => $users,
            'pageTitle' => 'Manage Users'
        ]);
    }
}
