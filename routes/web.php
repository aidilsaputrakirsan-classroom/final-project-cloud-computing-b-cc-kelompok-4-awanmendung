<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupabaseController;



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
