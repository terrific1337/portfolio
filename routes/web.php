<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('', [HomeController::class, 'index'])->name('home');
Route::get('/profile/{id}', [HomeController::class, 'profile'])->name('profile');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

/*
Route::get('/', function () {
    return view('welcome');
});
*/