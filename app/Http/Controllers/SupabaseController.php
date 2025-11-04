<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SupabaseController extends Controller
{
    public function login(Request $request)
    {
        // Ambil URL & Key Supabase dari file .env
        $url = env('SUPABASE_URL') . '/rest/v1/login';
        $key = env('SUPABASE_KEY');

        // Ambil input dari form login
        $email = $request->input('email');
        $password = $request->input('pass');

        try {
            // Kirim request GET ke Supabase untuk cek data login
            $response = Http::withoutVerifying()->withHeaders([
                'apikey' => $key,
                'Authorization' => 'Bearer ' . $key,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->get($url, [
                'username' => 'eq.' . $email,   // sesuaikan nama kolomnya di Supabase
                'password' => 'eq.' . $password // sesuaikan juga dengan kolom di Supabase
            ]);

            // Ambil hasil response JSON dari Supabase
            $data = $response->json();

            // Log hasilnya buat debugging
            Log::info('Respon login Supabase:', [
                'status' => $response->status(),
                'body' => $data
            ]);

            // Cek hasil query
            if ($response->successful() && count($data) > 0) {
                // Login berhasil -> simpan data user ke session
                session(['user' => $data[0]]);

                // Redirect ke halaman utama
                return redirect('/')->with('success', 'Login berhasil!');
            } else {
                // Login gagal (tidak ada data cocok)
                return back()->with('error', 'Email atau password salah!');
            }
        } catch (\Exception $e) {
            // Tangani error koneksi (termasuk SSL)
            Log::error('Kesalahan koneksi Supabase:', ['error' => $e->getMessage()]);

            return back()->withErrors([
                'exception' => 'Terjadi kesalahan koneksi: ' . $e->getMessage()
            ]);
        }
    }
}
