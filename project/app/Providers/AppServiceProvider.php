<?php

namespace App\Providers;

use App\Models\AboutInfo;
use App\Models\GeneralSetting;
use App\Models\Page;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
        view()->composer('*',function($view) {
            $gs=GeneralSetting::first();
            $user = auth()->user();
            $pages= Page::get();

            $view->with('gs', $gs);
            $view->with('pages', $pages);

            if ($user) {
                $view->with('user', $user);
            }
           
        });
      

        // if (!file_exists('project/storage/installed') && !request()->is('install') && !request()->is('install/*')) {
        //     header("Location: install/");
        //     exit;
        // }

        
    }
}
