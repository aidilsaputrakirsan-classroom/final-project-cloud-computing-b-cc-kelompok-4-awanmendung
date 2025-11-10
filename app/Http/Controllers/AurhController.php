<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $response = Http::withHeaders([
            'apikey' => env('SUPABASE_KEY'),
            'Content-Type' => 'application/json'
        ])->post(env('SUPABASE_URL').'/auth/v1/token?grant_type=password', [
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($response->failed()) {
            return back()->with('error', 'Login gagal!');
        }

        $data = $response->json();

        // ✅ Kalau email cocok, redirect ke dashboard
        if ($request->email === '10221020@student.itk.ac.id') {
            return redirect('/dashboard');
        }

        // kalau bukan email itu, arahkan ke homepage
        return redirect('/');
    }
}
