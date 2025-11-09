<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //  Tampilkan form register
    public function showRegisterForm()
    {
        return view('register'); // arah ke resources/views/register.blade.php
    }

    //  Proses data register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Simpan user baru ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // default user biasa
        ]);

        // Login otomatis setelah daftar
 //       Auth::login($user);

        // Arahkan ke halaman home (atau dashboard)
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login untuk melanjutkan.');
    }

    //  Tampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //  Cek apakah email terdaftar dulu
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // Jika email tidak ditemukan di database
            return back()->withErrors([
                'email' => 'Email belum terdaftar.',
            ])->onlyInput('email');
        }

        //  Jika email ada, cek password-nya
        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'password' => 'Password salah.',
            ])->onlyInput('email');
        }

        //  Login sukses
        $request->session()->regenerate();
        return redirect()->intended('/');
    }



    //  Logout user
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Kamu telah logout.');
    }
}
