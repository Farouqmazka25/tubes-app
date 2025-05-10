<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',    
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
        ]);

        // Ambil user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Cek apakah user ditemukan dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user); // Login user

            // Cek role dan redirect sesuai dashboard
            if ($user->role === 'admin') {
                return redirect()->route('dashboardadmin');
            } elseif ($user->role === 'user') {
                return redirect()->route('dashboarduser');
            } else {
                Auth::logout(); // Logout kalau rolenya tidak dikenal
                return back()->withErrors(['email' => 'Akun tidak memiliki peran yang valid.']);
            }
        }

        // Jika email tidak ditemukan atau password salah
        return back()->withErrors(['email' => 'Email atau password salah'])->withInput();
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }
}
