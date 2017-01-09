<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
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
        foreach (glob(app_path().'/Helpers/*.php') as $filename){
            require_once($filename);
        }
        $this->app->singleton('filter', function()
        {
            return new \App\Helpers\FilterHelper();
        });
        $this->app->bind('catalogMenuConstructor', function()
        {
            return new \App\Helpers\CatalogMenuConstructor();
        });
        $this->app->singleton('img', function()
        {
            return new \App\Helpers\ImgHelper();
        });
        $this->app->singleton('breadcrumbs', function()
        {
            return new \App\Helpers\BreadcrumbsHelper();
        });
        $this->app->singleton('xml', function()
        {
            return new \App\Helpers\XmlHelper();
        });
        $this->app->singleton('formatData', function()
        {
            return new \App\Helpers\FormatDataHelper();
        });
    }
}
