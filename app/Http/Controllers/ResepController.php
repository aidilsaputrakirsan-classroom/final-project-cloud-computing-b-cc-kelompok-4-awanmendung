<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ResepController extends Controller
{
    private $supabaseUrl;
    private $supabaseKey;

    public function __construct()
    {
        $this->supabaseUrl = env('SUPABASE_URL');
        $this->supabaseKey = env('SUPABASE_KEY');
    }

    // List resep
    public function list(Request $request)
    {
        $query = [
            'select' => '*',
            'order' => 'id.asc'
        ];

        if ($request->kategori) {
            $query['kategori'] = 'eq.' . $request->kategori;
        }

        $response = Http::withHeaders([
            'apikey' => $this->supabaseKey,
            'Authorization' => 'Bearer ' . $this->supabaseKey,
        ])->get($this->supabaseUrl . '/rest/v1/resep', $query);

        \Log::info('Resep Supabase:', $response->json()); // cek log

        return response()->json([
            'success' => $response->successful(),
            'data' => $response->json()
        ]);
    }

    // Tambah resep
    public function store(Request $request)
    {
        $request->validate([
            'nama_resep' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'alat' => 'required|string',
            'bahan' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'required|string'
        ]);

        $response = Http::withHeaders([
            'apikey' => $this->supabaseKey,
            'Authorization' => 'Bearer ' . $this->supabaseKey,
            'Content-Type' => 'application/json'
        ])->post($this->supabaseUrl . '/rest/v1/resep', [
            'nama_resep' => $request->nama_resep,
            'kategori' => $request->kategori,
            'alat' => $request->alat,
            'bahan' => $request->bahan,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->gambar,
        ]);

        return response()->json([
            'success' => $response->successful(),
            'data' => $response->json()
        ]);
    }

    // Hapus resep
    public function delete($id)
    {
        $response = Http::withHeaders([
            'apikey' => $this->supabaseKey,
            'Authorization' => 'Bearer ' . $this->supabaseKey,
        ])->delete($this->supabaseUrl . "/rest/v1/resep?id=eq.$id");

        return response()->json([
            'success' => $response->successful()
        ]);
    }

    public function view($id)
    {
        $response = Http::withHeaders([
            'apikey' => $this->supabaseKey,
            'Authorization' => 'Bearer ' . $this->supabaseKey,
        ])->get($this->supabaseUrl . "/rest/v1/resep?id=eq.$id");

        $data = $response->json();

        return response()->json([
            'success' => $response->successful() && count($data) > 0,
            'data' => count($data) ? $data[0] : null
        ]);
    }

    public function show($id)
    {
        $response = Http::withHeaders([
            'apikey' => $this->supabaseKey,
            'Authorization' => 'Bearer ' . $this->supabaseKey,
        ])->get($this->supabaseUrl . "/rest/v1/resep?id=eq.$id");

        $data = $response->json();
        return response()->json([
            'success' => $response->successful(),
            'data' => $data[0] ?? null
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_resep' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'alat' => 'required|string',
            'bahan' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|string'
        ]);

        $payload = [
            'nama_resep' => $request->nama_resep,
            'kategori' => $request->kategori,
            'alat' => $request->alat,
            'bahan' => $request->bahan,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->gambar) {
            $payload['gambar'] = $request->gambar;
        }

        $response = Http::withHeaders([
            'apikey' => $this->supabaseKey,
            'Authorization' => 'Bearer ' . $this->supabaseKey,
            'Content-Type' => 'application/json'
        ])->patch($this->supabaseUrl . "/rest/v1/resep?id=eq.$id", $payload);

        return response()->json([
            'success' => $response->successful(),
            'data' => $response->json()
        ]);
    }

    public function homeRecipes()
    {
        $response = Http::withHeaders([
            'apikey' => $this->supabaseKey,
            'Authorization' => 'Bearer ' . $this->supabaseKey,
        ])->get($this->supabaseUrl . '/rest/v1/resep', [
            'select' => 'id,nama_resep,kategori,gambar',
            'order' => 'id.desc',
            'limit' => 3
        ]);

        return response()->json([
            'success' => $response->successful(),
            'data' => $response->json()
        ]);
    }
    
    public function listForPage(Request $request)
    {
        $query = [
            'select' => 'id,nama_resep,kategori,gambar',
            'order' => 'id.desc'
        ];

        if ($request->kategori) {
            $query['kategori'] = 'eq.' . $request->kategori;
        }

        $response = Http::withHeaders([
            'apikey' => $this->supabaseKey,
            'Authorization' => 'Bearer ' . $this->supabaseKey,
        ])->get($this->supabaseUrl . '/rest/v1/resep', $query);

        return response()->json([
            'success' => $response->successful(),
            'data' => $response->json()
        ]);
    }

    public function details(Request $request)
    {
        $id = $request->query('id');
        if (!$id) {
            return response()->json(['success' => false, 'message' => 'ID resep tidak ditemukan.']);
        }

        $response = Http::withHeaders([
            'apikey' => $this->supabaseKey,
            'Authorization' => 'Bearer ' . $this->supabaseKey,
        ])->get($this->supabaseUrl . '/rest/v1/resep', [
            'select' => '*',
            'id' => 'eq.' . $id,
        ]);

        $data = $response->json();

        return response()->json([
            'success' => !empty($data),
            'data' => $data[0] ?? null,
        ]);
    }
    
}
