<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $q = Category::query()->withCount('posts');

        // filter & search
        if ($request->filled('status')) {
            $request->status === 'active'
                ? $q->where('is_active', true)
                : ($request->status === 'inactive' ? $q->where('is_active', false) : null);
        }
        if ($request->filled('search')) {
            $s = $request->string('search');
            $q->where(function ($x) use ($s) {
                $x->where('name','like',"%{$s}%")
                  ->orWhere('slug','like',"%{$s}%")
                  ->orWhere('description','like',"%{$s}%");
            });
        }

        $categories = $q->orderBy('name')->paginate(10)->withQueryString();

        return view('categories.index', [
            'categories' => $categories,
            'filters' => [
                'search' => $request->string('search'),
                'status' => $request->string('status'),
            ],
        ]);
    }

    public function create()
    {
        return view('categories.create', [
            'parents' => Category::orderBy('name')->get(['id','name']),
        ]);
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);

        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Category created.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', [
            'category' => $category,
            'parents'  => Category::where('id','<>',$category->id)->orderBy('name')->get(['id','name']),
        ]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Category updated.');
    }

    public function destroy(Category $category)
    {
        // optional: cek relasi posts_count > 0 → tolak hapus
        if (method_exists($category, 'posts') && $category->posts()->exists()) {
            return back()->with('error','Cannot delete: category has posts.');
        }
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted.');
    }
}
