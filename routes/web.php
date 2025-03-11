<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProjectController;

Route::get('/', [PageController:: class, 'show'])->defaults('page', 'home');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index'); // ← THIS defines 'jobs.index'
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

Route::get('/{page}', [PageController::class, 'show'])->name('page.show');