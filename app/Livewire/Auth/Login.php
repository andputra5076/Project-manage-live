<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;

class Login extends Component
{
    public $username, $password, $remember = false;
    public $rateLimiterEnabled = true;
    public $remainingAttempts = 5; // Jumlah percobaan tersisa sebelum diblokir

    public function login()
    {
        $this->resetErrorBag();

        $key = 'login_attempt|' . request()->ip();

        if ($this->rateLimiterEnabled && RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            session()->flash('status', 'error');
            session()->flash('message', "Terlalu banyak percobaan login. Silakan coba lagi nanti.");
            return redirect()->route('login');
        }

        $credentials = ['username' => $this->username, 'password' => $this->password];

        if (Auth::attempt($credentials, (bool) $this->remember)) {
            RateLimiter::clear($key); 

            session()->flash('status', 'success');
            session()->flash('message', 'Login berhasil! Selamat datang di dashboard.');

            return redirect()->route('dashboard');
        }

        RateLimiter::hit($key, 60); 
        $this->remainingAttempts = RateLimiter::remaining($key, 5);

        session()->flash('status', 'error');
        session()->flash('message', "Username atau password salah!");

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
