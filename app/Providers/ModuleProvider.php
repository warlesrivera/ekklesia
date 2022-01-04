<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $modulos = [
            'Blog',
            'LandingPage',
            'Team'
        ];

        foreach ($modulos as $module) {
            $this->app->bind("App\Modulos\\{$module}\Interfaces\\{$module}Interface", "App\Modulos\\{$module}\Decoradores\\{$module}Decorator");
        }

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
