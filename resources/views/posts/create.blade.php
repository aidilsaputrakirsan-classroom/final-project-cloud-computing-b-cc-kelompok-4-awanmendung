@extends('layouts.dashboard')

@section('title', 'Create New Post')
@section('page-title', 'Create New Post')
@section('page-description', 'Add a new blog post or article')

@section('content')
<div class="max-w-4xl">
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <!-- Basic Information Card -->
        <div class="card">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Basic Information</h3>
            
            <!-- Title Field -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                <input type="text" 
                       name="title" 
                       id="title"
                       value="{{ old('title') }}"
                       class="input-field w-full @error('title') border-red-300 @enderror"
                       placeholder="Enter post title..."
                       required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Content Field -->
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                <textarea name="content" 
                          id="content"
                          rows="15"
                          class="input-field w-full @error('content') border-red-300 @enderror"
                          placeholder="Write your post content here..."
                          required>{{ old('content') }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Excerpt Field -->
            <div class="mb-4">
                <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Excerpt</label>
                <textarea name="excerpt" 
                          id="excerpt"
                          rows="3"
                          class="input-field w-full @error('excerpt') border-red-300 @enderror"
                          placeholder="Optional excerpt or summary...">{{ old('excerpt') }}</textarea>
                @error('excerpt')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <!-- Metadata and Settings Card -->
        <div class="card">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Settings</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                    <select name="status" id="status" class="input-field w-full @error('status') border-red-300 @enderror" required>
                        <option value="draft" {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                        <option value="archived" {{ old('status') === 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Category -->
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                    <select name="category_id" id="category_id" class="input-field w-full @error('category_id') border-red-300 @enderror" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Author -->
                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">Author *</label>
                    <select name="user_id" id="user_id" class="input-field w-full @error('user_id') border-red-300 @enderror" required>
                        <option value="">Select Author</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->role }})
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Featured Image -->
                <div>
                    <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                    <input type="file" 
                           name="featured_image" 
                           id="featured_image"
                           accept="image/*"
                           class="input-field w-full @error('featured_image') border-red-300 @enderror">
                    @error('featured_image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <!-- Tags -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                    @foreach($tags as $tag)
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="tags[]" 
                                   value="{{ $tag->id }}"
                                   class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50"
                                   {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700">{{ $tag->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
            
            <!-- Options -->
            <div class="mt-4 flex space-x-6">
                <label class="flex items-center">
                    <input type="checkbox" 
                           name="is_featured" 
                           value="1"
                           class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50"
                           {{ old('is_featured') ? 'checked' : '' }}>
                    <span class="ml-2 text-sm text-gray-700">Featured Post</span>
                </label>
                
                <label class="flex items-center">
                    <input type="checkbox" 
                           name="allow_comments" 
                           value="1"
                           class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50"
                           {{ old('allow_comments', true) ? 'checked' : '' }}>
                    <span class="ml-2 text-sm text-gray-700">Allow Comments</span>
                </label>
            </div>
        </div>
        
        <!-- Form Actions -->
        <div class="flex justify-between">
            <a href="{{ route('posts.index') }}" class="btn-secondary">
                Cancel
            </a>
            
            <div class="flex space-x-3">
                <button type="submit" name="status" value="draft" class="btn-secondary">
                    Save as Draft
                </button>
                <button type="submit" name="status" value="published" class="btn-primary">
                    Publish Post
                </button>
            </div>
        </div>
    </form>
</div>
@endsection