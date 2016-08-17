<?php


$api = app('Dingo\Api\Routing\Router');

/*
|--------------------------------------------------------------------------
| Application API Routes
|--------------------------------------------------------------------------
|
|
*/

$api->version('v1', function ($api) {

    /*
    |--------------------------------------------------------------------------
    | Unprotected API endpoints
    |--------------------------------------------------------------------------
    */

    //Authenticate user and create session
    $api->post('/session', 'App\Http\Controllers\SessionsController@store');

    /*
    |--------------------------------------------------------------------------
    | Protected API endpoints
    |--------------------------------------------------------------------------
    */
    $api->group(['middleware' => 'api.auth'], function ($api) {

        /*
        |--------------------------------------------------------------------------
        | Session API Routes
        |--------------------------------------------------------------------------
        */

        //Get user logged in
        $api->get('/session', 'App\Http\Controllers\SessionsController@index');

        //Update Session and Retrieve new token
        $api->put('/session', 'App\Http\Controllers\SessionsController@update');

        //Logout and remove session
        $api->delete('/session', 'App\Http\Controllers\SessionsController@delete');



        /*
        |--------------------------------------------------------------------------
        | User API Routes
        |--------------------------------------------------------------------------
        */
        $api->post('/users', 'App\Http\Controllers\UsersController@store');

    });



});


