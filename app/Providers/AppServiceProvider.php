<?php

namespace App\Providers;

use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\ReplaceShortCodes;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::aliasMiddleware('role', RoleMiddleware::class);
        app('router')->pushMiddlewareToGroup('web', ReplaceShortCodes::class);
        app('router')->pushMiddlewareToGroup('web', SetLocale::class);
    }
}
