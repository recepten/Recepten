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

Route::get('/', [
    'uses' => 'ReceptenController@index',
    'as' => 'home',
]);


Route::get('/register', [
    'uses' => 'AuthController@getRegister',
    'as' => 'register.index',
    'middleware' => ['guest'],
]);

Route::post('/register', [
    'uses' => 'AuthController@postRegister',
    'middleware' => ['guest'],
]);

Route::get('/login', [
    'uses' => 'AuthController@getLogin',
    'as' => 'login.index',
    'middleware' => ['guest'],
]);

Route::post('/login', [
    'uses' => 'AuthController@postLogin',
    'middleware' => ['guest'],
]);

Route::get('/uitloggen', [
    'uses' => 'AuthController@getSignout',
    'as' => 'auth.signout',
]);



Route::get('/recepten', "ReceptenController@index", function () {
    return view('recepten');
});

Route::get('/recept', function () {
    return view('recept');
});

