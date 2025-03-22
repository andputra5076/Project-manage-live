<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Logout;
use App\Livewire\Dashboard;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Projects;

Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');
Route::get('/reset-password', ResetPassword::class)->name('reset-password');

Route::get('/', Dashboard::class)->middleware('auth');

// Middleware 'auth' untuk memastikan hanya user yang login bisa mengakses
Route::middleware('auth')->group(function () {
    Route::get('/projects', Projects::class)->name('projects');
    Route::get('/categories', \App\Livewire\Categories::class)->name('categories');
});


// Rute untuk halaman login
Route::get('/login', Login::class)->name('login');

// Rute untuk halaman register
Route::get('/register', Register::class)->name('register');

// Rute untuk halaman dashboard (hanya bisa diakses setelah login)
Route::middleware('auth')->get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard');

// Rute untuk logout
Route::post('/logout', [Logout::class, 'logout'])->name('logout');
