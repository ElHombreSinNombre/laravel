<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;
use Illuminate\Support\Facades\View;

//Facades
use Auth;

class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
        view()->share('user', Auth::user());
        View::composer('*', 'App\Http\ViewComposers\PermisosComposer');
    }

    public function register()
    {
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
    }

}
