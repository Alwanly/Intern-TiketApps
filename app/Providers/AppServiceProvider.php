<?php

namespace App\Providers;


use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;


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

        //Set Location
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

        //Format Currency IDr
        Blade::directive('currency', function ($expression) {
            return "<b class='nav-icon'>Rp.</b> <?php echo number_format($expression, 0, ',', '.'); ?>";
        });

        //Format Date indonesia
        Blade::directive('idDate',function ($request){
            $date = strtotime($request);
            return Carbon::parse($date)->translatedFormat('l, d M Y');
        });

        //set For Mysql
        Schema::defaultStringLength(191);

    }
}
