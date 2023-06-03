<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('v1/domains','Api\V1\DomainController');
Route::resource('pages','Api\V1\PageController');
Route::resource('users','Api\V1\UserController');
Route::resource('work-categories','Api\V1\WorkCategoryController');
Route::resource('work-items','Api\V1\WorkItemController');