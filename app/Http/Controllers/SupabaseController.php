<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SupabaseController extends Controller
{
    public function login(Request $request)
    {
        $SUPABASE_URL = "https://mybfahpmnpasjmhutmcr.supabase.co";
        $SUPABASE_KEY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im15YmZhaHBtbnBhc2ptaHV0bWNyIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc2MTMyODUwOCwiZXhwIjoyMDc2OTA0NTA4fQ.W6jf7DpnbdTmOAWBhV0NwFlfhKGQC62crCT-rfKoap8";

        $email = $request->input('email');
        $password = $request->input('pass');

        $response = Http::withoutVerifying() // abaikan SSL saat lokal
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

        // Debugging: bisa aktifkan ini sementara
        // dd($data);

        if ($response->successful() && isset($data['access_token'])) {
            session([
                'supabase_token' => $data['access_token'],
                'supabase_email' => $email
            ]);
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
