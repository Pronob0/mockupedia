<?php

namespace App\Providers;

use App\Models\AboutInfo;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
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


            view()->composer('*',function($view) {
                $gs=GeneralSetting::first();
                $about=AboutInfo::first();
                $view->with('gs', $gs);
                $view->with('about', $about);
            });
 
    }
}
