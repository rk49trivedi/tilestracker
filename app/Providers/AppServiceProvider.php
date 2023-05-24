<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

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
            if(session()->has('unlocker_user')){
                //$delPendingOrder = DB::table('orders')->where('status','pending')->where('user_id',session()->get('unlocker_user')[0])->delete();
            }
        });
        
    }
}
