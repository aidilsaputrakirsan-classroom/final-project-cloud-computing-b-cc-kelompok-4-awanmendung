<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSupabaseAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login + punya token + punya user_id
        if (
            !session()->has('supabase_token') ||
            !session()->has('supabase_user_id')
        ) {
            return redirect('/login')->withErrors([
                'login' => 'Silakan login terlebih dahulu.'
            ]);
        }

        return $next($request);
    }
}
