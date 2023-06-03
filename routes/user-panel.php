<?php

use Illuminate\Support\Facades\Route;

//todo: Test route delete it after use
//Route::view('/messages','user-panel/pages/domain/messages/index')->name('messages');
//Route::view('/message','user-panel/pages/domain/messages/show')->name('message');
Route::view('/reviews','user-panel/reviews/show')->name('reviews');

Route::get('/login', 'AuthController@loginPage')
    ->name('loginPage');


Route::post('/register', 'AuthController@register')
    ->name('register');


Route::post('/login', 'AuthController@login')
    ->name('login');


Route::group(['middleware' => ['web', 'auth']], function () {


    Route::post('/set-city', 'AuthController@setCity')
        ->name('setCity');

    Route::get('/', 'IndexController@index')
        ->name('index');

    Route::get('/set-page/{page}', 'AuthController@setPage')
        ->name('setPage');

    Route::get('/logout', 'AuthController@logout')
        ->name('logout');

    Route::get('/profile', 'ProfileController@index')
        ->name('profile.index');

    Route::patch('/profile/update', 'ProfileController@update')
        ->name('profile.update');

    Route::patch('/profile/set-avatar', 'ProfileController@setAvatar')
        ->name('profile.setAvatar');



    Route::prefix('pages')->name('pages.')->group(function(){

        Route::prefix('domains')->name('domains.')->group(function () {
            Route::post('/', 'DomainController@store')
                ->name('store');

            Route::patch('/', 'DomainController@update')
                ->name('update');
        });
        Route::prefix('{page}/messages')->name('messages.')->group(function () {
            Route::get('/','TenantMessageController@index')->name('index');
            Route::get('/{message}','TenantMessageController@show')->name('show');
//            Route::resource('/','TenantMessageController');
        });

        // Page Phones Route
        Route::prefix('phones')->name('phones.')->group(function () {

            Route::get('/', 'PhoneController@index')
                ->name('index');

            Route::post('/', 'PhoneController@store')
                ->name('store');

            Route::patch('/', 'PhoneController@update')
                ->name('update');

            Route::delete('/', 'PhoneController@destroy')
                ->name('delete');

            Route::post('sort', 'PhoneController@sort')
                ->name('sort');


        });

        Route::get('{page}/connections/create', 'PageConnectionController@create')
            ->name('connections.create');

        // Page Connections Route
        Route::prefix('connections')->name('connections.')->group(function () {

            Route::get('/', 'PageConnectionController@index')
                ->name('index');

            Route::post('/', 'PageConnectionController@store')
                ->name('store');

            Route::patch('/', 'PageConnectionController@update')
                ->name('update');

            Route::delete('/', 'PageConnectionController@destroy')
                ->name('delete');

            Route::post('sort', 'PageConnectionController@sort')
                ->name('sort');

        });

        // Page WorkTimes Route
        Route::prefix('{page}/work-times')->name('workTime.')->group(function(){

            Route::get('/create', 'WorkTimeController@create')
                ->name('create');

            Route::post('/', 'WorkTimeController@store')
                ->name('store');

            Route::get('/', 'WorkTimeController@index')
                ->name('index');
        });

        Route::prefix('{page}/galleries')->name('galleries.')->group(function(){
            Route::get('create', 'PageGalleryController@create')
                ->name('create');
            Route::get('/', 'PageGalleryController@index')
                ->name('index');
            Route::get('/{pageGallery}', 'PageGalleryController@show')
                ->name('show');
            Route::post('/', 'PageGalleryController@store')
                ->name('store');

            Route::patch('/', 'PageGalleryController@update')
                ->name('update');
            Route::prefix('{pageGallery}/images')->name('images.')->group(function(){

                Route::post('/', 'PageGalleryImageController@store')
                    ->name('store');

            });







           Route::get('/{pageGallery}/edit', 'PageGalleryController@edit')
               ->name('edit');



           Route::delete('{pageGallery}', 'PageGalleryController@destroy')
               ->name('destroy');

           Route::patch('{pageGallery}/sort', 'PageGalleryController@sort')
               ->name('sort');

        });


        // Page Routes

        Route::get('/', 'PageController@index')
            ->name('index');

        Route::get('create', 'PageController@create')
            ->name('create');

        Route::post('/', 'PageController@store')
            ->name('store');

        Route::get('{page}/edit', 'PageController@edit')
            ->name('edit');

        Route::patch('{page}', 'PageController@update')
            ->name('update');

        Route::delete('{page}', 'PageController@destroy')
            ->name('destroy');

        Route::get('{page}', 'PageController@show')
            ->name('show');

        Route::patch('{page}/basic-data-update', 'PageController@basicDataUpdate')
            ->name('basic_data_update');

        Route::patch('{page}/image-data-update', 'PageController@imageDataUpdate')
            ->name('image_data_update');

        Route::patch('{page}/address-data-update', 'PageController@addressDataUpdate')
            ->name('address_data_update');

        // Page Store Step-method Route
        Route::post('pages/store-step-1-validate', 'PageController@store_step_1_validator')
            ->name('step1Validate');

        Route::post('pages/store-step-2-validate', 'PageController@store_step_2_validator')
            ->name('step2Validate');

        Route::post('pages/new-store', 'PageController@store_step')
            ->name('step3Validate');

    });


    Route::prefix('tickets')->name('tickets')->group(function () {

        Route::post('/', 'TicketController@store')
            ->name('.store');

        Route::get('/', 'TicketController@index')
            ->name('.index');

        Route::get('/departments', 'TicketController@departments')
            ->name('.departments');


        Route::get('/list', 'TicketController@tickets')->name('.list');

        Route::prefix('{ticket}')->group(function () {

            Route::prefix('messages')->name('.messages')->group(function () {

                Route::post('/send-file', 'TicketMessageController@sendFile')
                    ->name('.send_file');

                Route::get('/', 'TicketMessageController@index')
                    ->name('.index');

                Route::post('/', 'TicketMessageController@store')
                    ->name('.store');

            });

        });
    });
});