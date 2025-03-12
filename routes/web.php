<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [PageController:: class, 'show'])->defaults('page', 'home');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index'); // ← THIS defines 'jobs.index'
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

Route::get('/dashboard', function () {
    return view('components.dashboard.user.index');
})->middleware(['auth'])->name('dashboard');

// Show login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Handle login form POST
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/{page}', [PageController::class, 'show'])->name('page.show');