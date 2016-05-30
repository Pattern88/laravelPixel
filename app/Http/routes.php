<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/pixels');
    }
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/pixels', 'PixelController@index');
Route::get('/pixels/create', 'PixelController@create');
Route::post('/pixels/store', 'PixelController@store');
Route::get('/pixels/{user}', 'PixelController@show');

Route::get('/tests/one', 'TestController@one');
Route::get('/tests/two', 'TestController@two');