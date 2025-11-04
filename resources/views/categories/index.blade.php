@extends('layouts.dashboard')

@section('title', 'Categories') {{-- ini buat <title> --}}
@section('page-title', 'Categories')
@section('page-description', 'Manage post categories, search & filter, and pagination.')

@section('content')
  <div class="card">
    <form method="GET" class="grid md:grid-cols-4 gap-3 mb-4">
      <input name="search" value="{{ $filters['search'] }}" placeholder="Search name/slug..." class="input-field md:col-span-2" />
      <select name="status" class="input-field">
        <option value="">All status</option>
        <option value="active"   @selected($filters['status']=='active')>Active</option>
        <option value="inactive" @selected($filters['status']=='inactive')>Inactive</option>
      </select>
      <button class="btn-secondary">Apply</button>
    </form>

    <div class="overflow-x-auto">
      <table class="min-w-full text-sm">
        <thead class="text-left text-gray-600">
          <tr>
            <th class="py-2">Name</th>
            <th class="py-2">Slug</th>
            <th class="py-2">Posts</th>
            <th class="py-2">Status</th>
            <th class="py-2 text-right">
              <a href="{{ route('categories.create') }}" class="btn-primary">New Category</a>
            </th>
          </tr>
        </thead>
        <tbody class="divide-y">
          @forelse ($categories as $c)
            <tr>
              <td class="py-2 font-medium">{{ $c->name }}</td>
              <td class="py-2 text-gray-500">{{ $c->slug }}</td>
              <td class="py-2">{{ $c->posts_count }}</td>
              <td class="py-2">
                @if($c->is_active)
                  <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">Active</span>
                @else
                  <span class="px-2 py-1 text-xs rounded bg-gray-100 text-gray-600">Inactive</span>
                @endif
              </td>
              <td class="py-2 text-right">
                <a href="{{ route('categories.edit', $c) }}" class="text-primary-600 hover:underline mr-3">Edit</a>
                <form action="{{ route('categories.destroy', $c) }}" method="POST" class="inline" onsubmit="return confirm('Delete this category?');">
                  @csrf @method('DELETE')
                  <button class="text-red-600 hover:underline">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="5" class="py-6 text-center text-gray-500">No categories found.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-4">
      {{ $categories->links() }}
    </div>
  </div>
@endsection