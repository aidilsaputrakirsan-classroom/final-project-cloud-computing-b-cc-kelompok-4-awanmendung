<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupabaseController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\SaranResepController;
use App\Http\Controllers\ActivityLogController;

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
    session()->flush();
    return redirect('/');
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
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::post('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::get('/kategori/get/{id}', [KategoriController::class, 'get'])->name('kategori.get');
    Route::delete('/kategori/{id}', [KategoriController::class, 'delete']);
    Route::get('/resep/list', [ResepController::class, 'list']);
    Route::post('/resep/store', [ResepController::class, 'store']);
    Route::delete('/resep/delete/{id}', [ResepController::class, 'delete']);
    Route::get('/resep/view/{id}', [ResepController::class, 'view']);
    Route::get('/resep/edit/{id}', [ResepController::class, 'show']);
    Route::post('/resep/update/{id}', [ResepController::class, 'update']);
    Route::get('/saran/list', [SaranController::class, 'list']);
    Route::delete('/saran/delete/{id}', [SaranController::class, 'delete']);
    Route::get('/saran/view/{id}', [SaranController::class, 'view'])->name('saran.view');
    Route::prefix('saran_resep')->group(function () {
        Route::get('/', [SaranResepController::class, 'index']);
        Route::get('/list', [SaranResepController::class, 'list']);
        Route::get('/view/{id}', [SaranResepController::class, 'view']);
        Route::delete('/delete/{id}', [SaranResepController::class, 'delete']);
    });
    Route::prefix('activity_logs')->group(function () {
        Route::get('list', [ActivityLogController::class, 'list']);
        Route::post('log', [ActivityLogController::class, 'log']);
        Route::delete('delete/{id}', [ActivityLogController::class, 'delete']);
        Route::get('view/{id}', [ActivityLogController::class, 'view']);
        Route::get('api/{id}', [ActivityLogController::class, 'apiView']);
    });
});

Route::get('/home/recipes', [ResepController::class, 'homeRecipes']);
Route::get('/recipes/list', [ResepController::class, 'listForPage']);
Route::get('/recipes/details', [ResepController::class, 'details']);
Route::get('/kategori/list', [KategoriController::class, 'list']);