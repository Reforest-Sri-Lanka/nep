<?php

namespace ApprovalItem\Providers;

use Illuminate\Support\ServiceProvider;

class ApprovalItemServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(base_path('modules/General/ApprovalItem/views'), 'approvalItem');
    }
}
