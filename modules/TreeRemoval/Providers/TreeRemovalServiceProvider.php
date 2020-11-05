<?php

namespace TreeRemoval\Providers;

use Illuminate\Support\ServiceProvider;

class TreeRemovalServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(base_path('modules/TreeRemoval/views'), 'treeRemoval');
    }
}
