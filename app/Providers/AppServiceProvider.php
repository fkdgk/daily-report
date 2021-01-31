<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            // $event->menu->add('MAIN NAVIGATION');
            $event->menu->add([
                'text' => config('app.title_home'),
                'route' => 'home',
                'icon' => 'fa fa-fw fa-home mr-2',
            ]);

            $event->menu->add([
                'text' => config('app.title_post_index'),
                'route' => 'post.index',
                'icon' => 'fa fa-fw fa-pen mr-2',
            ]);
            
            $event->menu->add([
                'text' => config('app.title_user_index'),
                'route' => 'user.index',
                'icon' => 'fa fa-fw fa-users mr-2',
            ]);
            
        });
    }
}
