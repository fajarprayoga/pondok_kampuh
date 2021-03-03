<?php

namespace App\Providers;

use App\Models\Toko;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

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
        $toko = Toko::get()->first();
        //Membuat variabel global
        View::share('toko', $toko);

        Schema::defaultStringLength(255);
        Paginator::useBootstrap();


    }
}
