<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;

Route::get('', [PageController::class, 'home'])->name('home');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/aboutme', [PageController::class, 'aboutme'])->name('aboutme');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/jobs', [PageController::class, 'jobs'])->name('jobs');
Route::get('/{page}', [PageController::class, 'show'])->name('page.show');

// Route::get('/profile/{id}', [HomeController::class, 'profile'])->name('profile');
// Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Route::get('/', function () {
//     return view('welcome');
// });