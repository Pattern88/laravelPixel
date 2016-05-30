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
        return redirect('/home');
    }
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/popups', 'PopupController@index');
Route::get('/popups/create', 'PopupController@create');
Route::post('/popups/store', 'PopupController@store');
Route::get('/popups/{popup}', 'PopupController@show');
Route::delete('/popups/{popup}/delete', 'PopupController@destroy');

// Test view
Route::get('/tests/one', 'TestController@one');
Route::get('/tests/two', 'TestController@two');
Route::get('/tests/three', 'TestController@three');