<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;


class FilmController extends Controller
{
    // Menampilkan daftar film
    public function index()
    {
        $films = Film::with('genre')->get(); // Mengambil semua film beserta genre-nya
        return view('films.index', compact('films'));
    }

    // Menampilkan halaman untuk membuat film baru
    public function create()
    {
        $genres = Genre::all(); // Mengambil semua genre untuk dropdown
        return view('films.create', compact('genres'));
    }

    // Menyimpan film yang baru dibuat
    public function store(Request $request)
    {
        // Validasi dan simpan film baru
        Film::create($request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'genre_id' => 'required|exists:genres,id', // Validasi genre harus ada di tabel genres
        ]));

        // Redirect ke halaman index setelah berhasil menyimpan
        return redirect()->route('films.index');
    }

    // Menampilkan detail film berdasarkan id
    public function show($id) {
        // Mengambil film dan review dengan eager loading
        $film = Film::with('reviews.user')->findOrFail($id);  // Mengambil film dan relasi reviews
        
        // Mengirimkan film dan reviews ke view
        return view('films.show', ['film' => $film, 'reviews' => $film->reviews]);
    }
    
    // Menampilkan halaman edit untuk film yang sudah ada
    public function edit($id)
    {
        $film = Film::findOrFail($id); // Mencari film berdasarkan id
        $genres = Genre::all(); // Mengambil semua genre untuk dropdown
        return view('films.edit', compact('film', 'genres'));
    }

    // Memperbarui film yang sudah ada
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'genre_id' => 'required|exists:genres,id', // Validasi genre
        ]);

        // Mencari film berdasarkan id dan memperbarui data
        $film = Film::findOrFail($id);
        $film->update($validated);

        // Redirect ke halaman index setelah berhasil memperbarui
        return redirect()->route('films.index');
    }

    // Menghapus film berdasarkan id
    public function destroy($id)
    {
        $film = Film::findOrFail($id); // Mencari film berdasarkan id
        $film->delete(); // Menghapus film

        return redirect()->route('films.index'); // Redirect kembali ke halaman index
    }
}
