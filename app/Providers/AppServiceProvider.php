<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
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


public function boot()
{
    // إجبار المتصفح على تحميل ملفات الـ CSS والصور بشكل آمن أونلاين
    if (app()->environment('production') || env('APP_ENV') === 'production') {
        URL::forceScheme('https');
    }
}
}
