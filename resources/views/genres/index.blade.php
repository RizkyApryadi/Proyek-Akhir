<!-- resources/views/genres/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Genres List</h1>

    <!-- Daftar Genre -->
    <ul>
        @foreach ($genres as $genre)
            <li>{{ $genre->name }} 
                <a href="{{ route('genres.edit', $genre->id) }}">Edit</a> | 
                <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('genres.create') }}">Add New Genre</a>
@endsection
