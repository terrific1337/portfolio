<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SkillController;
use App\Http\Controllers\Auth\AboutMeController;
use App\Http\Controllers\Auth\UserController;

// Public routes
Route::get('/', [PageController::class, 'show'])->defaults('page', 'home');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

// Dashboard routes
Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard.home', ['pageTitle' => 'Dashboard Home']);
    })->name('dashboard');

    Route::get('/projects', [ProjectController::class, 'dashboardIndex'])->name('dashboard.projects');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('dashboard.projects.create');
    // Route::post('/projects', [ProjectController::class, 'store'])->name('dashboard.projects.store');
    Route::post('/jobs', [JobController::class, 'dashboardIndex'])->name('dashboard.jobs');
    Route::post('/skills', [SkillController::class, 'dashboardIndex'])->name('dashboard.skills');
    Route::post('/aboutme', [AboutMeController::class, 'dashboardIndex'])->name('dashboard.aboutme');
    Route::post('/users', [UserController::class, 'dashboardIndex'])->name('dashboard.users');
});

// Auth routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dynamic page fallback (e.g., /about, /contact etc.)
Route::get('/{page}', [PageController::class, 'show'])->name('page.show');
