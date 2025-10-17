<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Set the default pagination view to Bootstrap 4 style
        Paginator::useBootstrap();

        foreach(Config('permessions') as $key => $value) {
            Gate::define($key , function ($auth) use ($key){
                return  $auth->hasPermission($key);
            });
        }
    }
}
