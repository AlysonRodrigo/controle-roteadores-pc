<?php

Route::get('/', function () {
    return view('welcome');
});
//Auth::routes();

$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function (){

    $this->get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    $this->post('login','Admin\Auth\LoginController@login');

    Route::group([
        'namespace' => 'Admin\\',
        'as' => 'admin.',
        'middleware' => ['auth']
    ], function (){

        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('access', 'AccessController');
        $this->post('logout', 'Auth\LoginController@logout')->name('logout');

    });

});