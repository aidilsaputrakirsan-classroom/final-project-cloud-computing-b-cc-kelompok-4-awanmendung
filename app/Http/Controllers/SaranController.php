<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SaranController extends Controller
{
    private $supabaseUrl;
    private $supabaseKey;

    public function __construct()
    {
        $this->supabaseUrl = env('SUPABASE_URL');
        $this->supabaseKey = env('SUPABASE_KEY');
    }

    // ======================
    // List untuk tabel saran
    // ======================
    public function list(Request $request)
    {
        $url = $this->supabaseUrl . '/rest/v1/feedback?select=*&order=id.asc';

        // Filter kategori jika ada
        if ($request->kategori) {
            $url .= '&category=eq.' . urlencode($request->kategori);
        }

        $response = Http::withHeaders([
            'apikey' => $this->supabaseKey,
            'Authorization' => 'Bearer ' . $this->supabaseKey,
            'Accept' => 'application/json',
        ])->get($url);

        \Log::info('Supabase response: ' . $response->body());

        return response()->json([
            'success' => $response->successful(),
            'data' => $response->json(),
        ]);
    }

    // ======================
    // Hapus saran
    // ======================
    public function delete($id)
    {
        $url = $this->supabaseUrl . "/rest/v1/feedback?id=eq.$id";

        $response = Http::withHeaders([
            'apikey' => $this->supabaseKey,
            'Authorization' => 'Bearer ' . $this->supabaseKey,
            'Accept' => 'application/json',
            'Prefer' => 'return=representation',
        ])->delete($url);

        \Log::info('Supabase delete response: ' . $response->body());

        return response()->json([
            'success' => $response->successful()
        ]);
    }

    // ======================
    // View saran by ID
    // ======================
    public function view($id)
{
    if (!$id) {
        return redirect('/resep')->with('error', 'ID tidak ditemukan.');
    }

    $url = $this->supabaseUrl . "/rest/v1/feedback?select=email,message&id=eq.$id";

    $response = Http::withHeaders([
        'apikey' => $this->supabaseKey,
        'Authorization' => 'Bearer ' . $this->supabaseKey,
        'Accept' => 'application/json',
    ])->get($url);

    $data = $response->json();

    if (!$data || count($data) === 0) {
        return redirect('/resep')->with('error', 'Data tidak ditemukan.');
    }

    $feedback = $data[0];

    return view('dashboard.view_saran', [
        'feedback' => $feedback
    ]);
}
}
