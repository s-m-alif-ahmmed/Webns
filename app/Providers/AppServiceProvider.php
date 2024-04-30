<?php

namespace App\Providers;

use App\Models\OutsideUsers\OutsideUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use View;
use Session;

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
        View::composer('*', function ($view){
            $view->with('outside_users', OutsideUser::all());
        });

    }
}
