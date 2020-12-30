<?php

namespace Admin\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Blade;
use Admin\View\Components\Back;


class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {

        Blade::component('test', Test::class);
        Blade::component('back', Back::class);
        $this->routes(function () {
            /*    Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php')); */

                //Where the route is admin or user redirect to the admin.php route file
            Route::middleware('web')
                ->prefix('admin')
                ->group(base_path('modules/Admin/routes/admin.php'));

            Route::middleware('web')
                ->prefix('user')
                ->group(base_path('modules/Admin/routes/admin.php'));

        });
    }
}
