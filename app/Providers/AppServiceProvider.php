<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// เพิ่มการใช้งาน Paginator
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
        // ตั้งค่าให้ Paginator ใช้สไตล์ของ Bootstrap 5
        Paginator::useBootstrapFive();
    }
}
