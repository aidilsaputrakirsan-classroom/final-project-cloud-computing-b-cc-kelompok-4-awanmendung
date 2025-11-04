
@extends('layouts.dashboard')

@section('title', 'Post Detail')
@section('page-title', 'Post Detail')

@section('content')
@php
  $hasExcerpt = filled($post->excerpt ?? null);
  $excerptTrim = trim((string) $post->excerpt);
  $contentTrim = trim((string) $post->content);
  $isDup = $hasExcerpt && (
      $excerptTrim === $contentTrim ||
      str_starts_with($contentTrim, $excerptTrim)     // PHP 8
  );
@endphp

<div class="max-w-5xl space-y-6">

  <div class="flex items-center justify-between">
    <a href="{{ route('posts.index') }}" class="btn-secondary">← Back</a>
    <div class="space-x-2">
      <a href="{{ route('posts.edit', $post) }}" class="btn-secondary">Edit</a>
      <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline"
            onsubmit="return confirm('Delete this post?');">
        @csrf @method('DELETE')
        <button class="btn-danger">Delete</button>
      </form>
    </div>
  </div>

  <div class="card">
    <div class="flex items-start justify-between gap-4">
      <div>
        <h2 class="text-2xl font-semibold">{{ $post->title }}</h2>
        <div class="mt-2 flex flex-wrap items-center gap-2 text-sm text-gray-600">
          <span class="px-2 py-0.5 rounded-full border
            {{ $post->status === 'published' ? 'border-green-300 text-green-700 bg-green-50' : 'border-gray-300 text-gray-700 bg-gray-50' }}">
            {{ ucfirst($post->status) }}
          </span>
          @if($post->category)
            <span>• Category: <span class="font-medium">{{ $post->category->name }}</span></span>
          @endif
          @if($post->user)
            <span>• Author: <span class="font-medium">{{ $post->user->name }}</span></span>
          @endif
          @if($post->published_at)
            <span>• Published: {{ $post->published_at->format('Y-m-d H:i') }}</span>
          @endif
        </div>
      </div>
    </div>

    @if($post->featured_image)
      <img src="{{ Storage::url($post->featured_image) }}"
           alt="" class="rounded-lg mt-4 max-h-80 w-full object-cover">
    @endif

    {{-- Excerpt (tampilkan hanya jika tidak duplikat) --}}
    @if($hasExcerpt && !$isDup)
      <div class="mt-4 p-4 rounded-lg bg-gray-50 border border-gray-200">
        <div class="text-sm uppercase tracking-wide text-gray-500 mb-1">Excerpt</div>
        <p class="text-gray-800">{{ $post->excerpt }}</p>
      </div>
    @endif

    {{-- Content --}}
    <div class="prose max-w-none mt-4">
      {!! nl2br(e($post->content)) !!}
    </div>

    {{-- Tags --}}
    @if($post->tags?->count())
      <div class="mt-6 flex flex-wrap gap-2">
        @foreach($post->tags as $tag)
          <span class="px-2 py-1 text-xs rounded bg-blue-50 text-blue-700 border border-blue-200">#{{ $tag->name }}</span>
        @endforeach
      </div>
    @endif
  </div>

  <div class="card">
    <h3 class="text-lg font-medium mb-2">Options</h3>
    <dl class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-y-2 text-sm">
      <div><dt class="text-gray-500">Featured</dt><dd>{{ $post->is_featured ? 'Yes' : 'No' }}</dd></div>
      <div><dt class="text-gray-500">Allow Comments</dt><dd>{{ $post->allow_comments ? 'Yes' : 'No' }}</dd></div>
      <div><dt class="text-gray-500">Slug</dt><dd><code>{{ $post->slug ?? '-' }}</code></dd></div>
      <div><dt class="text-gray-500">Created</dt><dd>{{ $post->created_at->format('Y-m-d H:i') }}</dd></div>
      <div><dt class="text-gray-500">Updated</dt><dd>{{ $post->updated_at->format('Y-m-d H:i') }}</dd></div>
    </dl>
  </div>

</div>
@endsection

