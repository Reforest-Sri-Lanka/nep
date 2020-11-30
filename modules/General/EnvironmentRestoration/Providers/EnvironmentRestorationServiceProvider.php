<?php

namespace EnvironmentRestoration\Providers;

use Illuminate\Support\ServiceProvider;

class EnvironmentRestorationServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(base_path('modules/General/EnvironmentRestoration/views'), 'environmentRestoration');
    }
}
