<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
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
            // https://github.com/jeroennoten/Laravel-AdminLTE/wiki/8.-Menu-Configuration
            $event->menu->add([
                'text' => config('app.title_home'),
                'url' => route('home'),
                'icon' => 'fa fa-fw fa-home mr-2',
            ]);

            $event->menu->add([
                'text' => config('app.title_post_index'),
                'url' => route('post.user', Auth::id()),
                'icon' => 'fa fa-fw fa-pen mr-2',
            ]);

            $event->menu->add([
                'text' => config('app.title_project_index'),
                'route' => 'project.index',
                'icon' => 'fa fa-fw fa-cog mr-2',
            ]);
            
            $event->menu->add([
                'text' => config('app.title_user_index'),
                'route' => 'user.index',
                'icon' => 'fa fa-fw fa-users mr-2',
            ]);

            $event->menu->add([
                'text' => config('app.title_division_index'),
                'route' => 'division.index',
                'icon' => 'fa fa-fw fa-cubes mr-2',
            ]);
            
        });
    }
}
