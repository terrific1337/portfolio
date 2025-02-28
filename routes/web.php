<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;

Route::get('', [PageController::class, 'home'])->name('home');
// Route::get('/profile/{id}', [HomeController::class, 'profile'])->name('profile');
// Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Route::get('/', function () {
//     return view('welcome');
// });