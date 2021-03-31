<?php

namespace Reporting\Providers;

use Illuminate\Support\ServiceProvider;

class ReportingServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(base_path('modules/Reporting/views'), 'reporting');
    }
}