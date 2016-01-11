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

    if (env('APP_ENV') == 'local') {
        Event::listen('illuminate.query', function ($query) {
             var_dump($query);
        });
    }

	Route::get('/', function () {
	    return redirect('https://www.linkedin.com/in/toshmatovus');
	});

    Route::get('/home', function () {
        return "Yay, you are logged on!";
    });

    Route::get('/aboutme', function () {
        return view('aboutme');
    });

    Route::get('test', 'TestController@test');

    Route::get('/posts', 'PostsController@index');

    Route::group(array('prefix' => 'users'), function () {
        Route::get('login', 'Auth\AuthController@getLogin');
        Route::post('login', 'Auth\AuthController@postLogin');
        Route::get('logout', 'Auth\AuthController@getLogout');
    });

