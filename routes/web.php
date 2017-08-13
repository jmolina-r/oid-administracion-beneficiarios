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


// Registration Routes...
Route::get('update/{id}', 'Auth\UpdateController@showUpdateForm')->name('update');
Route::post('update/{id}', 'Auth\UpdateController@update');

// Registration Routes...
Route::get('/find', 'Auth\FindController@showSearch')->name('find');
Route::get('/users/{id}', 'Auth\FindController@userInfoJson');
Route::get('/users/{id}/roles', 'Auth\FindController@userInfoRolesJson');




Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'areasocial', 'middleware' => 'auth'], function(){
    Route::get('/asistentesocial', [
    'uses' => 'FichaSocialController@index',
    'as' => 'social.asistenteSocialGet'
    ])->middleware('roles:admin|trabajo_social');

    Route::post('/asistentesocial/beneficiario', [
    'uses' => 'FichaSocialController@store',
    'as' => 'social.asistenteSocialBeneficiario'
    ])->middleware('roles:admin|trabajo_social');

    Route::get('/asistentesocial/menu', [
    'uses' => 'FichaSocialController@show',
    'as' => 'social.asistenteSocial'
    ])->middleware('roles:admin|trabajo_social');


    Route::post('/asistentesocial/menu',[
    'uses' => 'FichaSocialController@post',
    'as' => 'social.asistentesocial'
    ])->middleware('roles:admin|trabajo_social');
});

Route::group(['prefix' => '/area-medica', 'middleware' => 'auth'], function (){

    Route::group(['prefix' => '/ficha-evaluacion-inicial'], function (){

        Route::group(['prefix' => '/kinesiologia'], function (){

            Route::get('/create/{id}', [
                'uses' => 'FichaKinesiologiaController@create',
                'as' => 'area-medica.ficha-evaluacion-inicial.kinesiologia.create'
            ])->middleware('roles:admin|kinesiologia');

            Route::get('/show/{id}', [
                'uses' => 'FichaKinesiologiaController@show',
                'as' => 'area-medica.ficha-evaluacion-inicial.kinesiologia.show'
            ])->middleware('roles:secretaria|admin');

            Route::post('/store', [
                'uses' => 'FichaKinesiologiaController@store',
                'as' => 'area-medica.ficha-evaluacion-inicial.kinesiologia.store'
            ])->middleware('roles:admin|kinesiologia');
        });

        Route::group(['prefix' => '/fonoaudiologia'], function (){

            Route::get('/create/{id}', [
                'uses' => 'FichaFonoaudiologiaController@create',
                'as' => 'area-medica.ficha-evaluacion-inicial.fonoaudiologia.create'
            ])->middleware('roles:admin|fonoaudiologia');

            Route::post('/postfono', [
                'uses' => 'FichaFonoaudiologiaController@postFono',
                'as' => 'area-medica.ficha-evaluacion-inicial.fonoaudiologia.postfono'
            ])->middleware('roles:admin|fonoaudiologia');

            Route::post('/agregarpariente', [
                'uses' => 'FichaFonoaudiologiaController@postAgregarPariente',
                'as' => 'area-medica.ficha-evaluacion-inicial.fonoaudiologia.agregarpariente'
            ])->middleware('roles:admin|fonoaudiologia');

        });

        Route::group(['prefix' => '/terapia-ocupacional'], function (){

            Route::get('/ingresar/{id}', [
                'uses' => 'FichaTerapiaOcupacionalController@getIngresar',
                'as' => 'area-medica.ficha-evaluacion-inicial.terapia-ocupacional.ingresar'
            ])->middleware('roles:admin|terapia_ocupacional');

            Route::post('/ingresar', [
                'uses' => 'FichaTerapiaOcupacionalController@postIngresar',
                'as' => 'area-medica.ficha-evaluacion-inicial.terapia-ocupacional.ingresando'
            ]);

            //creo q esto esta de mas, era parte de un conflicto de merge
            Route::get('/mostrar-lista', [
                'uses' => 'FichaTerapiaOcupacionalController@getMostrarLista',
                'as' => 'area-medica.ficha-evaluacion-inicial.terapia-ocupacional.mostrar-lista'
            ])->middleware('roles:admin|terapia_ocupacional');

            Route::get('/show/{id}', [
                'uses' => 'FichaTerapiaOcupacionalController@show',
                'as' => 'area-medica.ficha-evaluacion-inicial.terapia-ocupacional.show'
            ])->middleware('roles:secretaria|admin');
        });

        Route::group(['prefix' => '/psicologia'], function (){

            Route::get('/create/{id}', [
                'uses' => 'FichaPsicologiaController@create',
                'as' => 'area-medica.ficha-evaluacion-inicial.psicologia.create'
            ])->middleware('roles:admin|psicologia');

            Route::post('/store', [
                'uses' => 'FichaPsicologiaController@store',
                'as' => 'area-medica.ficha-evaluacion-inicial.psicologia.store'
            ])->middleware('roles:admin|psicologia');

            Route::get('/show/{id}', [
                'uses' => 'FichaPsicologiaController@show',
                'as' => 'area-medica.ficha-evaluacion-inicial.psicologia.show'
            ])->middleware('roles:secretaria|admin');
        });
    });

    Route::group(['prefix' => '/informe-cierre'], function (){

        Route::get('/buscarUser', [
            'uses' => 'ReportabilidadController@createInformeCierre',
            'as' => 'area-medica.informe-cierre.buscarUser'
        ]);

        Route::get('/createInformeCierre', [
            'uses' => 'ReportabilidadController@showUser',
            'as' => 'area-medica.informe-cierre.createInformeCierre'
        ]);

        Route::post('/createInformeCierre',[
            'uses' => 'ReportabilidadController@postInformeCierre',
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
    ])->middleware('roles:admin|secretaria');

    Route::get('/informacion/{id}', [
        'uses' => 'BeneficiarioController@show',
        'as' => 'beneficiario.show'
    ])->middleware('roles:admin|secretaria');

    // El buscador de beneficiarios no tiene restriccion de roles
    Route::get('/buscar', [
        'uses' => 'BeneficiarioController@find',
        'as' => 'beneficiario.find'
    ])->middleware('roles:admin|secretaria');

    Route::get('/buscar-json', [
        'uses' => 'BeneficiarioController@findLikeNombreApellidoRutJson',
        'as' => 'beneficiario.findLikeNombreApellidoRutJson'
    ])->middleware('roles:admin|secretaria');

    Route::get('/pdf/{id}', [
        'uses' => 'BeneficiarioController@generatePDF',
        'as' => 'beneficiario.generatePDF'
    ]);
});

Route::group(['prefix' => 'reportabilidad', 'middleware' => 'auth'], function(){
    Route::get('/createFichaPaciente', [
        'uses' => 'ReportabilidadController@show',
        'as' => 'reportabilidad.createFichaPaciente'
    ])->middleware('roles:admin|jefatura');;

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

    Route::get('/reporteHistorico.pdf', [
        'uses' => 'PdfController@invoiceHistoricReport',
        'as' => 'reportabilidad.reporteHist'
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

    Route::get('/reportabilidadHistorica',[
    'uses'=>'ReportabilidadController@showResultHistorica',
    'as' => 'reportabilidad.reportabilidadHistorica'
    ]);


});

Route::group(['prefix' => '/malla', 'middleware' => 'auth'], function (){
    Route::get('/show', [
        'uses' => 'MallaController@show',
        'as' => 'malla.show'
    ]);;

    Route::post('/store', [
        'uses' => 'MallaController@store',
        'as' => 'malla.store'
    ]);;

    Route::get('/poblar', [
        'uses' => 'MallaController@poblar',
    ]);

    Route::get('/getnombre', [
        'uses' => 'BeneficiarioController@findNombrePorRut'
    ]);

    Route::get('/listaPrestaciones', [
        'uses' => 'MallaController@listaPrestaciones',
        'as' => 'malla.listaPrestaciones'
    ]);

    Route::get('/crearPrestacion', [
        'uses' => 'MallaController@crearPrestacion',
        'as' => 'malla.crearPrestacion'
    ]);

    Route::post('/guardarPrestacion', [
        'uses' => 'MallaController@guardarPrestacion',
        'as' => 'malla.guardarPrestacion'
    ]);;

    Route::get('/confirmarEliminarPrestacion/{id}', [
        'uses' => 'MallaController@confirmarEliminarPrestacion',
        'as' => 'malla.confirmarEliminarPrestacion'
    ]);;

    Route::post('/eliminarPrestacion', [
        'uses' => 'MallaController@eliminarPrestacion',
        'as' => 'malla.eliminarPrestacion'
    ]);;
});


Route::group(['prefix' => 'informecierre', 'middleware' => 'auth'], function(){
    Route::get('/informe', [
        'uses' => 'InformeController@index',
        'as' => 'informe-cierre.informe'
    ]);
});

Route::group(['prefix' => '/registro_prestacion', 'middleware' => 'auth'], function (){
    Route::get('/{id}', [
        'uses' => 'MallaController@registroPrestacion',
        'as' => 'malla.showIngresoPrestacion'
    ]);

    Route::post('/getprestacionesprofesional', [
        'uses' => 'MallaController@getPrestacionesProfesional'
    ]);

    Route::post('/getnombrecompleto', [
        'uses' => 'MallaController@getNombreCompleto'
    ]);

    Route::post('/getarea', [
        'uses' => 'MallaController@getArea'
    ]);

    Route::post('/storeprestaciones', [
        'uses' => 'MallaController@storePrestaciones'
    ]);
});

Route::group(['prefix' => 'funcionario', 'middleware' => 'auth'], function () {
    Route::get('/registrar', [
        'uses' => 'FuncionarioController@create',
        'as' => 'funcionario.create',
    ])->middleware('roles:admin|secretaria');

    Route::post('/registrar', [
        'uses' => 'FuncionarioController@store',
        'as' => 'funcionario.store'
    ])->middleware('roles:admin|secretaria');

    Route::get('/editar/{id}', [
        'uses' => 'FuncionarioController@edit',
        'as' => 'funcionario.edit'
    ])->middleware('roles:admin|secretaria');

    Route::post('/editar', [
        'uses' => 'FuncionarioController@update',
        'as' => 'funcionario.update'
    ])->middleware('roles:admin|secretaria');

    Route::get('/informacion/{id}', [
        'uses' => 'FuncionarioController@show',
        'as' => 'funcionario.show'
    ])->middleware('roles:admin|secretaria');

    Route::get('/buscar', [
        'uses' => 'FuncionarioController@find',
        'as' => 'funcionario.find'
    ])->middleware('roles:admin|secretaria');

    Route::get('/{id}', [
        'uses' => 'FuncionarioController@funcionarioInfoJson',
        'as' => 'funcionario.funcionarioInfoJson'
    ])->middleware('roles:admin|secretaria');

    // Route::get('/pdf/{id}', [
    //     'uses' => 'FuncionarioController@generatePDF',
    //     'as' => 'funcionario.generatePDF'
    // ]);
});
