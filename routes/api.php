<?php

/*
|--------------------------------------------------------------------------
| api Routes
|--------------------------------------------------------------------------
|
|
*/

Route::group(['middleware' => 'cors'], function () {

    Route::post('login', 'Api\AuthController@authenticate');
    Route::post('refresh_token', 'Api\AuthController@refreshToken');

    Route::group(['middleware' => ['jwt.auth']], function () {
        Route::post('logout', 'Api\AuthController@logout');

        Route::resource('access', 'Api\AccessApiController', ['except' => ['create', 'edit']]);
    });


});