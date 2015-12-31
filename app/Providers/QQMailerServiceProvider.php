<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class QQMailerServiceProvider extends ServiceProvider
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
        $this->app->singleton('QQMailer',function(){
            return new \App\SDK\QQMailer();
        });
    }
}
