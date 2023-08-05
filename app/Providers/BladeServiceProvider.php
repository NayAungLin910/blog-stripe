<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Register blade syntaxes to check if the user is subscribed or not
        
        Blade::if('subscribed', function ($user) {
            return $user->subscribed('monthly') || $user->subscribed('yearly');
        });

        Blade::if('notsubscribed', function ($user) {
            return !($user->subscribed('monthly') || $user->subscribed('yearly'));
        });

        Blade::if('subscribedToProduct', function ($user, $id, $name) {
            return $user->subscribedToProduct($id, $name);
        });

        Blade::if('onGracePeriod', function ($plan) {
            return Auth::user()->subscription($plan)->onGracePeriod();
        });

        Blade::if('admin', function () {
            $user = auth()->user();
            
            return ($user->isAdmin() || $user->isSuperAdmin() || $user->isWriter());
        });

        Blade::if('writer', function () {
            return auth()->user()->isWriter();
        });
    }
}
