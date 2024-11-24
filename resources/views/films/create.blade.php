@extends('layouts.app')

@section('title', 'Add a New Film')

@section('content')
    <div class="container mx-auto p-6">

        <!-- Header Section -->
        <header class="text-center mb-10">
            <h1 class="text-5xl font-bold text-indigo-600 mb-2">Add a New Film</h1>
            <p class="text-lg text-gray-600">Please fill in the form below to add a new film.</p>
        </header>

        <!-- Form Section -->
        <form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8 bg-white p-6 rounded-lg shadow-lg">
            @csrf

            <!-- Input untuk Judul Film -->
            <div class="form-group">
                <label for="title" class="block text-lg font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all" value="{{ old('title') }}" required>
                @error('title')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input untuk Deskripsi Film -->
            <div class="form-group">
                <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all" rows="5" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Dropdown untuk Genre -->
            <div class="form-group">
                <label for="genre_id" class="block text-lg font-medium text-gray-700">Genre</label>
                <select name="genre_id" id="genre_id" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all" required>
                    <option value="" disabled selected>Select Genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                    @endforeach
                </select>
                @error('genre_id')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input untuk Foto Film -->
            
            <!-- Tombol Add Film yang menarik -->
            <div class="form-group text-center">
                <button type="submit" class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 bg-green-600 text-white text-lg font-medium py-3 rounded-lg text-center transition transform hover:bg-green-700 hover:scale-105">
                    Add Film
                </button>
            </div>
        </form>
    </div>
@endsection

@section('styles')
    <style>
        .container {
            max-width: 600px;
            margin-top: 30px;
        }
        @media (max-width: 640px) {
            .container {
                padding-left: 16px;
                padding-right: 16px;
            }
        }
    </style>
@endsection
