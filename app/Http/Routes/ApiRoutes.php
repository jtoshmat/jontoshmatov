<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/csrf_token', 'Api\ApiController@getToken');
Route::get('/parms/{parm_name}', function ($parm_name) {
    return \Config::get('mycustomvars.'.$parm_name);
});
Route::post('/auth/login', 'Api\AuthController@authenticate');
Route::post('/auth/reset', 'Auth\PasswordController@reset');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');

Route::group(['middleware' => 'auth'], function ($router) {

    Route::post('/auth/password', 'Api\AuthController@updatePassword');

    Route::get('/parms/{parm_name}', function ($parm_name) {
        return \Config::get('mycustomvars.'.$parm_name);
    })->where('parm_name', '[a-z]+');

    Route::get('/sidebar', 'Api\MasterController@sidebar');
    Route::get('/friends', 'Api\MasterController@friends');

    Route::get('/auth/logout', 'Api\AuthController@logout');

    Route::get('/users', 'Api\UserController@index');
    Route::get('/users/{id}', 'Api\UserController@show');
    Route::post('/users/{id}', 'Api\UserController@update');

    Route::get('/users/{id}/groups', 'Api\UserController@getGroups');

    //User Images
    Route::get('/users/{id}/image', 'Api\UserController@showImage');
    Route::put('/users/{id}/image', 'Api\UserController@updateImage');
    Route::delete('/users/{id}/image', 'Api\UserController@deleteImage');

    Route::get('/suggestedfriends', 'Api\SuggestedController@show');

    Route::get('/users/friendrequest/{id}', 'Api\FriendshipController@show');
    Route::post('/users/acceptfriendrequest/{id}', 'Api\FriendshipController@accept');
    Route::post('/users/rejectfriendrequest/{id}', 'Api\FriendshipController@reject');

    //Get Groups
    Route::get('/groups', 'Api\GroupController@index');
    Route::get('/groups/{id}', 'Api\GroupController@show');
    Route::get('/groups/{id}/users', 'Api\GroupController@getUsers');

    //Post Groups
    Route::post('/groups/{id}', ['uses' => 'Api\GroupController@update']);

    //Get Districts
    Route::get('/districts', 'Api\DistrictController@index');
    Route::get('/districts/{id}', 'Api\DistrictController@show');
    Route::get('/districts/{id}/organizations', 'Api\DistrictController@getOrganizations');

    //Put Districts
    Route::post('/districts/{id}', ['uses' => 'Api\DistrictController@update']);

    //Get Organizations
    Route::get('/organizations', 'Api\OrganizationController@index');
    Route::get('/organizations/{id}', 'Api\OrganizationController@show');

    //Put Organizations
    Route::post('/organizations/{id}', ['uses' => 'Api\OrganizationController@update']);

    Route::get('/roles', 'Api\RoleController@index');
    Route::get('/roles/{id}', 'Api\RoleController@show');

    //Games
    Route::get('/games', 'Api\GameController@index');
    Route::get('/games/{id}', 'Api\GameController@show');
    Route::post('/games/{id}', 'Api\GameController@update');
    Route::delete('/games/{id}', 'Api\GameController@delete');

    //Flips
    Route::get('/flips', 'Api\FlipController@index');
    Route::get('/flips/{id}', 'Api\FlipController@show');
    Route::post('/flips/{id}', 'Api\FlipController@update');
    Route::delete('/flips/{id}', 'Api\FlipController@delete');


    //Admin tasks: Import Excel files and update the DB.
    Route::post('/admin/importexcel', ['uses' => 'Api\MasterController@importExcel']);

});
