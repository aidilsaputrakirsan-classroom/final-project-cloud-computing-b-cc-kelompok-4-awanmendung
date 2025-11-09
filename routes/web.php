<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupabaseController;

// =====================
// AUTH ROUTES
// =====================

// halaman login
Route::get('/login', function () {
    return view('login.index');
})->name('login');

// proses login
Route::post('/login', [SupabaseController::class, 'login'])->name('login.process');

// halaman register
Route::get('/register', function () {
    return view('register.index');
})->name('register');

// proses logout
Route::post('/logout', [SupabaseController::class, 'logout'])->name('logout');

// =====================
// PUBLIC ROUTES (Bisa diakses tanpa login)
// =====================

Route::get('/', function () {
    return view('home.index'); // Halaman home bisa diakses siapa saja
})->name('home');

Route::get('/about', function () {
    return view('home.about');
});

Route::get('/blog', function () {
    return view('home.blog');
});

Route::get('/contact', function () {
    return view('home.contact');
});

Route::get('/elements', function () {
    return view('home.elements');
});

Route::get('/recipes_details', function () {
    return view('home.recipes_details');
});

Route::get('/recipes', function () {
    return view('home.recipes');
});

Route::get('/single-blog', function () {
    return view('home.single-blog');
});

Route::get('/main', function () {
    return view('home.main');
});

// =====================
// PROTECTED ROUTES (Baru butuh login)
// =====================

Route::group(['middleware' => function ($request, $next) {
    if (!session()->has('supabase_token')) {
        return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
    }
    return $next($request);
}], function () {

    Route::get('/dashboard', function () {
        return view('dashboard.index'); // misalnya halaman khusus setelah login
    });
});
