<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display listing of posts dengan pagination dan filtering
     * Method ini untuk admin interface - menampilkan semua posts
     */
    public function index(Request $request)
    {
        // Query builder untuk posts dengan eager loading relationships
        $query = Post::with(['user', 'category', 'tags'])
                    ->withCount('comments'); // Include comment count

        // Filtering berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filtering berdasarkan category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filtering berdasarkan author
        if ($request->filled('author')) {
            $query->where('user_id', $request->author);
        }

        // Search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('content', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('excerpt', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Sorting - default by latest created
        $sortBy = $request->get('sort', 'created_at');
        $sortOrder = $request->get('order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        // Pagination dengan 10 posts per page
        $posts = $query->paginate(10)->withQueryString();

        // Data untuk filter dropdowns
        $categories = Category::active()->orderBy('name')->get();
        $authors = User::active()->orderBy('name')->get();

        // Statistics untuk dashboard
        $stats = [
            'total' => Post::count(),
            'published' => Post::published()->count(),
            'draft' => Post::where('status', 'draft')->count(),
            'archived' => Post::where('status', 'archived')->count(),
        ];

        return view('posts.index', compact('posts', 'categories', 'authors', 'stats'));
    }

    /**
     * Show form untuk create new post
     */
    public function create()
    {
        // Data untuk form dropdowns
        $categories = Category::active()->orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();
        $users = User::active()->role(['admin', 'editor', 'author'])->orderBy('name')->get();

        return view('posts.create', compact('categories', 'tags', 'users'));
    }

    /**
     * Store new post ke database
     */
    public function store(Request $request)
    {
        // Validation rules untuk create post
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
            'excerpt' => 'nullable|string|max:500',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published,archived',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'allow_comments' => 'boolean',
        ]);

        // Generate unique slug dari title
        $validated['slug'] = $this->generateUniqueSlug($validated['title']);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')
                                                 ->store('posts/featured-images', 'public');
        }

        // Set published_at jika status published
        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        }

        // Create post record
        $post = Post::create($validated);

        // Attach tags jika ada
        if (!empty($validated['tags'])) {
            $post->tags()->attach($validated['tags']);
        }

        // Flash message success
        return redirect()->route('posts.index')
                        ->with('success', "Post '{$post->title}' berhasil dibuat!");
    }

    /**
     * Display single post untuk admin view
     */
    public function show(Post $post)
    {
        // Load relationships untuk display
        $post->load(['user', 'category', 'tags', 'comments.user']);

        // Increment views count (optional untuk admin view)
        $post->incrementViews();

        // Related posts berdasarkan category dan tags
        $relatedPosts = Post::published()
                           ->where('id', '!=', $post->id)
                           ->where(function ($query) use ($post) {
                               $query->where('category_id', $post->category_id)
                                     ->orWhereHas('tags', function ($q) use ($post) {
                                         $q->whereIn('tags.id', $post->tags->pluck('id'));
                                     });
                           })
                           ->withCount('comments')
                           ->take(3)
                           ->get();

        return view('posts.show', compact('post', 'relatedPosts'));
    }

    /**
     * Show edit form untuk existing post
     */
    public function edit(Post $post)
    {
        // Data untuk form dropdowns
        $categories = Category::active()->orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();
        $users = User::active()->role(['admin', 'editor', 'author'])->orderBy('name')->get();

        // Selected tags untuk form
        $selectedTags = $post->tags->pluck('id')->toArray();

        return view('posts.edit', compact('post', 'categories', 'tags', 'users', 'selectedTags'));
    }

    /**
     * Update existing post
     */
    public function update(Request $request, Post $post)
    {
        // Validation rules untuk update post
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
            'excerpt' => 'nullable|string|max:500',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published,archived',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'allow_comments' => 'boolean',
        ]);

        // Update slug jika title berubah
        if ($post->title !== $validated['title']) {
            $validated['slug'] = $this->generateUniqueSlug($validated['title'], $post->id);
        }

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image jika ada
            if ($post->featured_image) {
                \Storage::disk('public')->delete($post->featured_image);
            }
            
            $validated['featured_image'] = $request->file('featured_image')
                                                 ->store('posts/featured-images', 'public');
        }

        // Set published_at jika status berubah ke published
        if ($validated['status'] === 'published' && $post->status !== 'published') {
            $validated['published_at'] = now();
        }

        // Update post record
        $post->update($validated);

        // Sync tags
        if (isset($validated['tags'])) {
            $post->tags()->sync($validated['tags']);
        } else {
            $post->tags()->detach();
        }

        // Flash message success
        return redirect()->route('posts.index')
                        ->with('success', "Post '{$post->title}' berhasil diupdate!");
    }

    /**
     * Delete post dari database
     */
    public function destroy(Post $post)
    {
        $title = $post->title;

        // Delete featured image jika ada
        if ($post->featured_image) {
            \Storage::disk('public')->delete($post->featured_image);
        }

        // Soft delete post (karena menggunakan SoftDeletes trait)
        $post->delete();

        // Flash message success
        return redirect()->route('posts.index')
                        ->with('success', "Post '{$title}' berhasil dihapus!");
    }

    /*
    |--------------------------------------------------------------------------
    | Public Frontend Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Display published posts untuk public blog
     */
    public function publicIndex(Request $request)
    {
        $query = Post::published()
                    ->with(['user', 'category', 'tags'])
                    ->withCount('comments');

        // Search functionality untuk public
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->search($searchTerm);
        }

        // Sorting untuk public (default by published_at)
        $query->latest('published_at');

        // Pagination untuk public view
        $posts = $query->paginate(6)->withQueryString();

        // Featured posts untuk hero section
        $featuredPosts = Post::published()
                            ->featured()
                            ->with(['user', 'category'])
                            ->take(3)
                            ->get();

        return view('blog.index', compact('posts', 'featuredPosts'));
    }

    /**
     * Display single published post untuk public view
     */
    public function publicShow(Post $post)
    {
        // Ensure post is published
        if (!$post->isPublished()) {
            abort(404);
        }

        // Load relationships
        $post->load(['user', 'category', 'tags', 'comments.user.replies']);

        // Increment views count
        $post->incrementViews();

        // Related posts
        $relatedPosts = Post::published()
                           ->where('id', '!=', $post->id)
                           ->where('category_id', $post->category_id)
                           ->withCount('comments')
                           ->take(3)
                           ->get();

        return view('blog.show', compact('post', 'relatedPosts'));
    }

    /**
     * Get posts by category untuk public view
     */
    public function byCategory(Category $category)
    {
        $posts = Post::published()
                    ->where('category_id', $category->id)
                    ->with(['user', 'category', 'tags'])
                    ->withCount('comments')
                    ->latest('published_at')
                    ->paginate(10);

        return view('blog.category', compact('posts', 'category'));
    }

    /**
     * Get posts by tag untuk public view
     */
    public function byTag(Tag $tag)
    {
        $posts = Post::published()
                    ->whereHas('tags', function ($query) use ($tag) {
                        $query->where('tags.id', $tag->id);
                    })
                    ->with(['user', 'category', 'tags'])
                    ->withCount('comments')
                    ->latest('published_at')
                    ->paginate(10);

        return view('blog.tag', compact('posts', 'tag'));
    }

    /**
     * Search posts untuk public view
     */
    public function search(Request $request)
    {
        $searchTerm = $request->get('q', '');
        
        $posts = collect();
        if (!empty($searchTerm)) {
            $posts = Post::published()
                        ->search($searchTerm)
                        ->with(['user', 'category', 'tags'])
                        ->withCount('comments')
                        ->latest('published_at')
                        ->paginate(10)
                        ->withQueryString();
        }

        return view('blog.search', compact('posts', 'searchTerm'));
    }

    /*
    |--------------------------------------------------------------------------
    | Helper Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Generate unique slug untuk post
     */
    private function generateUniqueSlug($title, $excludeId = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        // Check if slug exists
        while (true) {
            $query = Post::where('slug', $slug);
            
            if ($excludeId) {
                $query->where('id', '!=', $excludeId);
            }
            
            if (!$query->exists()) {
                break;
            }
            
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}