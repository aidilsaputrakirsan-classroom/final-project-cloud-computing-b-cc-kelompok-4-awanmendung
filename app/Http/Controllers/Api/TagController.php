<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $q = Tag::query()->withCount('posts');

        if ($request->filled('status')) {
            $request->status === 'active'
                ? $q->where('is_active', true)
                : ($request->status === 'inactive' ? $q->where('is_active', false) : null);
        }
        if ($request->filled('search')) {
            $s = $request->string('search');
            $q->where(fn($x)=> $x->where('name','like',"%{$s}%")
                                 ->orWhere('slug','like',"%{$s}%"));
        }

        $tags = $q->orderBy('name')->paginate(10)->withQueryString();

        return view('tags.index', [
            'tags' => $tags,
            'filters' => [
                'search' => $request->string('search'),
                'status' => $request->string('status'),
            ],
        ]);
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(TagRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);
        Tag::create($data);

        return redirect()->route('tags.index')->with('success', 'Tag created.');
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);
        $tag->update($data);

        return redirect()->route('tags.index')->with('success', 'Tag updated.');
    }

    public function destroy(Tag $tag)
    {
        if ($tag->posts()->exists()) {
            return back()->with('error','Cannot delete: tag is attached to posts.');
        }
        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Tag deleted.');
    }
}
