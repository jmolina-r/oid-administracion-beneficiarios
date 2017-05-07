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

// Beneficiarios Routes
Route::group(['prefix' => 'beneficiario'], function () {
    Route::get('/', [
        'uses' => 'BeneficiarioController@getRegistrar',
        'as' => 'beneficiario.crear-beneficiario'
    ]);

    Route::get('/editar/{id}', [
        'uses' => 'BeneficiarioController@getEditar',
        'as' => 'beneficiario.editar-beneficiario'
    ]);

    Route::get('/informacion/{id}', [
        'uses' => 'BeneficiarioController@getPerfil',
        'as' => 'beneficiario.crear-beneficiario'
    ]);

    Route::get('/buscar', [
        'uses' => 'BeneficiarioController@getBuscar',
        'as' => 'beneficiario.crear-beneficiario'
    ]);
});
