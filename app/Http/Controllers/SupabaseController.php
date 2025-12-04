<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SupabaseController extends Controller
{
    public function login(Request $request)
{
    $SUPABASE_URL = "https://mybfahpmnpasjmhutmcr.supabase.co";
    $SUPABASE_KEY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im15YmZhaHBtbnBhc2ptaHV0bWNyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NjEzMjg1MDgsImV4cCI6MjA3NjkwNDUwOH0.E_VI8-raJ3jRPAQc079j6jAhluiC4lSCmtIN9gMND6g";

    $email = $request->input('email');
    $password = $request->input('password');

    $adminEmails = [
        '10221020@student.itk.ac.id',
        '10221038@student.itk.ac.id',
        '10221082@student.itk.ac.id',
        '10221010@student.itk.ac.id'
    ];

    // 1️⃣ LOGIN → dapatkan access_token
    $response = Http::withoutVerifying()
        ->withHeaders([
            'apikey' => $SUPABASE_KEY,
            'Authorization' => 'Bearer ' . $SUPABASE_KEY,
            'Content-Type' => 'application/json'
        ])
        ->post("$SUPABASE_URL/auth/v1/token?grant_type=password", [
            'email' => $email,
            'password' => $password
        ]);

    $data = $response->json();

    if (!$response->successful() || !isset($data['access_token'])) {
        $errorMessage = $data['error_description']
            ?? 'Email atau password salah, atau akun belum terdaftar.';

        return back()->withErrors(['login' => $errorMessage])
                     ->with('register_prompt', true);
    }

    $accessToken = $data['access_token'];

    // 2️⃣ GET USER → untuk ambil user_id
    $userResponse = Http::withoutVerifying()
        ->withHeaders([
            'apikey' => $SUPABASE_KEY,
            'Authorization' => 'Bearer ' . $accessToken,
        ])
        ->get("$SUPABASE_URL/auth/v1/user");

    $user = $userResponse->json();

    if (!isset($user['id'])) {
        return back()->withErrors(['login' => 'Gagal mengambil data user.']);
    }

    // 3️⃣ SIMPAN SEMUA DI SESSION
    session([
        'supabase_token'   => $accessToken,
        'supabase_email'   => $email,
        'supabase_user_id' => $user['id'],   // 🔥 FIX PENTING
    ]);

    // 4️⃣ Arahkan admin/user
    if (in_array($email, $adminEmails)) {
        return redirect('/dashboard')->with('success', 'Login sebagai admin berhasil!');
    }

    return redirect('/')->with('success', 'Login berhasil!');
}
}

