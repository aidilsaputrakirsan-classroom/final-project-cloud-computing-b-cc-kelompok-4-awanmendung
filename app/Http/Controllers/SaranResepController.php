<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SaranResepController extends Controller
{
    private $supabaseUrl;
    private $supabaseKey;

    public function __construct()
    {
        $this->supabaseUrl = env('SUPABASE_URL');
        $this->supabaseKey = env('SUPABASE_KEY');
    }

    // ======================
    // Halaman list
    // ======================
    public function index()
    {
        return view('dashboard.saran_resep'); 
    }

    // ======================
    // Data JSON untuk tabel
    // ======================
    public function list(Request $request)
    {
        $url = $this->supabaseUrl . '/rest/v1/recipe_suggestions?select=*&order=id.asc';

        $response = Http::withHeaders([
            'apikey' => $this->supabaseKey,
            'Authorization' => 'Bearer ' . $this->supabaseKey,
            'Accept' => 'application/json',
        ])->get($url);

        return response()->json([
            'success' => $response->successful(),
            'data' => $response->json(),
        ]);
    }

    // ======================
    // Detail view by ID
    // ======================
    public function view($id)
    {
        $url = $this->supabaseUrl . "/rest/v1/recipe_suggestions?select=*&id=eq.$id";

        $response = Http::withHeaders([
            'apikey' => $this->supabaseKey,
            'Authorization' => 'Bearer ' . $this->supabaseKey,
            'Accept' => 'application/json',
        ])->get($url);

        $data = $response->json();
        if (!$data || count($data) === 0) {
            return redirect('/saran_resep')->with('error', 'Data tidak ditemukan.');
        }

        $feedback = $data[0];

        // Kirim data ke Blade
        return view('dashboard.view_saranresep', ['feedback' => $feedback]);
    }

    // ======================
    // Delete saran resep
    // ======================
    public function delete($id)
    {
        $url = $this->supabaseUrl . "/rest/v1/recipe_suggestions?id=eq.$id";

        $response = Http::withHeaders([
            'apikey' => $this->supabaseKey,
            'Authorization' => 'Bearer ' . $this->supabaseKey,
            'Accept' => 'application/json',
            'Prefer' => 'return=representation',
        ])->delete($url);

        return response()->json([
            'success' => $response->successful(),
        ]);
    }
}
