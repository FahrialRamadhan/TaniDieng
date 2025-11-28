<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Jika belum login → arahkan ke login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Cek role user, kalau tidak ada dalam yang diizinkan → abort 403
        if (!in_array(Auth::user()->role, $roles)) {
            abort(403, 'Anda tidak memiliki hak akses.');
        }

        return $next($request);
    }
}
