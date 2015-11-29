<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Middlware custom routes list
    |--------------------------------------------------------------------------
    |
    | This is where we store all the routes list
    | Jon Toshmatov
    | more to come
    |
    */
    'routes' => [

        /*
         * All custom routes
         */
        'role' =>   'admin,student',
        'games' =>  'admin,student',
        'contactupdate' =>  'admin,principal,teacher',
        'all' =>  'admin,principal,teacher,student',
        'studentfriends' => 'guardian, student'

    ],
];
