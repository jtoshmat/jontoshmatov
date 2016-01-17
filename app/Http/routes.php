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
	    return redirect('https://www.linkedin.com/in/toshmatovus');
	});

    Route::get('/aboutme', 'PublicController@aboutme');


    Route::group(['prefix' => 'portfolio'], function ($router) {
        Route::get('{project}/{page}', 'PublicController@amfam')
            ->where('project', 'amfam|greenbay');
    });


    Route::get('/csrf_token', function () {
        //return csrf_token();
    });

// Authentication routes...
    Route::get('/auth/login', 'Auth\AuthController@getLogin');
    Route::post('/auth/login', 'Auth\AuthController@postLogin');
    Route::get('/auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
    Route::get('/auth/register', 'Auth\AuthController@getRegister');
    Route::post('/auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');


    Route::group(['middleware' => 'auth'], function ($router) {
        Route::get('/parms/{parm_name}', function ($parm_name) {
            return \Config::get('mycustomvars.'.$parm_name);
        })->where('parm_name', '[a-z]+');

        Route::get('/home', 'MembersController@home');
    });
