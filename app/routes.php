<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('user', function(){

    return View::make('user');
});

Route::get('/sign', 'UserController@viewForm');
Route::post('/sign', 'UserController@saveProfile');

Route::post('/login', 'UserController@login');

Route::get('/logout', 'UserController@logout');