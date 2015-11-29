<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

if (env('APP_ENV') == 'local') {
    Event::listen('illuminate.query', function ($query) {
    // var_dump($query);
    });
}

Route::get('/home', function () {
    return view('welcome');
});

    Route::get('/aboutme', function () {
        return view('aboutme');
    });

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('admin/auth/login', 'AuthController@getLogin');
// Admin Routes
Route::group(['prefix' => 'admin'], function ($router) {
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    // Authenticated Users Only
    Route::group(['middleware' => 'auth'], function ($router) {
        Route::group(['middleware' => 'role:admin'], function ($router) {
            Route::any('admin/uploadcsv', 'AdminToolsController@uploadcsv');
            Route::any('admin/playground', 'AdminTestController@uploadImage');
        });

        Route::any('users/members', 'UsersController@members');
        Route::any('users/roles', 'UsersController@roles');
        Route::any('search', 'MasterController@search');

        Route::any('users/member/{id}/update', 'UsersController@memberUpdate')->where('id', '[0-9]+');
        Route::any('users/member/{id}/delete', 'UsersController@memberDelete')->where('id', '[0-9]+');
        Route::any('user/{id}/view', 'UsersController@user')->where('id', '[0-9]+');
        Route::any('district/{id}/view', 'DistrictsController@district')->where('id', '[0-9]+');
        Route::any('organizations', 'OrganizationsController@index')->where('id', '[0-9]+');
        Route::get('organization/{id}/view', 'OrganizationsController@organization');
        Route::any('groups', 'GroupsController@index');
        Route::get('group/{id}/view', 'GroupsController@group');
        Route::any('guardians', 'UsersController@guardian');

        //Composer for sidebars and user specific contents
        View::composer('partials.sidebar', 'app\cmwn\Users\UserSpecificRepository');
    });
});
