<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class OrdersServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Memuat migrasi modul Orders
        $this->loadMigrationsFrom(
            app_path('Modules/Orders/Migrations')
        );
    }
}