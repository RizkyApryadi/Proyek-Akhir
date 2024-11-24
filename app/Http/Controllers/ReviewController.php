<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class ReviewController extends Controller
{
    /**
     * Constructor untuk menambahkan middleware.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a new review for the given film.
     */
    public function store(Request $request, Film $film)
    {
        // Validasi input
        $validated = $request->validate([
            'content' => 'required|string|max:1000', // Validasi konten review
            'rating'  => 'required|integer|between:1,5', // Validasi rating (1-5)
        ]);

        // Cek apakah film ada
        if (!$film) {
            return redirect()->route('films.index')->with('error', 'Film not found.');
        }

        // Cegah duplikasi review
        $existingReview = $film->reviews()->where('user_id', auth()->id())->first();
        if ($existingReview) {
            return redirect()->route('films.show', $film)->with('error', 'You have already reviewed this film.');
        }

        try {
            // Simpan review
            $film->reviews()->create([
                'content' => $validated['content'],
                'rating'  => $validated['rating'],
                'user_id' => auth()->id(),
            ]);

            return redirect()->route('films.show', $film)->with('success', 'Review added successfully!');
        } catch (\Exception $e) {
            return redirect()->route('films.show', $film)->with('error', 'Failed to add review. Please try again.');
        }
    }
}
