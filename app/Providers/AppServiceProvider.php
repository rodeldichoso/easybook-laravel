<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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

        Blade::directive('roles', function ($roles) {
            return "<?php if(auth()->check() && in_array(auth()->user()->role, {$roles})): ?>";
        });

        Blade::directive('endroles', function () {
            return "<?php endif; ?>";
        });
    }
}
