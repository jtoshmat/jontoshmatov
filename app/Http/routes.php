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
            //var_dump($query);
        });
    }

    /*
     * All public routes are registered here.
     */

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', function () {
        return view('home');
    });

    Route::get('/aboutme', 'PublicController@aboutme');


    // Authentication routes...
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');

    // Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');

    $router->get("/awesome/sauce", ['middleware' => 'role:student,admin'], function () {
        echo('Awesome Sauce');
    });

    Route::group(['middleware' => 'auth'], function($router) {
        /*
         * All authenticated routes are registered here inside of auth
         */

        Route::any('users/members', 'UsersController@members');
        Route::any('users/roles', 'UsersController@roles');

        Route::group(['middleware' => 'role:'.Config::get('myroutes.routes.role')], function ($router) {

            Route::get("users/member/{id}/{action}", [
                "as"   => "users/member",
                "uses" => "UsersController@member",
            ],function($id, $action){
                return $id;
            })->where('id', '[0-9]+')->where('action','view');
        });


        //All Admin Tools here in this group
        Route::group(['middleware' => 'role:admin'], function ($router) {
            Route::any('admin/uploadcsv', 'AdminToolsController@uploadcsv');
            Route::any('admin/playground', 'AdminTestController@uploadImage');
        });

        Route::any('users/member/{id}/update', 'UsersController@memberUpdate')->where('id', '[0-9]+');
        Route::any('users/member/{id}/delete', 'UsersController@memberDelete')->where('id', '[0-9]+');
        Route::any('user/{id}/view', 'UsersController@user')->where('id', '[0-9]+');
        Route::any('districts', 'DistrictsController@index');
        Route::any('district/{id}/view', 'DistrictsController@district')->where('id', '[0-9]+');
        Route::any('organizations', 'OrganizationsController@index')->where('id', '[0-9]+');
        Route::any('organization/{id}/view', 'OrganizationsController@organization')->where('id', '[0-9]+');
        Route::any('groups', 'GroupsController@index');
        Route::any('group/{id}/view', 'GroupsController@group')->where('id', '[0-9]+');
        Route::any('guardians', 'UsersController@guardian');

        //Composer for sidebars and user specific contents
        View::composer('partials.sidebar','app\cmwn\Users\UserSpecificRepository');



    });


