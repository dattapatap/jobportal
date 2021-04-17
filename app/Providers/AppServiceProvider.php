<?php

namespace App\Providers;

use App\Models\Industries;
use App\Models\Notification;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
    }

    public function boot()
    {
        Paginator::useBootstrap();
        view()->composer('*', function ($view)
        {
            if(isset(Auth::user()->id)){
                $user =  Auth::user()->id;

                $notifications = DatabaseNotification::where('notifiable_id', $user)->orderBy('created_at',"DESC")->get();

                $unreadNotf = DatabaseNotification::where('notifiable_id',  $user )
                                            ->where('read_at',null)->orderBy('created_at',"DESC")->get();
                $unreadNotf = count($unreadNotf);
                view()->share('notifications', $notifications);
                view()->share('unreadNotf', $unreadNotf);
            }

            $jobsCateg = Industries::where('deleted_at', null)->inRandomOrder()->orderBy('name', 'ASC')->limit(6)->get();
            $jobs = Industries::where('deleted_at', null)->inRandomOrder()->orderBy('name', 'ASC')->limit(30)->get();
            view()->share('categ', $jobsCateg );
            view()->share('reletedcategory', $jobs );

        });
    }
}
