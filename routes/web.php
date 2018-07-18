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

Route::get('/', function () {
    if(Auth::check()){
        return redirect('dashboard');
    }
    return redirect('login');
});

Route::get('login', 'LoginController@show');
Route::get('logincheck', 'LoginController@log_in');

Route::get('logout', 'LoginController@logout');

//dashboard
Route::get('dashboard', 'DashboardController@index');

//images
Route::get('/images','ImagesController@index');
Route::post('/image', 'ImagesController@store');
Route::get('/image/delete/{id}', 'ImagesController@destroy');


//imageFiltr
Route::get('/images/filtr/{column}/{option}', 'ImagesController@filtr');


