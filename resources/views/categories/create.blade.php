@extends('layouts.dashboard')

@section('title','New Category')
@section('page-title','New Category')

@section('content')
  <div class="card">
    <form method="POST" action="{{ route('categories.store') }}" class="space-y-4">
      @csrf
      @include('categories._form', ['parents' => $parents])
    </form>
  </div>
@endsection
