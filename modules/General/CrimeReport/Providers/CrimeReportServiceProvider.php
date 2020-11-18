<?php

namespace CrimeReport\Providers;

use Illuminate\Support\ServiceProvider;

class CrimeReportServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(base_path('modules/General/CrimeReport/views'), 'crimeReport');
    }
}
