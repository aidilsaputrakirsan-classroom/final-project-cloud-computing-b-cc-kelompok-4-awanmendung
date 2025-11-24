@php
  $editing = isset($category);
@endphp

<div class="grid md:grid-cols-2 gap-4">
  <div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
    <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" class="input-field" required>
    @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
  </div>

  <div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Slug (optional)</label>
    <input type="text" name="slug" value="{{ old('slug', $category->slug ?? '') }}" class="input-field">
    @error('slug') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
  </div>

  <div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Parent (optional)</label>
    <select name="parent_id" class="input-field">
      <option value="">— None —</option>
      @foreach($parents as $p)
        <option value="{{ $p->id }}" @selected(old('parent_id', $category->parent_id ?? null) == $p->id)>{{ $p->name }}</option>
      @endforeach
    </select>
    @error('parent_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
  </div>

  <div class="flex items-center gap-2">
    <input type="hidden" name="is_active" value="0">
    <input type="checkbox" name="is_active" value="1"
           @checked(old('is_active', $category->is_active ?? true)) class="h-4 w-4">
    <label class="text-sm text-gray-700">Active</label>
  </div>

  <div class="md:col-span-2">
    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
    <textarea name="description" rows="3" class="input-field">{{ old('description', $category->description ?? '') }}</textarea>
    @error('description') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
  </div>
</div>

<div class="mt-6 flex items-center justify-end gap-3">
  <a href="{{ route('categories.index') }}" class="btn-secondary">Cancel</a>
  <button class="btn-primary">{{ $editing ? 'Update' : 'Create' }}</button>
</div>
    