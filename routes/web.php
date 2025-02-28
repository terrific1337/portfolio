<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;

Route::get('', [PageController::class, 'home'])->name('home');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/overmij', [PageController::class, 'aboutme'])->name('aboutme');
Route::get('/projecten', [PageController::class, 'projects'])->name('projects');
Route::get('/werkervaring', [PageController::class, 'jobs'])->name('jobs');
// Route::get('/profile/{id}', [HomeController::class, 'profile'])->name('profile');
// Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Route::get('/', function () {
//     return view('welcome');
// });