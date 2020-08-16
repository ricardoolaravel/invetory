<?php

namespace App\Providers;

use App\Models\Sector;
use App\Observers\SectorObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Sector::observe(SectorObserver::class);
        Schema::defaultStringLength(191);
        
    }
}
