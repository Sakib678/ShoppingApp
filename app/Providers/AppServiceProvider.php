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
        
        Gate::define('can-edit-product', function (User $user) {
            return ($user->is_admin == 1); //expression equates to true/false
        
        });
        // If using Che then uncomment to force https
       // otherwise files like css on server will not load
       
          \URL::forceScheme('https');
    
}
}