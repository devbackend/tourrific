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
	return View::make('template', array('title'=>'Интересные места Приморья - Tourrific.ru', 'content'=>'<div class="wrapper">
				<h1>Приморский край</h1>
				<hr/>
			</div><div class="wrapper">
				<h1>Приморский край</h1>
				<hr/>
			</div>'));
});

Route::get('user', function(){

    return View::make('user');
});

Route::get('/users', 'UserController@allUsers');

Route::get('/sign', 'UserController@viewForm');
Route::post('/sign', 'UserController@saveProfile');

Route::post('/login', 'UserController@login');

Route::get('/logout', 'UserController@logout');

Route::model('user', 'User');

Route::get('/user/{user}', 'UserController@profile');

Route::get('/profile', function() {
	if(Auth::check()) {
		$user = Auth::user();
	}
	$request = Request::create('/user/'.$user->id, 'GET');
	return Route::dispatch($request)->getContent();
});

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

Route::model('place','Place', function(){ exit('Place not found'); });
Route::get('place/{place}', 'PlaceController@showPlace');

Route::post('/photo', 'MediaController@photoLoad');

Route::post('/addcomment', 'CommentController@add');

Route::controller('rate', 'RateController');
Route::controller('blog', 'BlogController');

Route::post('/comment/send', 'CommentController@addComment');
Route::get('/comments/{model_id}/{instance_id}', 'CommentController@commentList');
