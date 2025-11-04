<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes - Praktikum Cloud Computing ITK Week 4
|--------------------------------------------------------------------------
|
| Routes untuk CRUD operations dengan Laravel Resource Controllers
| Menggunakan RESTful conventions untuk consistent API design
|
*/

// Homepage route (dari week 2)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard route untuk admin interface
Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| Resource Routes untuk CRUD Operations
|--------------------------------------------------------------------------
*/

// Posts management routes
Route::resource('posts', PostController::class)->names([
    'index' => 'posts.index',       // GET /posts - List all posts
    'create' => 'posts.create',     // GET /posts/create - Show create form
    'store' => 'posts.store',       // POST /posts - Store new post
    'show' => 'posts.show',         // GET /posts/{post} - Show single post
    'edit' => 'posts.edit',         // GET /posts/{post}/edit - Show edit form
    'update' => 'posts.update',     // PUT/PATCH /posts/{post} - Update post
    'destroy' => 'posts.destroy',   // DELETE /posts/{post} - Delete post
]);

// Categories management routes
Route::resource('categories', CategoryController::class)->except([
    'show' // Categories tidak memerlukan show page individual
]);

// Tags management routes  
Route::resource('tags', TagController::class)->except([
    'show' // Tags tidak memerlukan show page individual
]);

// Comments routes (nested dalam posts)
Route::resource('posts.comments', CommentController::class)->except([
    'index', 'show' // Comments di-handle dalam post show page
])->shallow(); // Shallow nesting untuk edit/update/delete

/*
|--------------------------------------------------------------------------
| Additional Routes untuk Enhanced Functionality
|--------------------------------------------------------------------------
*/

// Route untuk public post viewing (tanpa authentication)
Route::get('/blog', [PostController::class, 'publicIndex'])->name('blog.index');
Route::get('/blog/{post:slug}', [PostController::class, 'publicShow'])->name('blog.show');

// Route untuk category filtering
Route::get('/category/{category:slug}', [PostController::class, 'byCategory'])->name('posts.by-category');

// Route untuk tag filtering
Route::get('/tag/{tag:slug}', [PostController::class, 'byTag'])->name('posts.by-tag');

// Search functionality
Route::get('/search', [PostController::class, 'search'])->name('posts.search');

/*
|--------------------------------------------------------------------------
| Testing Routes untuk Development
|--------------------------------------------------------------------------
*/

// Route testing untuk development purposes
Route::get('/test-data', function () {
    return response()->json([
        'posts_count' => \App\Models\Post::count(),
        'categories_count' => \App\Models\Category::count(),
        'tags_count' => \App\Models\Tag::count(),
        'users_count' => \App\Models\User::count(),
        'latest_post' => \App\Models\Post::latest()->first()?->title ?? 'No posts yet',
        'timestamp' => now()->toISOString(),
    ]);
})->name('test-data');