
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostApiController;
use App\Http\Controllers\Api\CategoryApiController;

/*
|--------------------------------------------------------------------------
| API Routes - Praktikum Cloud Computing ITK Week 4
|--------------------------------------------------------------------------
|
| API routes untuk AJAX operations dan frontend integration
| Semua routes menggunakan prefix 'api' dan middleware 'api'
|
*/

// API info endpoint
Route::get('/info', function (Request $request) {
    return response()->json([
        'application' => 'Praktikum Cloud Computing ITK',
        'version' => '1.0.0',
        'laravel_version' => app()->version(),
        'api_version' => 'v1',
        'timestamp' => now()->toISOString(),
        'endpoints' => [
            'posts' => '/api/posts',
            'categories' => '/api/categories',
            'search' => '/api/posts/search',
        ]
    ]);
});

/*
|--------------------------------------------------------------------------
| Posts API Routes
|--------------------------------------------------------------------------
*/

// RESTful API untuk posts
Route::apiResource('posts', PostApiController::class);

// Additional posts API endpoints
Route::prefix('posts')->group(function () {
    // Search posts by keyword
    Route::get('search/{keyword}', [PostApiController::class, 'search'])
          ->name('api.posts.search');
    
    // Get posts by category
    Route::get('category/{category}', [PostApiController::class, 'byCategory'])
          ->name('api.posts.by-category');
    
    // Get posts by tag
    Route::get('tag/{tag}', [PostApiController::class, 'byTag'])
          ->name('api.posts.by-tag');
    
    // Get featured posts
    Route::get('featured', [PostApiController::class, 'featured'])
          ->name('api.posts.featured');
    
    // Get published posts only
    Route::get('published', [PostApiController::class, 'published'])
          ->name('api.posts.published');
});

/*
|--------------------------------------------------------------------------
| Categories API Routes
|--------------------------------------------------------------------------
*/

// RESTful API untuk categories
Route::apiResource('categories', CategoryApiController::class);

// Additional categories API endpoints
Route::prefix('categories')->group(function () {
    // Get category tree (hierarchical structure)
    Route::get('tree', [CategoryApiController::class, 'tree'])
          ->name('api.categories.tree');
    
    // Get active categories only
    Route::get('active', [CategoryApiController::class, 'active'])
          ->name('api.categories.active');
});

/*
|--------------------------------------------------------------------------
| Statistics API Routes
|--------------------------------------------------------------------------
*/

// Dashboard statistics untuk admin interface
Route::get('/stats', function () {
    return response()->json([
        'total_posts' => \App\Models\Post::count(),
        'published_posts' => \App\Models\Post::published()->count(),
        'draft_posts' => \App\Models\Post::where('status', 'draft')->count(),
        'total_categories' => \App\Models\Category::count(),
        'total_tags' => \App\Models\Tag::count(),
        'total_users' => \App\Models\User::count(),
        'recent_posts' => \App\Models\Post::latest()->take(5)->pluck('title'),
        'generated_at' => now()->toISOString(),
    ]);
})->name('api.stats');
