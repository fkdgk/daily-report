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

            $event->menu->add('日報');

            $event->menu->add([
                'text' => config('app.title_post_index'),
                'url' => route('post.index', Auth::id()),
                'icon' => 'fa fa-fw fa-pen mr-2',
            ]);

            $event->menu->add([
                'text' => config('app.title_post_create'),
                'url' => route('post.create'),
                'icon' => 'fa fa-fw fa-plus-square mr-2',
            ]);

            $event->menu->add('アカウント');

            $event->menu->add([
                'text' => config('app.title_user_profile'),
                'url' => route('user.show',Auth::id()),
                'icon' => 'fa fa-fw fa-user mr-2',
            ]);

            $event->menu->add([
                'text' => config('app.title_user_index'),
                'route' => 'user.index',
                'icon' => 'fa fa-fw fa-users mr-2',
            ]);

            $event->menu->add([
                'text' => config('app.title_user_create'),
                'route' => 'user.create',
                'icon' => 'fa fa-fw fa-user-plus mr-2',
            ]);

            $event->menu->add('マスタ');
            
            $event->menu->add([
                'text' => config('app.title_project_index'),
                'route' => 'project.index',
                'icon' => 'fa fa-fw fa-cog mr-2',
            ]);

            $event->menu->add([
                'text' => config('app.title_division_index'),
                'route' => 'division.index',
                'icon' => 'fa fa-fw fa-cubes mr-2',
            ]);

            $event->menu->add('Laravel Ver ' . app()->version());
            
            $event->menu->add([
                'text' => 'GitHub',
                'url' => url('https://github.com/fkdgk/daily-report'),
                'icon' => 'fab fa-github fa-fw  mr-2',
                'target'=> '_blank',
                ]);
                
                if(app()->environment('demo')){
                    
                    $event->menu->add([
                        'text' => 'ER図',
                        'url' => url('/er.svg?ver=') . config('app.asset_ver'),
                        'icon' => 'fas fa-sitemap fa-fw mr-2',
                        'target'=> '_blank',
                    ]);
            }


        });
    }
}
