<?php

namespace Modules\Auth\Providers;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Memuat migrasi modul
        $this->loadMigrationsFrom(__DIR__ . '/../Migrations');

        // Memuat route modul
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }
}