<?php

namespace App\Providers;

use App\Model\Setting;
use Illuminate\Support\Facades\View;
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
        $whatsapp = Setting::where('key', 'whatsapp')->value('value');
        $email = Setting::where('key', 'email')->value('value');

        View::share('whatsapp', $whatsapp);
        View::share('email', $email);
    }
}
