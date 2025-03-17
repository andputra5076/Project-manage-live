<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Register extends Component
{
    public $username;
    public $password;
    public $confirm_password;
    public $fullname;
    public $role;

    public function register()
    {
        // Validasi input user
        $this->validate([
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|string|same:password',
            'fullname' => 'required|string|max:255',
            'role' => 'required|string|in:1,2', // Sesuaikan dengan role yang diizinkan
        ]);

        // Buat user baru
        $user = User::create([
            'username' => $this->username,
            'password' => $this->password, // Tidak perlu Hash::make() karena sudah otomatis
            'fullname' => $this->fullname,
            'role' => $this->role,
        ]);

        // Login otomatis setelah register
        Auth::login($user, true);

        session()->flash('message', 'Login berhasil! Selamat datang di dashboard.');

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
