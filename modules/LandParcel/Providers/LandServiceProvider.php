<?php

namespace LandParcel\Providers;

use Illuminate\Support\ServiceProvider;

class LandServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(base_path('modules/LandParcel/views'), 'land');
    }
}
