<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;

class ResetPassword extends Component
{
    public $token;
    public $username;
    public $password;
    public $confirm_password;
    public $message;

    public function mount()
    {
        $this->token = session('reset_token');
        $this->username = session('reset_username');

        if (!$this->token || !$this->username) {
            return redirect()->route('login')->with('error', 'Token reset password tidak valid atau sudah kadaluarsa.');
        }
    }

    public function resetPassword()
    {
        if ($this->password !== $this->confirm_password) {
            $this->message = "Konfirmasi password tidak cocok!";
            return;
        }

        // Ambil token dari database
        $tokenData = DB::table('password_reset_tokens')
            ->where('username', $this->username)
            ->first();

        if (!$tokenData || !Hash::check($this->token, $tokenData->token)) {
            $this->message = "Token reset password tidak valid!";
            return;
        }

        // Ambil user dari database
        $user = User::where('username', $this->username)->first();

        if ($user) {
            // Cek apakah password baru sama dengan password lama
            if (Hash::check($this->password, $user->password)) {
                $this->message = "Gunakkan Password lain!";
                return;
            }

            // Update password
            $user->password = $this->password; // Otomatis di-hash oleh mutator di model User
            $user->save();

            // Hapus token setelah reset password berhasil
            DB::table('password_reset_tokens')->where('username', $this->username)->delete();

            // Hapus session agar tidak bisa diakses lagi
            session()->forget(['reset_token', 'reset_username']);

            // Login otomatis
            Auth::login($user, true); // `true` untuk set remember_me

            return redirect()->route('dashboard')->with('success', 'Password berhasil direset dan Anda sudah masuk!');
        }

        $this->message = "User tidak ditemukan!";
    }

    public function render()
    {
        return view('livewire.auth.reset-password');
    }
}
