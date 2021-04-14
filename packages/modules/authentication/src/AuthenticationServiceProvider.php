<?php

namespace Modules\Authentication;

use Illuminate\Support\ServiceProvider;
use Request;
use Artisan;

class AuthenticationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    protected function registerSeedsFrom()
    {
        foreach (glob(__DIR__."/seeds/*.php") as $filename)
        {
            include $filename;
            $classes = get_declared_classes();
            $class = end($classes);
       

            $command = Request::server('argv', null);
            if (is_array($command)) {
                $command = implode(' ', $command);
                if ($command == "artisan db:seed") {
                    Artisan::call('db:seed', ['--class' => $class]);
                }
            }

        }
    }
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
        $this->loadMigrationsFrom(__DIR__.'./migrations/');
        $this->registerSeedsFrom();
        // $this->loadViewsFrom(__DIR__.'./views/login.blade.php');
      
       
    }
}
