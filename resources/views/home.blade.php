@extends('layouts.app')

@section('content')
  <div class="container mx-auto mt-8">
    <h1 class="text-4xl font-bold mb-4">Welcome to the Notes App!</h1>
    <p class="text-lg">This is a simple CRUD application to manage your notes.</p>
    <div class="mt-8">
      <a href="{{ route('notes.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
        View Notes
      </a>
      <a href="{{ route('notes.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded ml-4">
        Create Note
      </a>
    </div>
  </div>
@endsection
