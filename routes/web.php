<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\AboutMeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;

// Public routes
Route::get('/', [PageController::class, 'show'])->defaults('page', 'home')->name('home');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
Route::get('/about me', [AboutMeController::class, 'index'])->name('aboutme.index');

// Dashboard routes (auth required)
Route::middleware(['auth'])->prefix('dashboard')->group(function () {

    Route::get('/', function () {
        if (auth()->user()->level !== 5) {
            abort(403, 'Unauthorized: You are not allowed to access the dashboard.');
        }

        return view('dashboard.home', ['pageTitle' => 'Dashboard Home']);
    })->name('dashboard');

    Route::get('/projects', [ProjectController::class, 'dashboardIndex'])->name('dashboard.projects');
    Route::get('/skills', [SkillController::class, 'dashboardIndex'])->name('dashboard.skills');
    Route::get('/aboutme', [AboutMeController::class, 'dashboardIndex'])->name('dashboard.aboutme');

    // Manage Users
    Route::get('/users', [UserController::class, 'dashboardIndex'])->name('dashboard.users');
    Route::get('/users/create', [UserController::class, 'create'])->name('dashboard.users.create');
    Route::post('/users', [UserController::class, 'store'])->name('dashboard.users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('dashboard.users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('dashboard.users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('dashboard.users.destroy');

    // Manage Jobs
    Route::get('/jobs', [JobController::class, 'dashboardIndex'])->name('dashboard.jobs');
    Route::get('/jobs/create', [JobController::class, 'create'])->name('dashboard.jobs.create');
    Route::post('/jobs', [JobController::class, 'store'])->name('dashboard.jobs.store');
});

// Auth routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Dynamic page fallback (e.g., /about, /contact etc.)
Route::get('/{page}', [PageController::class, 'show'])->name('page.show');
