<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ExtendableServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->when('App\Http\UsersController')
                ->needs('App\Interfaces\GlobalInterface')
                ->give('App\Repositories\UsersRepository');

        $this->app->when('App\Http\DetilJadwalController')
                ->needs('App\Interfaces\GlobalInterface')
                ->give('App\Repositories\DetilRepository');

        $this->app->when('App\Http\MataKuliahController')
                ->needs('App\Interfaces\GlobalInterface')
                ->give('App\Repositories\MataKuliahRepository');

        $this->app->when('App\Http\RekapKehadiranController')
                ->needs('App\Interfaces\GlobalInterface')
                ->give('App\Repositories\RekapKehadiranRepository');
    }
}
