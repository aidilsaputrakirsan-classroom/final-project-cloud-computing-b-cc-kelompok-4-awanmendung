<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupabaseController;

// =====================
// AUTH (LOGIN, REGISTER, LOGOUT)
// =====================

Route::get('/login', function () {
    return view('login.index');
})->name('login');

Route::post('/login', [SupabaseController::class, 'login'])->name('login.process');

Route::get('/register', function () {
    return view('register.index');
})->name('register');

Route::post('/logout', function () {
    session()->forget('supabase_token');
    return redirect('/index.php');
})->name('logout');

// =====================
// PUBLIC PAGES (TIDAK PERLU LOGIN)
// =====================

Route::get('/', fn() => view('home.index'));
Route::get('/index', fn() => view('home.index'));
Route::get('/about', fn() => view('home.about'));
Route::get('/blog', fn() => view('home.blog'));
Route::get('/contact', fn() => view('home.contact'));
Route::get('/elements', fn() => view('home.elements'));
Route::get('/recipes', fn() => view('home.recipes'));
Route::get('/bookmarks', fn() => view('home.bookmarks'));


// =====================
// RECIPE DETAIL PAGES (Menggunakan nama file yang benar)
// =====================
Route::get('/recipes_details', function () {
    return view('home.recipes_details');
})->name('recipe.detail');

// Jika ingin pakai slug dynamic (opsional)
Route::get('/recipes_details/{slug}', function ($slug) {
    return view('home.recipes_details', compact('slug'));
})->name('recipe.detail.slug');

Route::get('/galeri', function () {
    return view('home.galeri');
});

Route::middleware(['checkSupabase'])->group(function () {

    Route::get('/dashboard', fn() => view('dashboard.index'));
    Route::get('/kategori', fn() => view('dashboard.kategori'));
    Route::get('/tambah_resep', fn() => view('dashboard.tambah_resep'));
    Route::get('/edit_resep', fn() => view('dashboard.edit_resep'));
    Route::get('/view_resep', fn() => view('dashboard.view_resep'));
    Route::get('/tambah_kategori', fn() => view('dashboard.tambah_kategori'));
    Route::get('/edit_kategori', fn() => view('dashboard.edit_kategori'));
    Route::get('/view_saran', fn() => view('dashboard.view_saran'));
    Route::get('/saran', fn() => view('dashboard.saran'));
    Route::get('/saran_resep', fn() => view('dashboard.saran_resep'));
    Route::get('/view_saranresep', fn() => view('dashboard.view_saranresep'));
    Route::get('/activity_logs', fn() => view('dashboard.activity_logs'));
    Route::get('/view_activitylogs', fn() => view('dashboard.view_activitylogs'));

});
