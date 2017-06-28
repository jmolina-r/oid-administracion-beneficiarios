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
    
    Route::get('/asistentesocial/menu', [
    'uses' => 'FichaSocialController@show',
    'as' => 'social.asistenteSocial'
    ]);   

    Route::post('/asistentesocial/menu',[
    'uses' => 'FichaSocialController@post',
    'as' => 'social.asistentesocial'
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

Route::group(['prefix' => 'reportabilidad'], function(){
    Route::get('/createFichaPaciente', [
    'uses' => 'ReportabilidadController@show',
    'as' => 'reportabilidad.createFichaPaciente'
    ]);
    
    Route::get('/showEstadistica', [
    'uses' => 'ReportabilidadController@showResults',
    'as' => 'reportabilidad.showEstadistica'
    ]);   
});

