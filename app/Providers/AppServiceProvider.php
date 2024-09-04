<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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

        // Define gates for different roles
        Gate::define('admin', function ($user) {
            return $user->role === 'admin';
        });
    
        Gate::define('super-admin', function ($user) {
            return $user->role === 'super-admin';
        });
    
        Gate::define('guest', function ($user) {
            return $user->role === 'guest';
        });

    }
}
