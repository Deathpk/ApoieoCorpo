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
Route::post('auth/reset', 'Api\Auth\JWTAuthController@sendPasswordReset');
/* Contadores*/
Route::get('user/counter','Api\userController@getUsersCounter');
Route::get('business/counter', 'Api\businessController@getBusinessCounter');

Route::post('contact/help', 'Api\contactController@sendContactMessage');

Route::group(['middleware'=>['apiJwt']],function(){
    Route::post('auth/logout', 'Api\Auth\JWTAuthController@logout');

    Route::prefix('business')->group(function (){
        Route::post('/register', 'Api\businessController@register');
        Route::put('/update', 'Api\businessController@updateBusiness');
        Route::get('/get/all','Api\businessController@getAllUserPosts');
        Route::post('/search','Api\businessController@searchForBusiness');
        Route::delete('/delete', 'Api\businessController@deleteBusiness');
        Route::get('/get/ufList', 'Api\businessController@getListOfUfs');
        Route::post('/get/municipios/{id}', 'Api\businessController@getMunicipiosByUf');
    });

    Route::prefix('user')->group( function (){
        Route::put('/update', 'Api\userController@updateUserInformation');
        Route::delete('/delete', 'Api\userController@deleteUser');
    });

});

