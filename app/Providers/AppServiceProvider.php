<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Toko;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
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
        $orders = Order::where('status', '!=', 'SUCCESS')->where('status', '!=', 'CANCELED')->get();
        $toko = Toko::get()->first();
        //Membuat variabel global
        View::share('toko', $toko);
        View::share('countOrder', $orders);
        Schema::defaultStringLength(255);
        Paginator::useBootstrap();


    }
}
