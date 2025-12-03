<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input sederhana
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        // Kirim request login ke Supabase
        $response = Http::withHeaders([
            'apikey' => env('SUPABASE_KEY'),
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer " . env('SUPABASE_KEY')
        ])->post(env('SUPABASE_URL') . '/auth/v1/token?grant_type=password', [
            'email'    => $request->email,
            'password' => $request->password
        ]);

        // Cek apakah login gagal
        if ($response->failed()) {
            return back()->with('error', 'Email atau password salah!');
        }

        $data = $response->json();

        // Simpan session user
        session([
            'user_email'     => $request->email,
            'supabase_token' => $data['access_token'] ?? null,
            'supabase_user'  => $data['user'] ?? null
        ]);

        // Redirect berdasarkan email (contoh role admin)
        if ($request->email === '10221020@student.itk.ac.id') {
            return redirect('/dashboard')->with('success', 'Login berhasil!');
        }

        // Redirect user biasa
        return redirect('/')->with('success', 'Login berhasil!');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login')->with('success', 'Berhasil logout.');
    }
}
