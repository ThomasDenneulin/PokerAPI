<?php

namespace App\Packages\User;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
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
        Route::middleware([
            'api',
            'auth:jwt',
        ])
            ->prefix('api')
            ->namespace('App\Packages\User\Controllers')
            ->group(__DIR__ . '/routes.php');

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
    }
}
