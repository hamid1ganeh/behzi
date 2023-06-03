<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use MadWeb\Robots\RobotsFacade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
            'user-panel.master',
            'user-panel.index'
        ], function($view)
        {
            $user = User::find(Auth::id());
            $pages = $user->pages()->get();
            $view->with('pages', $pages);
        });

        RobotsFacade::setShouldIndexCallback(function(){
            return app()->environment('production');
        });
    }
}
