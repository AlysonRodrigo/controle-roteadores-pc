<?php

Route::get('/','Admin\Auth\LoginController@showLoginForm');

$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::prefix('admin')->group(function (){

    $this->get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    $this->post('login','Admin\Auth\LoginController@login');

    Route::group([
        'namespace' => 'Admin\\',
        'as' => 'admin.',
        'middleware' => ['auth']
    ], function (){

        Route::resource('users', 'UsersController');
        Route::resource('access', 'AccessController');
        $this->post('logout', 'Auth\LoginController@logout')->name('logout');

    });

});