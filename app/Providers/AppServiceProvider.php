<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use App\View\Components\SelectInput;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Daftarkan middleware admin
        Route::aliasMiddleware('admin', AdminMiddleware::class);

        // Definisikan route untuk admin dashboard
        Route::middleware(['auth', 'admin'])->group(function () {
            Route::get('/admin/dashboard', function () {
                return view('admin.dashboard');
            })->name('admin.dashboard');
        });

        Blade::component('select-input', SelectInput::class);
    }
}
