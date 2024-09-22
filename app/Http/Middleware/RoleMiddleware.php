<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect('login');
        }

        // Cek apakah pengguna memiliki role yang sesuai
        if (Auth::user()->role !== $role) {
            // Tambahkan flash message untuk akses ditolak
            session()->flash('access_denied', true);

            // Kembalikan tampilan blank dengan alert (bukan melanjutkan request ke controller)
            return response()->view('access_denied');
        }

        // Jika role sesuai, lanjutkan request
        return $next($request);
    }
}
