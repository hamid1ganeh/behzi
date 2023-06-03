<?php

namespace App\Providers;

use App\Enums\PageConnectionType;
use App\Models\Admin;
use App\Models\City;
use App\Models\Page;
use App\Models\PageConnection;
use App\Models\PageGallery;
use App\Models\PageGalleryImage;
use App\Models\Province;
use App\Models\User;
use App\Models\WorkCategory;
use App\Models\WorkItem;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
        Route::bind('page', function($value){
            switch (Request::segment(1))
            {
                case 'admin':
                    return Page::withTrashed()->where('id', $value)->firstOrFail();
                    break;
                case 'user':
                    return Page::withTrashed()->where('id', $value)->firstOrFail();
                    break;
                default :
                    return Page::withTrashed()->where('slug', $value)->firstOrFail();
            }

        });

        Route::bind('pageGallery', function($value){
            switch (Request::segment(1))
            {
                case 'admin':
                    return PageGallery::withTrashed()->where('id', $value)->firstOrFail();
                    break;
                case 'user':
                    return PageGallery::withTrashed()->where('id', $value)->firstOrFail();
                    break;
                default :
                    return PageGallery::withTrashed()->where('slug', $value)->firstOrFail();
            }
        });

        Route::bind('pageGalleryImage', function($value){
            return PageGalleryImage::withTrashed()->where('id', $value)->firstOrFail();
        });


        Route::bind('user', function($value){
            return User::withTrashed()->where('id', $value)->firstOrFail();
        });

        Route::bind('admin', function($value){
            return Admin::withTrashed()->where('id', $value)->firstOrFail();
        });

        Route::bind('page_connection', function($value){
            return PageConnection::withTrashed()->where('id', $value)->firstOrFail();
        });

    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/front.php'));

        Route::middleware('web')
            ->namespace($this->namespace."\\Web\\AdminPanel")
            ->prefix('/admin/panel')
            ->name('adminPanel.')
            ->group(base_path('routes/admin-panel.php'));

        Route::middleware('web')
            ->namespace($this->namespace."\\Web\\UserPanel")
            ->prefix('/user/panel')
            ->name('userPanel.')
            ->group(base_path('routes/user-panel.php'));

        Route::middleware('web')
            ->namespace($this->namespace."\\Web\\Front")
            ->prefix('/')
            ->name('front.')
            ->group(base_path('routes/front.php'));

    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
