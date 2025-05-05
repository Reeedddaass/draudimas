<?php

namespace App\Providers;

use App\Models\Owners;
use App\Models\Car;

use App\Policies\OwnerPolicy;
use App\Policies\CarPolicy;

use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\ReplaceShortCodes;
use App\Http\Middleware\SetLocale;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
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

        Gate::policy(Owners::class, OwnerPolicy::class);
        Gate::policy(Car::class, CarPolicy::class);
    }
}
