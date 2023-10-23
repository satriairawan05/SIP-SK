<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // return $request->expectsJson() ? null : route('login');

        $redirectTo = null;

        if ($request->expectsJson()) {
            // Jika permintaan adalah JSON, tidak ada redirect yang diperlukan
            return $redirectTo;
        }

        // Memeriksa apakah pengguna mengakses halaman login mahasiswa
        if ($request->is('login')) {
            $redirectTo = route('mahasiswa.login');
        }

        // Memeriksa apakah pengguna mengakses halaman login admin
        if ($request->is('admin')) {
            $redirectTo = route('user.login');
        }

        return $redirectTo;
    }
}
