<?php

namespace Modules\Authentication;

use Illuminate\Support\ServiceProvider;

class AuthenticationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        //  $this->app->make('modules\authentication\AdminAuthController');

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'./views','auth');
        $this->loadRoutesFrom(__DIR__.'./routes/auth.php');
        // $this->loadMigrationsFrom(__DIR__.'./migrations/');
        // $this->loadViewsFrom(__DIR__.'./views/login.blade.php');
      
       
    }
}
