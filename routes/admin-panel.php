<?php

Route::get('/login', 'AuthController@loginPage')->name('loginPage');

Route::post('/login', 'AuthController@login')->name('login');

Route::group(['middleware' => ['isAdmin']], function () {

    Route::get('/', 'IndexController@dashboard')->name('dashboard');
    // Todo: This is a test route, Delete it after use
    Route::view('reviews/rate-group/index','admin-panel/reviews/rate-group/index');
    Route::view('reviews/index','admin-panel/reviews/index');
    Route::view('reviews/show','admin-panel/reviews/show');
    Route::prefix('pages')->name('pages')->group(function () {
        // Todo: This is a test route, Delete it after use
        Route::get('{id}/domain','DomainController@edit')->name('.domain.edit');
        Route::patch('{id}/domain','DomainController@update')->name('.domain.update');
        //
        Route::get('/', 'PageController@index')
            ->name('.index')
            ->middleware(['auth:admin', 'permission:page.index']);

        Route::post('{page}/recycle', 'PageController@recycle')
            ->name('.recycle')
            ->middleware(['auth:admin', 'permission:page.recycle']);

        Route::delete('/{page}', 'PageController@destroy')
            ->name('.delete')
            ->middleware(['auth:admin', 'permission:page.destroy']);

        Route::get('/create', 'PageController@create')
            ->name('.create')
            ->middleware(['auth:admin', 'permission:page.create']);

        Route::post('/', 'PageController@store')
            ->name('.store')
            ->middleware(['auth:admin', 'permission:page.store']);

        Route::get('/{page}/edit', 'PageController@edit')
            ->name('.edit')
            ->middleware(['auth:admin', 'permission:page.edit']);

        Route::patch('/{page}', 'PageController@update')
            ->name('.update')
            ->middleware(['auth:admin', 'permission:page.update']);

    });

    Route::prefix('galleries')->name('galleries')->group(function () {

        Route::get('/', 'PageGalleryController@index')
            ->name('.index')
            ->middleware(['auth:admin', 'permission:gallery.index']);

        Route::delete('/{pageGallery}', 'PageGalleryController@destroy')
            ->name('.destroy')
            ->middleware(['auth:admin', 'permission:gallery.destroy']);

        Route::post('{pageGallery}/recycle', 'PageGalleryController@recycle')
            ->name('.recycle')
            ->middleware(['auth:admin', 'permission:gallery.recycle']);

        Route::patch('/{pageGallery}', 'PageGalleryController@update')
            ->name('.update')
            ->middleware(['auth:admin', 'permission:gallery.update']);

    });

    Route::prefix('gallery_images')->name('gallery_images')->group(function () {

        Route::get('/', 'PageGalleryImageController@index')
            ->name('.index')
            ->middleware(['auth:admin', 'permission:gallery_image.index']);

        Route::delete('/{pageGalleryImage}', 'PageGalleryImageController@destroy')
            ->name('.destroy')
            ->middleware(['auth:admin', 'permission:gallery_image.destroy']);

        Route::post('{pageGalleryImage}/recycle', 'PageGalleryImageController@recycle')
            ->name('.recycle')
            ->middleware(['auth:admin', 'permission:gallery_image.recycle']);

        Route::patch('/{pageGalleryImage}', 'PageGalleryImageController@update')
            ->name('.update')
            ->middleware(['auth:admin', 'permission:gallery_image.update']);

    });

    Route::prefix('work_categories')->name('work_categories')->group(function () {

        Route::get('/', 'WorkCategoryController@index')
            ->name('.index')
            ->middleware(['auth:admin', 'permission:work_category.index']);

        Route::get('/create', 'WorkCategoryController@create')
            ->name('.create')
            ->middleware(['auth:admin', 'permission:work_category.create']);

        Route::post('/', 'WorkCategoryController@store')
            ->name('.store')
            ->middleware(['auth:admin', 'permission:work_category.store']);

        Route::get('/{workCategory}/edit', 'WorkCategoryController@edit')
            ->name('.edit')
            ->middleware(['auth:admin', 'permission:work_category.edit']);

        Route::patch('/{workCategory}', 'WorkCategoryController@update')
            ->name('.update')
            ->middleware(['auth:admin', 'permission:work_category.update']);

        Route::delete('/{workCategory}', 'WorkCategoryController@destroy')
            ->name('.destroy')
            ->middleware(['auth:admin', 'permission:work_category.destroy']);

        Route::post('/{workCategory}/recycle', 'WorkCategoryController@recycle')
            ->name('.recycle')
            ->middleware(['auth:admin', 'permission:work_category.recycle']);

        Route::post('{workCategory}/work_items', 'WorkItemController@store')
            ->name('.work_items.store');

    });


    Route::prefix('users')->name('users')->group(function () {

        Route::get('/', 'UserController@index')
            ->name('.index')
            ->middleware(['auth:admin', 'permission:user.index']);

        Route::get('/create', 'UserController@create')
            ->name('.create')
            ->middleware(['auth:admin', 'permission:user.create']);

        Route::post('/', 'UserController@store')
            ->name('.store')
            ->middleware(['auth:admin', 'permission:user.store']);

        Route::get('/{user}/edit', 'UserController@edit')
            ->name('.edit')
            ->middleware(['auth:admin', 'permission:user.edit']);

        Route::patch('/{user}', 'UserController@update')
            ->name('.update')
            ->middleware(['auth:admin', 'permission:user.update']);

        Route::delete('/{user}', 'UserController@destroy')
            ->name('.destroy')
            ->middleware(['auth:admin', 'permission:user.destroy']);

        Route::post('/{user}/recycle', 'UserController@recycle')
            ->name('.recycle')
            ->middleware(['auth:admin', 'permission:user.recycle']);


    });

    Route::prefix('admins')->name('admins')->group(function () {

        Route::get('/', 'AdminController@index')
            ->name('.index')
            ->middleware(['auth:admin', 'permission:admin.index']);

        Route::get('/create', 'AdminController@create')
            ->name('.create')
            ->middleware(['auth:admin', 'permission:admin.create']);

        Route::post('/', 'AdminController@store')
            ->name('.store')
            ->middleware(['auth:admin', 'permission:admin.store']);

        Route::get('/{admin}/edit', 'AdminController@edit')
            ->name('.edit')
            ->middleware(['auth:admin', 'permission:admin.edit']);

        Route::patch('/{admin}', 'AdminController@update')
            ->name('.update')
            ->middleware(['auth:admin', 'permission:admin.update']);

        Route::delete('/{admin}', 'AdminController@destroy')
            ->name('.destroy')
            ->middleware(['auth:admin', 'permission:admin.destroy']);

        Route::post('/{admin}/recycle', 'AdminController@recycle')
            ->name('.recycle')
            ->middleware(['auth:admin', 'permission:admin.recycle']);

    });

    Route::prefix('roles')->name('roles')->group(function () {
        Route::get('/', 'RoleController@index')
            ->name('.index')
            ->middleware(['auth:admin', 'permission:role.index']);

        Route::get('/create', 'RoleController@create')
            ->name('.create')
            ->middleware(['auth:admin', 'permission:role.create']);

        Route::post('/', 'RoleController@store')
            ->name('.store')
            ->middleware(['auth:admin', 'permission:role.store']);

        Route::get('/{role}/edit', 'RoleController@edit')
            ->name('.edit')
            ->middleware(['auth:admin', 'permission:role.edit']);

        Route::patch('/{role}', 'RoleController@update')
            ->name('.update')
            ->middleware(['auth:admin', 'permission:role.update']);

    });

    Route::prefix('work_items')->name('work_items')->group(function () {

        Route::patch('/{workItem}', 'WorkItemController@update')
            ->name('.update')
            ->middleware(['auth:admin', 'permission:work_item.update']);

        Route::post('/{workItem}/exchange_work_category', 'WorkItemController@exchangeWorkCategory')
            ->name('.exchange_work_category')
            ->middleware(['auth:admin', 'permission:work_item.exchange_work_category']);

    });

    Route::prefix('provinces')->name('provinces')->group(function () {

        Route::get('/', 'ProvinceController@index')
            ->name('.index')
            ->middleware(['auth:admin', 'permission:province.index']);

        Route::get('/create', 'ProvinceController@create')
            ->name('.create')
            ->middleware(['auth:admin', 'permission:province.create']);

        Route::post('/', 'ProvinceController@store')
            ->name('.store')
            ->middleware(['auth:admin', 'permission:province.store']);

        Route::get('/{province}/edit', 'ProvinceController@edit')
            ->name('.edit')
            ->middleware(['auth:admin', 'permission:province.edit']);

        Route::patch('/{province}', 'ProvinceController@update')
            ->name('.update')
            ->middleware(['auth:admin', 'permission:province.update']);


        Route::post('{province}/city', 'CityController@store')
            ->name('.cities.store')
            ->middleware(['auth:admin', 'permission:province.store']);

    });


    Route::prefix('cities')->name('cities')->group(function () {
        Route::patch('/{city}', 'CityController@update')
            ->name('.update')
            ->middleware(['auth:admin', 'permission:city.update']);
    });

    //Page Gallery
    Route::patch('galleries/{pageGallery}/sort-update', 'PageGalleryController@sort')
        ->name('galleries.sortUpdate');


    Route::prefix('tickets')->name('tickets')->group(function () {

        Route::get('/', 'TicketController@index')
            ->name('.index')
            ->middleware(['auth:admin', 'permission:ticket.index']);

        Route::prefix('department')->name('.department')->group(function () {

            Route::get('/', 'TicketDepartmentController@index')
                ->name('.index')
                ->middleware(['auth:admin', 'permission:department.index']);

            Route::post('/', 'TicketDepartmentController@store')
                ->name('.store')
                ->middleware(['auth:admin', 'permission:department.store']);

        });

        Route::prefix('{ticket}')->group(function () {

            Route::get('/', 'TicketController@show')
                ->name('.show')
                ->middleware(['auth:admin', 'permission:tickets.show']);

            Route::prefix('messages')->name('.messages')->group(function () {

                Route::post('/', 'TicketMessageController@store')
                    ->name('.store')
                    ->middleware(['auth:admin', 'permission:tickets.message.store']);

            });

        });
    });


});
