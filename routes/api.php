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

Route::name('api.mobile.v1.')->prefix('mobile/v1')->group(function () {
    Route::view('/documentation', 'api.documentation.v1');

    Route::prefix('/auth')->group(function () {
        Route::post('/login', 'Api\AuthController@login');
        Route::post('/register', 'Api\AuthController@register');
    });

    Route::middleware(['check.api_auth'])->group(function () {
        Route::apiResource('/tours', 'Api\TourController');
    });
});
