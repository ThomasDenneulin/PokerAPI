<?php

namespace App\Packages\Action;

use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
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
            ->namespace('App\Packages\Action\Controllers')
            ->group(__DIR__ . '/routes.php');

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
    }
}
