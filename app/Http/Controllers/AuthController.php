<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $response = Http::withHeaders([
            'apikey'       => env('SUPABASE_KEY'),
            'Content-Type' => 'application/json',
        ])->post(env('SUPABASE_URL') . '/auth/v1/token?grant_type=password', [
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        $data = $response->json();

        // Validasi response Supabase
        if (!isset($data['access_token'])) {
            return back()->with('error', 'Email atau password salah, atau akun belum terdaftar.');
        }

        $user   = $data['user'] ?? null;
        $email  = $user['email'] ?? $request->email;
        $userId = $user['id'] ?? null;

        session([
            'user_email'       => $email,
            'supabase_token'   => $data['access_token'],
            'supabase_user_id' => $userId,
            'supabase_user'    => $user,
        ]);

        // regenerate session agar tidak hilang setelah redirect
        $request->session()->regenerate();

        // Admin redirect
        if ($email === '10221020@student.itk.ac.id') {
            return redirect('/dashboard')->with('success', 'Login berhasil!');
        }

        // User biasa redirect
        return redirect('/index')->with('success', 'Login berhasil!');
    }


    public function logout()
    {
        session()->forget([
            'user_email',
            'supabase_token',
            'supabase_user_id',
            'supabase_user',
        ]);

        return redirect('/index')->with('success', 'Berhasil keluar.');
    }
}
