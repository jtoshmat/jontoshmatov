<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Custom vars list
    |--------------------------------------------------------------------------
    |
    | This is where we store all the custom vars list
    | Jon Toshmatov
    | more to come
    |
    */
    'roles' => [

        /*
         * All custom roles
         */
        'super_admin' =>   1,
        'admin'       =>   2,
        'member'      =>   3,
    ],

    'no_csrf' => [
        /*
         * All excluded pages from CSRF session token validation
         */
        '/api/',
        '/api/districts/',
        '/api/organizations/',
        '/api/groups/',
        '/api/users/',
    ],

    'cloudinary' => [
        /*
         * Cloudinary API parms
         */
        'cloud_name' => 'change-my-world-now',
        'api_key' => '125692255259728',
        'api_secret' => 'xTgojKXezGKFAd6v2aGQ_7mvmdM',
    ],

    'somethingelse' => [
        /*
         * More to come
         */
        'somethingelse' => 'wohoooo',
    ],

];
