
@extends('layouts.dashboard')

@section('title', 'Edit Post: ' . $post->title)
@section('page-title', 'Edit Post')
@section('page-description', 'Update existing blog post or article')

@section('content')
<div class="max-w-4xl">
    <!-- Progress Indicator -->
    <div class="mb-6">
        <div class="flex items-center justify-between text-sm text-gray-500">
            <span>Last updated: {{ $post->updated_at->diffForHumans() }}</span>
            <span>Created: {{ $post->created_at->format('M j, Y') }}</span>
        </div>
    </div>

    <form action="{{ route('posts.update', $post) }}" 
          method="POST" 
          enctype="multipart/form-data" 
          class="space-y-6"
          id="editPostForm">
        @csrf
        @method('PUT')
        
        <!-- Basic Information Card -->
        <div class="card">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">Basic Information</h3>
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-500">Auto-save:</span>
                    <div class="w-2 h-2 bg-gray-300 rounded-full" id="autoSaveIndicator"></div>
                </div>
            </div>
            
            <!-- Title Field dengan real-time slug preview -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                <input type="text" 
                       name="title" 
                       id="title"
                       value="{{ old('title', $post->title) }}"
                       class="input-field w-full @error('title') border-red-300 @enderror"
                       placeholder="Enter post title..."
                       onkeyup="updateSlugPreview()"
                       required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <!-- Slug Preview -->
                <p class="mt-1 text-sm text-gray-500">
                    URL: <span class="font-mono text-primary-600" id="slugPreview">{{ $post->slug }}</span>
                </p>
            </div>
            
            <!-- Content Field dengan character counter -->
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                <textarea name="content" 
                          id="content"
                          rows="15"
                          class="input-field w-full @error('content') border-red-300 @enderror"
                          placeholder="Write your post content here..."
                          onkeyup="updateCharacterCount()"
                          required>{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <div class="mt-1 flex justify-between text-sm text-gray-500">
                    <span>Minimum 10 characters required</span>
                    <span id="characterCount">{{ strlen($post->content) }} characters</span>
                </div>
            </div>
            
            <!-- Excerpt Field -->
            <div class="mb-4">
                <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">
                    Excerpt 
                    <span class="text-gray-400">(Optional - auto-generated if empty)</span>
                </label>
                <textarea name="excerpt" 
                          id="excerpt"
                          rows="3"
                          class="input-field w-full @error('excerpt') border-red-300 @enderror"
                          placeholder="Optional excerpt or summary..."
                          maxlength="500">{{ old('excerpt', $post->excerpt) }}</textarea>
                @error('excerpt')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <!-- Featured Image Management Card -->
        <div class="card">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Featured Image</h3>
            
            <!-- Current Featured Image Display -->
            @if($post->featured_image)
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                    <div class="relative inline-block">
                        <img src="{{ $post->featured_image_url }}" 
                             alt="{{ $post->title }}"
                             class="h-32 w-48 object-cover rounded-lg border border-gray-200"
                             id="currentFeaturedImage">
                        <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-30 transition-all duration-200 rounded-lg flex items-center justify-center">
                            <button type="button" 
                                    class="opacity-0 hover:opacity-100 bg-red-600 text-white px-3 py-1 rounded text-sm transition-opacity"
                                    onclick="toggleRemoveImage()">
                                Remove
                            </button>
                        </div>
                    </div>
                    
                    <!-- Remove Image Checkbox -->
                    <div class="mt-2">
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="remove_featured_image" 
                                   value="1"
                                   class="rounded border-gray-300 text-red-600 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                                   id="removeFeaturedImage"
                                   onchange="toggleImageRemoval()">
                            <span class="ml-2 text-sm text-red-600">Remove current featured image</span>
                        </label>
                    </div>
                </div>
            @endif
            
            <!-- Upload New Image -->
            <div class="mb-4" id="imageUploadSection">
                <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">
                    {{ $post->featured_image ? 'Replace with New Image' : 'Upload Featured Image' }}
                </label>
                <div class="flex items-center space-x-4">
                    <input type="file" 
                           name="featured_image" 
                           id="featured_image"
                           accept="image/*"
                           class="input-field flex-1 @error('featured_image') border-red-300 @enderror"
                           onchange="previewNewImage(event)">
                    <div class="text-sm text-gray-500">
                        Max: 2MB<br>
                        Formats: JPEG, PNG, GIF, WebP
                    </div>
                </div>
                @error('featured_image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                
                <!-- Image Preview untuk new upload -->
                <div class="mt-3 hidden" id="imagePreviewContainer">
                    <img id="imagePreview" class="h-32 w-48 object-cover rounded-lg border border-gray-200" alt="Preview">
                </div>
            </div>
        </div>
        
        <!-- Metadata and Settings Card -->
        <div class="card">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Settings & Metadata</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Status dengan conditional fields -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                    <select name="status" 
                            id="status" 
                            class="input-field w-full @error('status') border-red-300 @enderror" 
                            onchange="togglePublishOptions()"
                            required>
                        <option value="draft" {{ old('status', $post->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $post->status) === 'published' ? 'selected' : '' }}>Published</option>
                        <option value="archived" {{ old('status', $post->status) === 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Category dengan live search -->
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                    <select name="category_id" 
                            id="category_id" 
                            class="input-field w-full @error('category_id') border-red-300 @enderror" 
                            required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                    {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                                    data-color="{{ $category->color }}">
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
                    <select name="user_id" 
                            id="user_id" 
                            class="input-field w-full @error('user_id') border-red-300 @enderror" 
                            required>
                        <option value="">Select Author</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" 
                                    {{ old('user_id', $post->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->role }})
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Published Date dengan conditional display -->
                <div id="publishDateSection" style="display: {{ old('status', $post->status) === 'published' ? 'block' : 'none' }}">
                    <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">
                        Published Date
                    </label>
                    <input type="datetime-local" 
                           name="published_at" 
                           id="published_at"
                           value="{{ old('published_at', $post->published_at?->format('Y-m-d\TH:i')) }}"
                           class="input-field w-full @error('published_at') border-red-300 @enderror">
                    @error('published_at')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    
                    <!-- Schedule Publishing Option -->
                    <div class="mt-2">
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="schedule_publish" 
                                   value="1"
                                   class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700">Schedule for future publishing</span>
                        </label>
                    </div>
                </div>
            </div>
            
            <!-- Tags Selection dengan improved UI -->
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-3">Tags</label>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 max-h-40 overflow-y-auto border border-gray-200 rounded-lg p-3">
                    @foreach($tags as $tag)
                        <label class="flex items-center hover:bg-gray-50 p-1 rounded">
                            <input type="checkbox" 
                                   name="tags[]" 
                                   value="{{ $tag->id }}"
                                   class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50"
                                   {{ in_array($tag->id, old('tags', $selectedTags)) ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700">{{ $tag->name }}</span>
                            <span class="ml-1 w-3 h-3 rounded-full" style="background-color: {{ $tag->color }}"></span>
                        </label>
                    @endforeach
                </div>
                <p class="mt-1 text-sm text-gray-500">
                    Selected: <span id="selectedTagsCount">{{ count($selectedTags) }}</span> tags
                </p>
            </div>
            
            <!-- Options -->
            <div class="mt-6 flex flex-wrap gap-6">
                <label class="flex items-center">
                    <input type="checkbox" 
                           name="is_featured" 
                           value="1"
                           class="rounded border-gray-300 text-yellow-600 shadow-sm focus:border-yellow-300 focus:ring focus:ring-yellow-200 focus:ring-opacity-50"
                           {{ old('is_featured', $post->is_featured) ? 'checked' : '' }}>
                    <span class="ml-2 text-sm text-gray-700">Featured Post</span>
                </label>
                
                <label class="flex items-center">
                    <input type="checkbox" 
                           name="allow_comments" 
                           value="1"
                           class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                           {{ old('allow_comments', $post->allow_comments) ? 'checked' : '' }}>
                    <span class="ml-2 text-sm text-gray-700">Allow Comments</span>
                </label>
            </div>
        </div>
        
        <!-- SEO Metadata Card -->
        <div class="card">
            <h3 class="text-lg font-medium text-gray-900 mb-4">SEO Metadata</h3>
            
            <!-- Meta Title -->
            <div class="mb-4">
                <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">
                    Meta Title
                    <span class="text-gray-400">(Leave empty to use post title)</span>
                </label>
                <input type="text" 
                       name="meta_title" 
                       id="meta_title"
                       value="{{ old('meta_title', $post->meta_title) }}"
                       class="input-field w-full @error('meta_title') border-red-300 @enderror"
                       maxlength="255"
                       placeholder="SEO-optimized title for search engines">
                @error('meta_title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Meta Description -->
            <div class="mb-4">
                <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">
                    Meta Description
                </label>
                <textarea name="meta_description" 
                          id="meta_description"
                          rows="3"
                          class="input-field w-full @error('meta_description') border-red-300 @enderror"
                          maxlength="500"
                          placeholder="Brief description for search engine results">{{ old('meta_description', $post->meta_description) }}</textarea>
                @error('meta_description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Meta Keywords -->
            <div class="mb-4">
                <label for="meta_keywords" class="block text-sm font-medium text-gray-700 mb-2">
                    Meta Keywords
                    <span class="text-gray-400">(Comma-separated)</span>
                </label>
                <input type="text" 
                       name="meta_keywords" 
                       id="meta_keywords"
                       value="{{ old('meta_keywords', $post->meta_keywords) }}"
                       class="input-field w-full @error('meta_keywords') border-red-300 @enderror"
                       placeholder="keyword1, keyword2, keyword3">
                @error('meta_keywords')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <!-- Form Actions -->
        <div class="flex justify-between">
            <a href="{{ route('posts.index') }}" class="btn-secondary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Posts
            </div>
            
            <div class="flex space-x-3">
                <button type="button" 
                        class="btn-secondary" 
                        onclick="saveDraft()">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                    Save Draft
                </button>
                
                <button type="submit" class="btn-primary" id="updatePostBtn">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    Update Post
                </button>
            </div>
        </div>
    </form>
</div>

<!-- JavaScript untuk enhanced functionality -->
<script>
// Real-time slug preview
function updateSlugPreview() {
    const title = document.getElementById('title').value;
    const slug = title.toLowerCase()
                     .replace(/[^a-z0-9]+/g, '-')
                     .replace(/(^-|-$)/g, '');
    document.getElementById('slugPreview').textContent = slug || 'post-slug';
}

// Character counter untuk content
function updateCharacterCount() {
    const content = document.getElementById('content').value;
    document.getElementById('characterCount').textContent = content.length + ' characters';
}

// Toggle publish date section berdasarkan status
function togglePublishOptions() {
    const status = document.getElementById('status').value;
    const publishSection = document.getElementById('publishDateSection');
    
    if (status === 'published') {
        publishSection.style.display = 'block';
    } else {
        publishSection.style.display = 'none';
    }
}

// Image removal toggle
function toggleRemoveImage() {
    const checkbox = document.getElementById('removeFeaturedImage');
    checkbox.checked = !checkbox.checked;
    toggleImageRemoval();
}

function toggleImageRemoval() {
    const checkbox = document.getElementById('removeFeaturedImage');
    const currentImage = document.getElementById('currentFeaturedImage');
    
    if (checkbox.checked) {
        currentImage.style.opacity = '0.3';
        currentImage.style.filter = 'grayscale(100%)';
    } else {
        currentImage.style.opacity = '1';
        currentImage.style.filter = 'grayscale(0%)';
    }
}

// Preview new image upload
function previewNewImage(event) {
    const file = event.target.files[0];
    const container = document.getElementById('imagePreviewContainer');
    const preview = document.getElementById('imagePreview');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            container.classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    } else {
        container.classList.add('hidden');
    }
}

// Save as draft function
function saveDraft() {
    const form = document.getElementById('editPostForm');
    const statusField = document.getElementById('status');
    statusField.value = 'draft';
    form.submit();
}

// Auto-save functionality (optional)
let autoSaveTimer;
function setupAutoSave() {
    const form = document.getElementById('editPostForm');
    const indicator = document.getElementById('autoSaveIndicator');
    
    // Clear existing timer
    if (autoSaveTimer) {
        clearTimeout(autoSaveTimer);
    }
    
    // Set new timer
    autoSaveTimer = setTimeout(() => {
        // Auto-save logic here (AJAX call)
        indicator.classList.remove('bg-gray-300');
        indicator.classList.add('bg-green-500');
        setTimeout(() => {
            indicator.classList.remove('bg-green-500');
            indicator.classList.add('bg-gray-300');
        }, 2000);
    }, 30000); // Auto-save setiap 30 detik
}

// Update selected tags counter
document.addEventListener('DOMContentLoaded', function() {
    const tagCheckboxes = document.querySelectorAll('input[name="tags[]"]');
    const counter = document.getElementById('selectedTagsCount');
    
    tagCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const selected = document.querySelectorAll('input[name="tags[]"]:checked').length;
            counter.textContent = selected;
        });
    });
    
    // Setup auto-save
    setupAutoSave();
    
    // Setup form change detection untuk auto-save
    const formInputs = document.querySelectorAll('#editPostForm input, #editPostForm textarea, #editPostForm select');
    formInputs.forEach(input => {
        input.addEventListener('change', setupAutoSave);
        input.addEventListener('keyup', setupAutoSave);
    });
});
</script>
@endsection

