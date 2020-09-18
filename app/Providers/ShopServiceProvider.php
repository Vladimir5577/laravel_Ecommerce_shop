<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Facades\Shop;

class ShopServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('shop', function () {
            return new Shop;
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
