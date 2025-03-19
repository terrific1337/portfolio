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

    // Manage Projects
    Route::get('/projects', [ProjectController::class, 'dashboardIndex'])->name('dashboard.projects');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('dashboard.projects.create');
    Route::post('projects', [ProjectController::class, 'store'])->name('dashboard.projects.store');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('dashboard.projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('dashboard.projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('dashboard.projects.destroy');
    Route::get('/projects/add-tag', [ProjectController::class, 'addTag'])->name('dashboard.projects.addTag');
    Route::post('/projects/store-tag', [ProjectController::class, 'storeTag'])->name('dashboard.projects.storeTag');
    Route::get('/projects/edit-tag/{tag}', [ProjectController::class, 'editTag'])->name('dashboard.projects.editTag');
    Route::put('/projects/update-tag/{tag}', [ProjectController::class, 'updateTag'])->name('dashboard.projects.updateTag');    
    Route::delete('/projects/delete-tag/{tag}', [ProjectController::class, 'destroyTag'])->name('dashboard.projects.destroyTag');

    // Manage Skills
    Route::get('/skills', [SkillController::class, 'dashboardIndex'])->name('dashboard.skills');
    Route::get('/skills/create', [SkillController::class, 'create'])->name('dashboard.skills.create');
    Route::post('skills', [SkillController::class, 'store'])->name('dashboard.skills.store');
    Route::get('/skills/{skill}/edit', [SkillController::class, 'edit'])->name('dashboard.skills.edit');
    Route::put('/skills/{skill}', [SkillController::class, 'update'])->name('dashboard.skills.update');
    Route::delete('/skills/{skill}', [SkillController::class, 'destroy'])->name('dashboard.skills.destroy');
    Route::get('/skills/add-category', [SkillController::class, 'addCategory'])->name('dashboard.skills.addCategory');
    Route::post('/skills/store-category', [SkillController::class, 'storeCategory'])->name('dashboard.skills.storeCategory');
    Route::get('/skills/edit-category/{category}', [SkillController::class, 'editCategory'])->name('dashboard.skills.editCategory');
    Route::put('/skills/update-category/{category}', [SkillController::class, 'updateCategory'])->name('dashboard.skills.updateCategory');    
    Route::delete('/skills/delete-category/{category}', [SkillController::class, 'destroyCategory'])->name('dashboard.skills.destroyCategory');

    // Manage About Me
    Route::get('/aboutme', [AboutMeController::class, 'dashboardIndex'])->name('dashboard.aboutme');
    Route::get('/aboutme/create', [AboutMeController::class, 'create'])->name('dashboard.aboutme.create');
    Route::post('/aboutme', [AboutMeController::class, 'store'])->name('dashboard.aboutme.store');
    Route::get('/aboutme/{aboutme}/edit', [AboutMeController::class, 'edit'])->name('dashboard.aboutme.edit');
    Route::put('/aboutme/{aboutme}', [AboutMeController::class, 'update'])->name('dashboard.aboutme.update');
    Route::delete('/aboutme/{aboutme}', [AboutMeController::class,'destroy'])->name('dashboard.aboutme.destroy');

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
    Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('dashboard.jobs.edit');
    Route::put('/jobs/{job}', [JobController::class, 'update'])->name('dashboard.jobs.update');
    Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('dashboard.jobs.destroy');
});

// Auth routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Dynamic page fallback (e.g., /about, /contact etc.)
Route::get('/{page}', [PageController::class, 'show'])->name('page.show');
