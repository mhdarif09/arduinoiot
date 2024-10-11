<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login'); 
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input dari form login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Cek apakah kredensial cocok
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Cek role pengguna setelah berhasil login
            $user = Auth::user();
            if ($user->role === 'admin') {
                // Redirect ke halaman admin
                return redirect()->intended('/admin')->with('success', 'Login successful as Admin');
            } elseif ($user->role === 'super_admin') {
                // Redirect ke halaman super admin
                return redirect()->intended('/super-admin')->with('success', 'Login successful as Super Admin');
            } else {
                // Redirect ke halaman umum
                return redirect()->intended('/home')->with('success', 'Login successful');
            }
        }

        // Jika gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Logout user
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'You have been logged out.');
    }
}
