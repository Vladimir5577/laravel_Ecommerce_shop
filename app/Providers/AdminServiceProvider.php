<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Facades\Admin;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('admin', function () {
            return new Admin;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
