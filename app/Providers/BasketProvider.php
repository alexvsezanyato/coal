<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\BasketService;
use Illuminate\Foundation\Application;

class BasketProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(BasketService::class, fn() => new BasketService);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
