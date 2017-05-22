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
    
    Route::post('/asistentesocial/beneficiario', [
    'uses' => 'FichaSocialController@store',
    'as' => 'social.asistenteSocialBeneficiario'
    ]);

    Route::get('/asistentesocial/menu/visita', [
    'uses' => 'FichaSocialController@index2',
    'as' => 'social.asistenteSocialVisitaDomiciliaria'
    ]);
});

Route::group(['prefix' => '/medica'], function (){

    Route::group(['prefix' => '/ficha-evaluacion-inicial'], function (){

        Route::group(['prefix' => '/kinesiologia'], function (){

            Route::get('/ingresar/{id}', [
                'uses' => 'FichaKinesiologiaController@getIngresar',
                'as' => 'medica.ficha-evaluacion-inicial.kinesiologia.ingresar'
            ]);

            Route::post('/ingresar', [
                'uses' => 'FichaKinesiologiaController@postIngresar',
                'as' => 'medica.ficha-evaluacion-inicial.kinesiologia.ingresar'
            ]);
        });

        Route::group(['prefix' => '/fonoaudiologia'], function (){

            Route::get('/ingresar', [
                'uses' => 'FichaFonoaudiologiaController@getIngresar',
                'as' => 'medica.ficha-evaluacion-inicial.fonoaudiologia.ingresar'
            ]);

            Route::post('/ingresar', [
                'uses' => 'FichaFonoaudiologiaController@postIngresar',
                'as' => 'medica.ficha-evaluacion-inicial.fonoaudiologia.ingresar'
            ]);

            Route::get('/mostrar-lista', [
                'uses' => 'FichaFonoaudiologiaController@getMostrarLista',
                'as' => 'medica.ficha-evaluacion-inicial.fonoaudiologia.mostrar-lista'
            ]);
        });

        Route::group(['prefix' => '/terapia-ocupacional'], function (){

            Route::get('/ingresar', [
                'uses' => 'FichaTerapiaOcupacionalController@getIngresar',
                'as' => 'medica.ficha-evaluacion-inicial.terapia-ocupacional.ingresar'
            ]);

            Route::post('/ingresar', [
                'uses' => 'FichaTerapiaOcupacionalController@postIngresar',
                'as' => 'medica.ficha-evaluacion-inicial.terapia-ocupacional.ingresar'
            ]);

            Route::get('/mostrar-lista', [
                'uses' => 'FichaTerapiaOcupacionalController@getMostrarLista',
                'as' => 'medica.ficha-evaluacion-inicial.terapia-ocupacional.mostrar-lista'
            ]);
        });
    });
});



Route::group(['prefix' => 'beneficiario'], function () {
    Route::get('/registrar', [
        'uses' => 'BeneficiarioController@create',
        'as' => 'beneficiario.create'
    ]);

    Route::post('/registrar', [
        'uses' => 'BeneficiarioController@store',
        'as' => 'beneficiario.store'
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

