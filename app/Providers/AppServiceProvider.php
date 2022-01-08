<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale('pt_BR');

        $this->loadViewsFrom(
            base_path('resources/core/views'),
            'core'
        );

        $this->loadViewsFrom(
            base_path('resources/admin/views'),
            'admin'
        );
    }
}
