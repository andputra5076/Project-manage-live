<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class ForgotPassword extends Component
{
    public $username;
    public $message;

    public function sendResetLink()
    {
        $user = User::whereRaw('BINARY `username` = ?', [$this->username])->first();

        if (!$user) {
            $this->message = "Username tidak ditemukan!";
            return;
        }

        $token = Str::random(60);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['username' => $this->username],
            ['token' => Hash::make($token), 'created_at' => now()]
        );

        // Simpan token di session agar tidak tampil di URL
        session(['reset_token' => $token, 'reset_username' => $this->username]);

        // Redirect ke halaman reset password tanpa token di URL
        return redirect()->route('reset-password');
    }


    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
