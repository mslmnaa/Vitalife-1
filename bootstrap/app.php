<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Foundation\Application;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\VoucherSessionMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        channels:__DIR__ . '/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            // ...
            \App\Http\Middleware\SetLocale::class,
            \App\Http\Middleware\VoucherSessionMiddleware::class, // Add this line
                            
            // 'admin' => AdminMiddleware::class,

        ]);
        $middleware->alias([
            'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'role' => \Illuminate\Auth\Middleware\Authenticate::class,
            'block.dokter' => \App\Http\Middleware\BlockDokter::class,



            // other middleware aliases
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

  

