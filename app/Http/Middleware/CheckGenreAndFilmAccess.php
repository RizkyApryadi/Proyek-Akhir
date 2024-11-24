<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckGenreAndFilmAccess
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect('login'); // Mengarahkan ke login jika belum login
        }

        // Cek apakah rute yang diminta bukan show dan index
        if (in_array($request->route()->getName(), ['genre.create', 'film.create', 'genre.edit', 'film.edit'])) {
            if (!Auth::user()->hasRole('admin')) { // Hanya admin yang boleh mengakses create dan edit
                return redirect('home'); // Jika bukan admin, redirect ke halaman home
            }
        }

        return $next($request);
    }
}
