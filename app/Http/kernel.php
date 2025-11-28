<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Global HTTP middleware stack.
     */
    protected $middleware = [
        // Middleware bawaan Laravel
        \Illuminate\Http\Middleware\TrustHosts::class,
        \Illuminate\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Http\Middleware\ValidatePostSize::class,
        \Illuminate\Foundation\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * Middleware groups untuk web & api.
     */
    protected $middlewareGroups = [

        // Middleware grup web
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,

            // Jika kamu pakai Laravel Breeze / Jetstream
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,

            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        // Middleware grup API (kalau pakai)
        'api' => [
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * Route middleware (bisa dipanggil via nama).
     */
    protected $routeMiddleware = [
        'auth'      => \App\Http\Middleware\Authenticate::class,
        'guest'     => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'verified'  => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        // Tambahkan middleware ROLE yang kita buat
        'role' => \App\Http\Middleware\RoleMiddleware::class,
    ];
}
