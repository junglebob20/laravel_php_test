<?php

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

//guest routers
Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return redirect('login');
    });
    Route::get('login', 'LoginController@show');
    Route::get('logincheck', 'LoginController@log_in');
});

//auth routers
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return redirect('dashboard');
    });
    Route::get('logout', 'LoginController@logout');
    Route::get('dashboard', 'DashboardController@index');
});
