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


Route::post('auth/register', 'Api\Auth\JWTAuthController@register');
Route::post('auth/login', 'Api\Auth\JWTAuthController@login');

Route::group(['middleware'=>['apiJwt']],function(){
    Route::post('auth/logout', 'Api\Auth\JWTAuthController@logout');
    Route::prefix('business')->group(function (){
        Route::post('/doRegister', 'Api\businessController@register');
        Route::post('/update', 'Api\businessController@updateBusiness');
        Route::get('/get/all','Api\businessController@getAllUserPosts');

    });
});

