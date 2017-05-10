<?php

namespace AlMohaseb\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // fix migration error
        // SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes  
        Schema::defaultStringLength(191); 
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
            $this->app->alias('Debugbar', \Barryvdh\Debugbar\Facade::class);
            
            $this->app->register(\PrettyRoutes\ServiceProvider::class);
        }
    }
}
