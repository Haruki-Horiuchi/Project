<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; //7-02追記

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
        //7-02--------------
        Paginator::useBootstrap();
       //Paginator::useBootstrapFive();    公式ドキュメント
       //または Paginator::useBootstrapFour();    公式ドキュメント
       //------------------
    }
}
