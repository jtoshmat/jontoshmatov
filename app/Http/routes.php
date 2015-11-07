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

    if(env('APP_ENV')=='local') {
        Event::listen('illuminate.query', function ($query) {
            var_dump($query);
        });
    }




    /*
     * All public routes are registered here.
     */

    Route::get('/', function () {
        return view('welcome');
    });




