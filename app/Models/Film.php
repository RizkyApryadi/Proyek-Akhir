<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'genre_id', 'photo']; // Menambahkan 'photo'

    /**
     * Define a relationship to the Genre model.
     */
    public function genre()
    {
        return $this->belongsTo(Genre::class); // Relasi ke Genre
    }

    /**
     * Define a relationship to the Review model.
     */
public function reviews() {
    return $this->hasMany(Review::class, 'film_id');
}



    /**
     * Calculate average rating for the film.
     */
    public function averageRating()
    {
        return $this->reviews()->avg('rating'); // Hitung rata-rata rating
    }
}
