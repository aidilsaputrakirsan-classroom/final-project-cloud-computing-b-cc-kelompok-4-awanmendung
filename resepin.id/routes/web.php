<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// Halaman about
Route::get('/about', function () {
    return view('about');
});

// Halaman blog (daftar artikel)
Route::get('/blog', function () {
    return view('blog');
});

// Halaman blog detail (single blog)
Route::get('/blog/{id}', function ($id) {
    return view('single-blog', ['id' => $id]);
});

// Halaman kontak
Route::get('/contact', function () {
    return view('contact.index');
})->name('contact');

// Halaman resep (kalau ada fitur resep)
Route::get('/recipes', function () {
    return view('Recipes');
});

// Halaman detail resep
Route::get('/recipes/{id}', function ($id) {
    return view('recipes_details', ['id' => $id]);
});
