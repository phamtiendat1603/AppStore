<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ImageService;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\ImageService',function($app){
            return new ImageService();
        });
    }
}
