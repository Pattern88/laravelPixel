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
	// if user login
    if (Auth::check()) {
        return redirect('/home');
    }
	// else return to welcome page
    return view('welcome');
});

Route::auth();

// Handle /home routes
Route::get('/home', 'HomeController@index');

// Handle /popups routes
Route::get('/popups', 'PopupController@index');
Route::get('/popups/create', 'PopupController@create');
Route::post('/popups/store', 'PopupController@store');
Route::get('/popups/{popup}', 'PopupController@show');
Route::delete('/popups/{popup}/delete', 'PopupController@destroy');

// Handle /tests routes
Route::get('/tests/one', 'TestController@one');
Route::get('/tests/two', 'TestController@two');
Route::get('/tests/three', 'TestController@three');