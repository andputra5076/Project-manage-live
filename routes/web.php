<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Logout;
use App\Livewire\Dashboard;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;

Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');
Route::get('/reset-password', ResetPassword::class)->name('reset-password');

Route::get('/', Dashboard::class)->middleware('auth');

// Rute untuk halaman login
Route::get('/login', Login::class)->name('login');

// Rute untuk halaman register
Route::get('/register', Register::class)->name('register');

// Rute untuk halaman dashboard (hanya bisa diakses setelah login)
Route::middleware('auth')->get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard');

// Rute untuk logout
Route::post('/logout', [Logout::class, 'logout'])->name('logout');