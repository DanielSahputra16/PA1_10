<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->is_admin) { // Asumsikan ada kolom 'is_admin' di tabel user
            return $next($request);
        }

        // Jika bukan admin, redirect atau tampilkan error
        abort(403, 'Unauthorized.'); // Atau redirect ke halaman lain
    }
}
