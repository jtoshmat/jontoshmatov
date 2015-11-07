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
	    return view('welcome');
	});


//	Route::any("users/login", [
//		"as"   => "user/login",
//		"uses" => "UsersController@login"
//	]);

	Route::group(array('prefix' => 'users'), function () {
		Route::any('login', 'UsersController@login');
		Route::any('register', 'UsersController@register');
		Route::any('payment', 'UsersController@payment');
		Route::any('forgotpassword', 'UsersController@forgotPassword');
		Route::any('logout', 'UsersController@logout');
	});

	Route::any("/", function () {
		return Redirect::to("/");
	});

	Route::any('/', 'PublicController@index');

	Route::group(['middleware' => 'auth'], function($router)
	{

		Route::any('users/profiles', 'UsersController@profiles');


		Route::get("users/activate/{id}/{action}", [
			"as"   => "users/activate",
			"uses" => "UsersController@activate"
		],function($id, $action){
			return $id;
		})->where('id', '[0-9]+')->where('action','activate|deactivate');

		Route::get("users/admin/{id}/{action}", [
			"as"   => "users/activateadmin",
			"uses" => "UsersController@activateAdmin"
		],function($id, $action){
			return $id;
		})->where('id', '[0-9]+')->where('action','admin|nonadmin');

		Route::any("users/profile/{id}", [
			"as"   => "users/profile",
			"uses" => "UsersController@profile"
		],function($id){
			return $id;
		})->where('id', '[0-9]+');
	});