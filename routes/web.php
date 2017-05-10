<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => 'UserController@getLogin',
    'as' => 'user.login'
]);

Route::group(['prefix' => 'areasocial'], function(){
    Route::get('/asistentesocial', [
    'uses' => 'FichaSocialController@index',
    'as' => 'social.asistenteSocial'
    ]);
    
    Route::get('/asistentesocial/beneficiario/{id}', [
    'uses' => 'FichaSocialController@findBeneficiario',
    'as' => 'social.asistenteSocial'
    ]);
});



