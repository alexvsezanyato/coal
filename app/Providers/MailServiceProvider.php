<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;

use App\Services\MailService;
use PHPMailer\PHPMailer\PHPMailer;

class MailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PHPMailer::class, function(Application $app) {
            return new PHPMailer(true);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // $this->app
    }
}
