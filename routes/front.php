<?php


use Illuminate\Support\Facades\Route;

Route::view('/404','errors/404');
Route::view('/soon','errors/soon');

Route::get('/', 'IndexController@index')->name('index');

Route::prefix('pages')->name('pages')->group(function () {

    Route::get('/', 'PageController@index')
        ->name('.index');

    Route::get('/{page}', 'PageController@show')
        ->name('.show');

    Route::post('/{page}/pageRateStore', 'PageController@pageRateStore')
        ->name('.pageRateStore');

    Route::get('/{page}/pageRateUpdate', 'PageController@pageRateUpdate')
        ->name('.pageRateUpdate');

    Route::prefix('{page}/galleries')->name('.galleries')->group(function () {
        Route::get('/{pageGallery}', 'PageGalleryController@show')->name('.show');
    });

});

Route::view('about-us', '/front/about-us');
Route::view('contact-us', '/front/contact-us');
Route::view('policies', '/front/policies');

Route::get('ajax/provinces','ProvinceController@getProvinces')->name('ajax.provinces');
Route::get('ajax/provinces/{id}/cities','CityController@getProvinceCities')->name('ajax.provinceCities');
Route::get('ajax/work-categories','WorkCategoryController@workCategories')->name('ajax.workCategories');
Route::get('ajax/work-categories/{id}/items','WorkItemController@workCategoryItems')->name('ajax.workCategoryItems');
Route::get('ajax/cities','CityController@citySearch')->name('ajax.citySearch');
Route::get('ajax/search/work-categories','workCategoryController@categorySearch')->name('ajax.workCategorySearch');
Route::get('ajax/work-items','workItemController@workItemSearch')->name('ajax.workItemSearch');


Route::view('new', '/front/new-homepage');