<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jalankan seeder GenreSeeder
        $this->call(GenreSeeder::class);

        // Contoh membuat 10 pengguna dengan factory
        User::factory(10)->create();

        // Tambahkan pengguna khusus untuk testing
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // Pastikan menambahkan password
        ]);
    }
}
