<?php

namespace App\Providers;

use App\Models\Article;
use Illuminate\Support\ServiceProvider;

class ViewComposer extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNavigation();
        $this->composeAdminInfo();
        $this->composeLng();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function composeLng()
    {
        view()->composer('lng._panel','App\Http\Composers\LngComposer@lngCompose' );
    }

    private function composeNavigation()
    {
        view()->composer('partials._nav', 'App\Http\Composers\NavComposer@compose');

    }

    private  function composeAdminInfo()
    {
        view()->composer('admin._drop_nav', 'App\Http\Composers\NavComposer@adminCompose');
    }
}
