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

