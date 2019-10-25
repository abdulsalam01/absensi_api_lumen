<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Messages;

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
        $message = new Messages();
        // share to all view
        view()->share('message', $message);
    }
}
