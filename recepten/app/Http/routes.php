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

Route::get('/', "ReceptenController@index");



Route::get('/login', function () {
    return view('login');
});

Route::get('/recepten', "ReceptenController@index", function () {
    return view('recepten');
});

Route::get('/recept', function () {
    return view('recepten');
});