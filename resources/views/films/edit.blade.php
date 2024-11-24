<!-- resources/views/films/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-3xl font-bold text-indigo-600 mb-4">Edit Film</h2>

    <form action="{{ route('films.update', $film->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-lg font-medium text-gray-700">Film Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $film->title) }}" class="w-full p-3 border border-gray-300 rounded-lg" required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" rows="5" class="w-full p-3 border border-gray-300 rounded-lg" required>{{ old('description', $film->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="genre_id" class="block text-lg font-medium text-gray-700">Genre</label>
            <select id="genre_id" name="genre_id" class="w-full p-3 border border-gray-300 rounded-lg" required>
                <option value="">Select Genre</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $film->genre_id == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
            @error('genre_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition">Update Film</button>
        </div>
    </form>

    <div class="mt-6">
        <a href="{{ route('films.index') }}" class="text-blue-600 hover:underline">Back to Film List</a>
    </div>
</div>
@endsection
