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
    
    Route::get('/asistentesocial/beneficiario', [
    'uses' => 'FichaSocialController@show',
    'as' => 'social.asistenteSocialBeneficiario'
    ]);

    Route::get('/asistentesocial/visita', [
    'uses' => 'FichaSocialController@index2',
    'as' => 'social.asistenteSocialVisitaDomiciliaria'
    ]);


    Route::get('/asistentesocial/menu/beca', [
        'uses' => 'FichaSocialController@index3',
        'as' => 'social.asistenteSocialBeca'
    ]);

    Route::get('/asistentesocial/menu/orientacion', [
        'uses' => 'FichaSocialController@index4',
        'as' => 'social.asistenteSocialOrientacion'
    ]);

    Route::get('/asistentesocial/menu/ayuda', [
        'uses' => 'FichaSocialController@index5',
        'as' => 'social.asistenteSocialAyudaTecnica'
    ]);

    Route::post('/asistentesocial/menu/orientacion', [
        'uses' => 'FichaSocialController@postMotivo',
        'as' => 'social.asistenteSocial'
    ]);
    
});


Route::group(['prefix' => '/medica'], function (){

    Route::group(['prefix' => '/ficha-evaluacion-inicial'], function (){

        Route::group(['prefix' => '/kinesiologia'], function (){

            Route::get('/ingresar', [
                'uses' => 'FichaKinesiologiaController@getIngresar',
                'as' => 'medica.ficha-evaluacion-inicial.kinesiologia.ingresar'
            ]);

            Route::post('/ingresar', [
                'uses' => 'FichaKinesiologiaController@postIngresar',
                'as' => 'medica.ficha-evaluacion-inicial.kinesiologia.ingresar'
            ]);
        });
    });
});



Route::group(['prefix' => 'beneficiario'], function () {
    Route::get('/registrar', [
        'uses' => 'BeneficiarioController@create',
        'as' => 'beneficiario.create'
    ]);

    Route::get('/editar/{id}', [
        'uses' => 'BeneficiarioController@edit',
        'as' => 'beneficiario.edit'
    ]);

    Route::get('/informacion/{id}', [
        'uses' => 'BeneficiarioController@show',
        'as' => 'beneficiario.show'
    ]);

    Route::get('/buscar', [
        'uses' => 'BeneficiarioController@find',
        'as' => 'beneficiario.find'
    ]);

    Route::post('/registrar', [
        'uses' => 'BeneficiarioController@store',
        'as' => 'beneficiario.store'
    ]);
});

