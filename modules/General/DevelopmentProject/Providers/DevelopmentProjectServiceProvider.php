<?php

namespace DevelopmentProject\Providers;

use Illuminate\Support\ServiceProvider;

class DevelopmentProjectServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(base_path('modules/General/DevelopmentProject/views'), 'developmentProject');
    }
}
