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


Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'areasocial', 'middleware' => 'auth'], function(){
    Route::get('/asistentesocial', [
    'uses' => 'FichaSocialController@index',
    'as' => 'social.asistenteSocialGet'
    ]);

    Route::post('/asistentesocial/beneficiario', [
    'uses' => 'FichaSocialController@store',
    'as' => 'social.asistenteSocialBeneficiario'
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

Route::group(['prefix' => '/area-medica', 'middleware' => 'auth'], function (){

    Route::group(['prefix' => '/ficha-evaluacion-inicial'], function (){

        Route::group(['prefix' => '/kinesiologia'], function (){

            Route::get('/create/{id}', [
                'uses' => 'FichaKinesiologiaController@create',
                'as' => 'area-medica.ficha-evaluacion-inicial.kinesiologia.create'
            ])->middleware('roles:secretaria|admin');

            Route::post('/store', [
                'uses' => 'FichaKinesiologiaController@store',
                'as' => 'area-medica.ficha-evaluacion-inicial.kinesiologia.store'
            ]);
        });

        Route::group(['prefix' => '/fonoaudiologia'], function (){

            Route::get('/create/{id}', [
                'uses' => 'FichaFonoaudiologiaController@create',
                'as' => 'area-medica.ficha-evaluacion-inicial.fonoaudiologia.create'
            ]);

            Route::post('/postfono', [
                'uses' => 'FichaFonoaudiologiaController@postFono',
                'as' => 'area-medica.ficha-evaluacion-inicial.fonoaudiologia.postfono'
            ]);

            Route::post('/agregarpariente', [
                'uses' => 'FichaFonoaudiologiaController@postAgregarPariente',
                'as' => 'area-medica.ficha-evaluacion-inicial.fonoaudiologia.agregarpariente'
            ]);

        });

        Route::group(['prefix' => '/terapia-ocupacional'], function (){

            Route::get('/ingresar/{id}', [
                'uses' => 'FichaTerapiaOcupacionalController@getIngresar',
                'as' => 'area-medica.ficha-evaluacion-inicial.terapia-ocupacional.ingresar'
            ]);

            Route::post('/ingresar', [
                'uses' => 'FichaTerapiaOcupacionalController@postIngresar',
                'as' => 'area-medica.ficha-evaluacion-inicial.terapia-ocupacional.ingresar'
            ]);

            Route::get('/mostrar-lista', [
                'uses' => 'FichaTerapiaOcupacionalController@getMostrarLista',
                'as' => 'area-medica.ficha-evaluacion-inicial.terapia-ocupacional.mostrar-lista'
            ]);
        });

        Route::group(['prefix' => '/psicologia'], function (){

            Route::get('/create/{id}', [
                'uses' => 'FichaPsicologiaController@create',
                'as' => 'area-medica.ficha-evaluacion-inicial.psicologia.create'
            ]);

            Route::post('/store', [
                'uses' => 'FichaPsicologiaController@store',
                'as' => 'area-medica.ficha-evaluacion-inicial.psicologia.store'
            ]);
        });
    });

    Route::group(['prefix' => '/informe-cierre'], function (){

        Route::get('/createInforme', [
            'uses' => 'ReportabilidadController@createInformeCierre',
            'as' => 'area-medica.informe-cierre.createInformeCierre'
        ]);
    });
});



Route::group(['prefix' => 'beneficiario', 'middleware' => 'auth'], function () {
    Route::get('/registrar', [
        'uses' => 'BeneficiarioController@create',
        'as' => 'beneficiario.create',
    ])->middleware('roles:admin|secretaria');

    Route::post('/registrar', [
        'uses' => 'BeneficiarioController@store',
        'as' => 'beneficiario.store'
    ])->middleware('roles:admin|secretaria');

    Route::get('/editar/{id}', [
        'uses' => 'BeneficiarioController@edit',
        'as' => 'beneficiario.edit'
    ])->middleware('roles:admin|secretaria');

    Route::post('/editar', [
        'uses' => 'BeneficiarioController@update',
        'as' => 'beneficiario.update'
    ]);

    Route::get('/informacion/{id}', [
        'uses' => 'BeneficiarioController@show',
        'as' => 'beneficiario.show'
    ])->middleware('roles:admin|secretaria');

    // El buscador de beneficiarios no tiene restriccion de roles
    Route::get('/buscar', [
        'uses' => 'BeneficiarioController@find',
        'as' => 'beneficiario.find'
    ]);

    Route::get('/buscar-json', [
        'uses' => 'BeneficiarioController@findLikeNombreApellidoRutJson',
        'as' => 'beneficiario.findLikeNombreApellidoRutJson'
    ])->middleware('roles:admin|secretaria');
});

Route::group(['prefix' => 'reportabilidad', 'middleware' => 'auth'], function(){
    Route::get('/createFichaPaciente', [
        'uses' => 'ReportabilidadController@show',
        'as' => 'reportabilidad.createFichaPaciente'
    ]);

    Route::get('/showEstadistica', [
        'uses' => 'ReportabilidadController@showResults',
        'as' => 'reportabilidad.showEstadistica'
    ]);

    Route::get('/menuReportabilidad', [
        'uses' => 'ReportabilidadController@index',
        'as' => 'reportabilidad.menu'
    ]);

    Route::get('/reporteGeneralOID.pdf', [
        'uses' => 'PdfController@invoice',
        'as' => 'reportabilidad.reporteGeneral'
    ]);

    Route::get('/reporteKinesiologia.pdf', [
        'uses' => 'PdfController@invoice1',
        'as' => 'reportabilidad.reporteKine'
    ]);

    Route::get('/reportePsicologia.pdf', [
        'uses' => 'PdfController@invoice2',
        'as' => 'reportabilidad.reportePsico'
    ]);

    Route::get('/reporteTerapOcupacional.pdf', [
        'uses' => 'PdfController@invoice3',
        'as' => 'reportabilidad.reporteTer'
    ]);

    Route::get('/reporteSocial.pdf', [
        'uses' => 'PdfController@invoice4',
        'as' => 'reportabilidad.reporteSoc'
    ]);

    Route::get('/reporteGrupal.pdf', [
        'uses' => 'PdfController@invoice5',
        'as' => 'reportabilidad.reporteGru'
    ]);

    Route::get('/menu', [
    'uses' => 'ReportabilidadController@index',
    'as' => 'reportabilidad.menuReportabilidad'
    ]);

    Route::get('/profesional',[
        'uses'=>'ReportabilidadController@porProfesional',
        'as' => 'reportabilidad.reportabilidadPorProfesional'
    ]);

    Route::get('/reportabilidadKinesiologia',[
    'uses'=>'ReportabilidadController@showResultKine',
    'as' => 'reportabilidad.reportabilidadKine'
    ]); 

    Route::get('/reportabilidadPsiclogia',[
    'uses'=>'ReportabilidadController@showResultPsico',
    'as' => 'reportabilidad.reportabilidadPsico'
    ]);

    Route::get('/reportabilidadTerapiaOcupacional',[
    'uses'=>'ReportabilidadController@showResultTer',
    'as' => 'reportabilidad.reportabilidadTer'
    ]); 

    Route::get('/reportabilidadAtencionSocial',[
    'uses'=>'ReportabilidadController@showResultSoc',
    'as' => 'reportabilidad.reportabilidadSoc'
    ]); 

    Route::get('/reportabilidadGrupal',[
    'uses'=>'ReportabilidadController@showResultGrupal',
    'as' => 'reportabilidad.reportabilidadGru'
    ]);


});
/*
Route::group(['prefix' => '/docs'], function(){

    Route::get('/pdf', [
        'uses' => 'PdfController@invoice',
        'as' => 'pdf'
    ]);

});


=======
    'uses' => 'ReportabilidadController@showResults',
    'as' => 'reportabilidad.showEstadistica'
    ]);
});*/

Route::group(['prefix' => '/malla', 'middleware' => 'auth'], function (){
    Route::get('/show', [
        'uses' => 'MallaController@show',
        'as' => 'malla.show'
    ]);

    Route::post('/store', [
        'uses' => 'MallaController@store',
        'as' => 'malla.store'
    ]);

    Route::get('/poblar', [
        'uses' => 'MallaController@poblar',
    ]);

    Route::get('/getnombre', [
        'uses' => 'BeneficiarioController@findNombrePorRut'
    ]);
});
//>>>>>>> developer
