<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;

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

        // Gate::define('admin', function (User $user) {
        //     return $user->is_admin;
        // });

        // if (env('APP_ENV') !== 'local') {
        //     URL::forceScheme('https');
        // }

        // Define gates for different roles
        Gate::define('admin', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('super-admin', function ($user) {
            return $user->role === 'super-admin';
        });

        Gate::define('finance', function ($user) {
            return $user->role === 'finance';
        });
        Gate::define('guest', function ($user) {
            return $user->role === 'guest';
        });

    }
}
