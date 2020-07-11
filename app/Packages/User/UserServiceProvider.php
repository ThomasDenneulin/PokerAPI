<?php

namespace App\Packages\Player;

use Illuminate\Support\ServiceProvider;

class PlayerServiceProvider extends ServiceProvider
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
            ->namespace('App\Packages\Player\Controllers')
            ->group(__DIR__ . '/routes.php');

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
    }
}
