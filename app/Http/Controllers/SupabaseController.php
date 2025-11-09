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

        // Daftar email admin
        $adminEmails = [
            '10221020@student.itk.ac.id',
            '10221038@student.itk.ac.id',
            '10221082@student.itk.ac.id',
            '10221010@student.itk.ac.id'
        ];

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

        if ($response->successful() && isset($data['access_token'])) {
            session([
                'supabase_token' => $data['access_token'],
                'supabase_email' => $email
            ]);

            // Kalau email termasuk admin -> ke dashboard
            if (in_array($email, $adminEmails)) {
                return redirect('/dashboard')->with('success', 'Login sebagai admin berhasil!');
            }

            // Selain admin -> ke halaman utama
            return redirect('/')->with('success', 'Login berhasil!');
        } else {
            $errorMessage = $data['error_description'] ?? 'Email atau password salah, atau akun belum terdaftar.';
            return back()->withErrors(['login' => $errorMessage]);
        }
    }

    public function logout()
    {
        session()->forget(['supabase_token', 'supabase_email']);
        return redirect('/login')->with('success', 'Berhasil logout.');
    }
}
