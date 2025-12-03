<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSupabaseAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('supabase_token')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        return $next($request);
    }
}
