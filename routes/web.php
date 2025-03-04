<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;

Route::get('/', [PageController:: class, 'show'])->defaults('page', 'home');
Route::get('/{page}', [PageController::class, 'show'])->name('page.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');