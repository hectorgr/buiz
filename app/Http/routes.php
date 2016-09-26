<?php

/*
|--------------------------------------------------------------------------
| App Routes
|--------------------------------------------------------------------------
*/

// Authenication Accounts
Route::get('/', ['uses' => 'Auth\AuthController@getLogin', 'as' => 'login']);
Route::post('/', ['uses' => 'Auth\AuthController@postLogin', 'as' => 'loginPost']);
Route::get('logout', ['uses' => 'Auth\AuthController@getLogout', 'as' => 'logout']);
// Registration Accounts
Route::get('signup', ['uses' => 'Auth\AuthController@getRegister', 'as' => 'signup']);
Route::post('signup', ['uses' => 'Auth\AuthController@postRegister', 'as' => 'signupPost']);
Route::get('activation/{token}', ['uses' => 'Auth\AuthController@getActivation', 'as' => 'activation']);
// Recover Password
Route::get('recover', ['uses' => 'Auth\PasswordController@getEmail', 'as' => 'recover']);
Route::post('recover', ['uses' => 'Auth\PasswordController@postEmail', 'as' => 'recoverPost']);
// Reset Password
Route::get('reset/{token}', ['uses' => 'Auth\PasswordController@getReset', 'as' => 'reset']);
Route::post('reset', ['uses' => 'Auth\PasswordController@postReset', 'as' => 'resetPost']);

/*
|--------------------------------------------------------------------------
| Restricted Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', ['uses' => 'HomeController@index', 'as' => 'home']);
});
