<?php

namespace App\Providers;

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
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Imageable', 'App\Repositories\ImageRepositories');
        $this->app->when('App\Http\Controllers\SliderController')
            ->needs('App\Repositories\Imageable')
            ->give('App\Repositories\ImageSliders');
    }
}
