<?php

namespace App\Packages\Round;

use Illuminate\Support\ServiceProvider;

class RoundServiceProvider extends ServiceProvider
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
            ->namespace('App\Packages\Round\Controllers')
            ->group(__DIR__ . '/routes.php');

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
    }
}
