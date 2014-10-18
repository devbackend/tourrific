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


Route::get('/profile', 'UserController@profile');

Route::post('/profile/edit', 'UserController@editProfile');

Route::get('/place/edit/{id}', function($id) {
	if ($id==0) {
		$place = new Place();
	} else {
		$place = Place::find($id);
	}
	return View::make('place/edit', array('place'=>$place));
});

Route::get('/place/new', function() {
	$place = new Place();
	return View::make('place/edit', array('place'=>$place));
});
Route::post('/place/save', array('as'=>'place.save', 'uses' => 'PlaceController@savePlace'));

Route::model('place','Place');
Route::get('/place/{place}', 'PlaceController@showPlace');
