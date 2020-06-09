<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Models\postdataModel;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $allBusiness = postdataModel::all();
    return view('dashboard', compact('allBusiness'));
})->name('dash');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'userController@logout')->name('logout');

//Business Routes
Route::get('dashboard/load', 'businessController@loadAll')->name('dashboard.load');
Route::get('Business/register', 'businessController@registerBusiness')->name('businessReg');
Route::put('Business/doRegister', 'businessController@doRegister')->name('Register');
Route::get('Business/getUserBusiness', 'businessController@updateBusiness')->name('getUserBusiness');
Route::put('Business/updateUserBusiness', 'businessController@doUpdateBusiness')->name('updateUserBusiness');