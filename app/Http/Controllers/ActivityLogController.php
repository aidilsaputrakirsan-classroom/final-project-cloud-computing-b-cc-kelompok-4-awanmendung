<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActivityLogController extends Controller
{
    private $supabaseUrl;
    private $supabaseKey;

    public function __construct()
    {
        $this->supabaseUrl = env('SUPABASE_URL');
        $this->supabaseKey = env('SUPABASE_KEY'); // gunakan Service Role Key
    }

    // ==========================
    // Log aktivitas dari frontend
    // ==========================
    public function log(Request $request)
    {
        $data = $request->only(['description', 'detail', 'user_id', 'email']);

        // Payload untuk Supabase activity_logs
        $payload = [
            'description' => $data['description'] ?? '',
            'detail' => $data['detail'] ?? [],
            'user_id' => $data['user_id'] ?? null,
            'email' => $data['email'] ?? null,
        ];

        // Simpan ke Supabase
        $url = $this->supabaseUrl . '/rest/v1/activity_logs';

        $res = Http::withHeaders([
            'apikey' => $this->supabaseKey, // tetap anon key
            'Authorization' => 'Bearer ' . $this->supabaseKey,
            'Content-Type' => 'application/json',
        ])->post($url, $payload);

        return response()->json([
            'success' => $res->successful(),
            'data' => $res->json(),
        ]);
    }

    // ==========================
    // List semua activity log
    // ==========================
    public function list()
    {
        $url = $this->supabaseUrl . '/rest/v1/activity_logs?select=*&order=id.asc';

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

    // ==========================
    // Hapus activity log
    // ==========================
    public function delete($id)
    {
        $url = $this->supabaseUrl . "/rest/v1/activity_logs?id=eq.$id";

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

    // ==========================
    // View detail by ID
    // ==========================
    public function view($id)
    {
        $url = $this->supabaseUrl . "/rest/v1/activity_logs?select=*&id=eq.$id";

        $response = Http::withHeaders([
            'apikey' => $this->supabaseKey,
            'Authorization' => 'Bearer ' . $this->supabaseKey,
            'Accept' => 'application/json',
        ])->get($url);

        $data = $response->json();

        if (!$data || count($data) === 0) {
            return redirect('/activity_logs')->with('error', 'Data tidak ditemukan.');
        }

        $log = $data[0];

        // Pastikan detail selalu array
        $detail = $log['detail'];
        if (is_object($detail)) $detail = (array) $detail;
        elseif (is_string($detail)) $detail = json_decode($detail, true) ?? [$detail];

        return view('dashboard.view_activitylogs', [
            'log' => [
                'id' => $log['id'],
                'user_id' => $log['user_id'] ?? null,
                'email' => $log['email'] ?? null,
                'description' => $log['description'] ?? null,
                'detail' => $detail,
                'created_at' => $log['created_at'] ?? null,
            ]
        ]);
    }

    // ==========================
    // API view log by ID (JSON)
    // ==========================
    public function apiView($id)
    {
        $url = $this->supabaseUrl . "/rest/v1/activity_logs?select=*&id=eq.$id";

        $response = Http::withHeaders([
            'apikey' => $this->supabaseKey,
            'Authorization' => 'Bearer ' . $this->supabaseKey,
            'Accept' => 'application/json',
        ])->get($url);

        $data = $response->json();

        if (!$data || count($data) === 0) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        $log = $data[0];

        if (isset($log['detail']) && is_string($log['detail'])) {
            $log['detail'] = json_decode($log['detail'], true) ?? [$log['detail']];
        }

        return response()->json($log);
    }
}
