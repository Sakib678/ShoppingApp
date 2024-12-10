<?php

namespace App\Providers;

use App\Models\User;
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
        Gate::define('edit-product', function (User $user) {
            return ($user->is_admin==1); 
        });

        Gate::define('create-product', function (User $user) {
            return ($user->is_admin==1); 
        });
    
        Gate::define('delete-product', function (User $user) {
            return ($user->is_admin==1); 
        });
        // If using Che then uncomment to force https
       // otherwise files like css on server will not load
          \URL::forceScheme('https');
    
}
}