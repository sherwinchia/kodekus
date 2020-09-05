<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    protected $admin_namespace = 'App\Http\Controllers\Admin';
    protected $browser_namespace = 'App\Http\Controllers\Browser';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        // $this->mapApiRoutes();
        // $this->mapWebRoutes();
        $this->mapAdminRoutes();
        $this->mapBrowserRoutes();
        
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
  
    protected function mapAdminRoutes(){
      //admin middleware ['auth', 'isAdmin']

      // web routes accessed by using the browser directly
      Route::middleware('web')
        ->prefix('admin')
        ->name('admin.')
        ->namespace($this->admin_namespace)
        ->group(base_path('routes/admin/web.php'));
  
      // api routes accessed by using axios from same application
      Route::middleware('web')
        ->prefix('admin/api')
        ->name('admin.api.')
        ->namespace($this->admin_namespace)
        ->group(base_path('routes/admin/api.php'));
    }

    protected function mapBrowserRoutes(){
      Route::middleware('web')
        ->name('browser.')
        ->namespace($this->browser_namespace)
        ->group(base_path('routes/browser/web.php'));
        
        // Route::prefix("api")
        // ->name('browser.api.')
        // ->middleware('web')
        // ->namespace($this->api_namespace)
        // ->group(base_path('routes/browser/api.php'));
    }


}
