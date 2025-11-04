<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SupabaseController extends Controller
{
    public function login(Request $request)
    {
        // Ganti dengan URL Supabase dan Key dari .env
        $url = env('SUPABASE_URL') . '/rest/v1/login';
        $key = env('SUPABASE_KEY');

        // Ambil input dari form
        $data = [
            'username' => $request->email, // Sesuaikan dengan nama kolom di tabel Supabase
            'password' => $request->pass,
        ];

        try {
            // Kirim request ke Supabase (tanpa verifikasi SSL sementara)
            $response = Http::withoutVerifying()->withHeaders([
                'apikey' => $key,
                'Authorization' => 'Bearer ' . $key,
                'Content-Type' => 'application/json',
                'Prefer' => 'return=representation'
            ])->post($url, $data);

            // Cek apakah request berhasil
            if ($response->successful()) {
                return redirect('/')->with('success', 'Login berhasil disimpan ke Supabase!');
            } else {
                // Tampilkan pesan error dari Supabase
                return back()->withErrors([
                    'supabase' => 'Gagal login: ' . json_encode($response->json())
                ]);
            }
        } catch (\Exception $e) {
            // Tangkap error SSL atau koneksi
            return back()->withErrors([
                'exception' => 'Terjadi kesalahan koneksi: ' . $e->getMessage()
            ]);
        }
    }
}
