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

// get/ is de url die je krijgt
// uses geeft aan welke controller hij gebruikt en @ geeft aan welke functie die in de controller gebruikt
// as geeft aan hoe je deze route kan aanroepen
// middleware => auth geeft aan dat je alleen mag gebruiken als je ingelogd ben




Route::get('/', [
    'uses' => 'ReceptenController@index',
    'as' => 'home',
]);



Route::get('register', [
    'uses' => 'AuthController@getRegister',
    'as' => 'register.index',

]);

Route::post('register', [
    'uses' => 'AuthController@postRegister',

]);

Route::get('login', [
    'uses' => 'AuthController@getLogin',
    'as' => 'login.index',

]);

Route::post('login', [
    'uses' => 'AuthController@postLogin',
]);

Route::get('uitloggen', [
    'uses' => 'AuthController@getSignout',
    'as' => 'auth.signout',
]);



Route::get('recepten', "ReceptenController@index", function () {
    return view('recepten');
});


Route::post('recept/opslaan', "ReceptController@recept_opslaan", function () {

});

Route::get('editrecept', "ReceptenController@index", function () {
    return view('recepten');
});

route::get('mijnrecepten',[
    'uses' => 'ReceptenController@mijnrecepten',
    'as' => 'mijnrecepten.index',
    'middleware' => 'auth',
]);

Route::get('recept/toevoegen', [
    'uses' => 'ReceptController@recept_toevoegen',
    'as' => 'recepttoevoegen.index',
    'middleware' => 'auth',
 ]);

Route::get('recept/{id}', [
    'uses' => 'ReceptController@index',
    'as' => 'recept.index',
]);



Route::get('recepttoevoegen/add', [
    'uses' => 'ReceptController@toevoegen',
    'as' => 'recepttoevoegen.add',
]);


Route::get('receptbewerken/{id}', [
    'uses' => 'ReceptController@edit',
    'as' => 'receptedit.index',
]);

Route::post('receptbewerken/opslaan/{id}', [
    'uses' => 'ReceptController@editsave',
    'as' => 'recepteditsave.index',
]);


Route::get('receptverwijderen/{id}', [
    'uses' => 'ReceptController@delete',
    'as' => 'receptverwijderen.index',
]);
Route::get('receptupvoten/{id}', [
    'uses' => 'ReceptController@upvote',
    'as' => 'receptupvoten.index',
]);

Route::get('favorieten', [
    'uses' => 'ReceptenController@favorieten',
    'as' => 'mijnfavorieten.index',
    'middleware' => 'auth',
]);

Route::get('favorieten/{id}', [
    'uses' => 'ReceptController@favorietToevoegen',
    'as' => 'favoriettoevoegen.index',
]);
Route::get('favorietverijderen/{id}', [
    'uses' => 'ReceptController@favorietVerwijderen',
    'as' => 'favorietverwijderen.index',
]);
Route::get('favorietverijderenlijst/{id}', [
    'uses' => 'ReceptController@favorietVerwijderenVanuitLijst',
    'as' => 'favorietverwijderenlijst.index',
]);

Route::post('resultaten',[
    'as' => 'results.search',
    'uses' => 'QueryController@search',
]);






// Catagorieen
Route::get('voorgerechten', [
    'uses' => 'ReceptenController@voorgerechten',
    'as' => 'voorgerechten.index',
]);
Route::get('hoofdgerechten', [
    'uses' => 'ReceptenController@hoofdgerechten',
    'as' => 'hoofdgerechten.index',
]);
Route::get('nagerechten', [
    'uses' => 'ReceptenController@nagerechten',
    'as' => 'nagerechten.index',
]);
Route::get('tussengerechten', [
    'uses' => 'ReceptenController@tussengerechten',
    'as' => 'tussengerechten.index',
]);
Route::get('cake-gebak-taart', [
    'uses' => 'ReceptenController@cake',
    'as' => 'cake.index',
]);
Route::get('overig', [
    'uses' => 'ReceptenController@overig',
    'as' => 'overig.index',
]);
//einde catagorieen


Route::get('upvotesfor/{id}', function($id) {
    return DB::table('upvotes')->where('receptId', $id)->count();
});

Route::get('/imageupload', 'UploadController@index');

Route::post('add', 'UploadController@uploadFiles');