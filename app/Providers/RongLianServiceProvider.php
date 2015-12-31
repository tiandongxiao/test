<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RongLianServiceProvider extends ServiceProvider
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

        $this->app->singleton('RongLian',function(){
            return new \App\SDK\RongLianAPI();
        }); 
    }
}
