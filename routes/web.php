<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupabaseController;

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

Route::get('/loginadmin', function () {
    return view('loginadmin.index');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/kategori', function () {
    return view('dashboard.kategori');
});

Route::get('/bookmarks', function () {
    return view('home.bookmarks');
});

Route::get('/tambah_resep', function () {
    return view('dashboard.tambah_resep');
});

Route::get('/edit_resep', function () {
    return view('dashboard.edit_resep');
});

Route::get('/view_resep', function () {
    return view('dashboard.view_resep');
});

Route::get('/tambah_kategori', function () {
    return view('dashboard.tambah_kategori');
});

Route::get('/edit_kategori', function () {
    return view('dashboard.edit_kategori');
});

Route::get('/saran', function () {
    return view('dashboard.saran');
});

Route::get('/view_saran', function () {
    return view('dashboard.view_saran');
});

Route::get('/saran_resep', function () {
    return view('dashboard.saran_resep');
});

Route::get('/view_saranresep', function () {
    return view('dashboard.view_saranresep');
});

Route::get('/activity_logs', function () {
    return view('dashboard.activity_logs');
});

Route::get('/view_activitylogs', function () {
    return view('dashboard.view_activitylogs');
});

Route::get('/login', function () {
    return view('login.index');
});

Route::post('/login', [SupabaseController::class, 'login'])->name('login');

Route::get('/register', function () {
    return view('register.index');
});


Route::get('/', function () {
    return view('home.index');
});

Route::get('/index', function () {
    return view('home.index');
});

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
