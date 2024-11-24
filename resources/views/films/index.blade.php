@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Films</h1>
    
    <!-- Button Group: Add Film -->
    <div class="mb-6 flex items-center space-x-4">
        <a href="{{ route('films.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400">
            Add Film
        </a>
    </div>
    
    <!-- Film List Table -->
    <div class="overflow-x-auto shadow-md rounded-lg border border-gray-200">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Title</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Genre</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($films as $film)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-800">
                            <a href="{{ route('films.show', $film->id) }}" class="font-medium text-blue-500 hover:text-blue-700">
                                {{ $film->title }}
                            </a>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $film->genre->name }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            <div class="flex gap-4">
                                <!-- View Button -->
                                <a href="{{ route('films.show', $film->id) }}" class="text-blue-500 hover:text-blue-700">
                                    View
                                </a>

                                <!-- Edit Button -->
                                <a href="{{ route('films.edit', $film->id) }}" class="text-yellow-500 hover:text-yellow-700">
                                    Edit
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('films.destroy', $film->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this film?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    /* Menambahkan jarak antar tombol aksi */
    .flex {
        display: flex;
        justify-content: start;
        gap: 20px; /* Menambah jarak antar tombol */
    }

    .flex a, .flex button {
        text-decoration: none;
        padding: 8px 12px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .flex a:hover, .flex button:hover {
        opacity: 0.8;
    }
</style>
@endsection
