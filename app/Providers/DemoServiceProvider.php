<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Demo\Demo;

class DemoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('demo123', function () {
            return new Demo();
        });    }
}
