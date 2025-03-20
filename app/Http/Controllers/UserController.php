<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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

    public function create()
    {
        return view('dashboard.users.create', ['pageTitle' => 'Add New User']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'level' => 'integer|min:0|max:5',
        ]);

        \App\Models\User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'level' => $validated['level'],
        ]);

        return redirect()->route('dashboard.users')->with('success', 'User added successfully!');
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user' => $user,
            'pageTitle' => 'Edit User',
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'level' => 'required|integer|min:0|max:5',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->level = $validated['level'];

        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }

        $user->save();

        return redirect()->route('dashboard.users')->with('success', 'User updated successfully!');
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard.users')->with('success', 'User deleted successfully!');
    }

}
