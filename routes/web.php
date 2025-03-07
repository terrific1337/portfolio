<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobController;

Route::get('/', [PageController:: class, 'show'])->defaults('page', 'home');
Route::get('/{page}', [PageController::class, 'show'])->name('page.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show'); // details page jobs
