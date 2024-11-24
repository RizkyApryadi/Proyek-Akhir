<?php

// database/seeders/GenreSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan beberapa data genre
        Genre::create(['name' => 'Action']);
        Genre::create(['name' => 'Comedy']);
        Genre::create(['name' => 'Drama']);
        Genre::create(['name' => 'Horror']);
        Genre::create(['name' => 'Romance']);
    }
}
