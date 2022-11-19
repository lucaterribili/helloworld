<?php

namespace LucaTerribili\HelloWorld;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/helloworld.php',
            'helloworld'
        );
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/helloworld.php' => config_path('helloworld.php'),
        ], 'helloworld');
        // Carichiamo le rotte se necessario
        if (config('helloworld.use_package_route')) {
            $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        }
        // Carichiamo le viste che avranno come namespace helloworld
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'helloworld');
        // Pubblichiamo le viste
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/helloworld')
        ], 'helloworld');
    }
}
