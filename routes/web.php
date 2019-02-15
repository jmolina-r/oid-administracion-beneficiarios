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
Route::get('update/{user}', 'Auth\UpdateController@showUpdateForm')->name('update');
Route::post('update/{user}', 'Auth\UpdateController@update');

Route::get('/find', 'Auth\FindController@showSearch')->name('find');
Route::get('/users/{id}', 'Auth\FindController@userInfoJson');
Route::get('/users/{id}/roles', 'Auth\FindController@userInfoRolesJson');
Route::get('/users/{id}/funcionario', 'Auth\FindController@userInfoFuncionarioJson');


Route::get('/construcción', [
    'uses' => 'ReportabilidadController@index',
    'as' => 'reportabilidad.menuReportabilidad'
])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ayuda', 'AyudaController@index')->name('ayuda');

Route::group(['prefix' => 'areasocial', 'middleware' => 'auth'], function(){
    Route::get('/asistentesocial', [
    'uses' => 'FichaSocialController@index',
    'as' => 'social.asistenteSocialGet'
    ])->middleware('roles:admin|trabajo_social');

    Route::post('/asistentesocial/beneficiario', [
    'uses' => 'FichaSocialController@store',
    'as' => 'social.asistenteSocialBeneficiar   io'
    ])->middleware('roles:admin|trabajo_social');

    Route::get('/asistentesocial/ingresar/{id}', [
    'uses' => 'FichaSocialController@show',
    'as' => 'social.asistenteSocial'
    ])->middleware('roles:admin|trabajo_social');


    Route::post('/asistentesocial/menu',[
    'uses' => 'FichaSocialController@post',
    'as' => 'social.asistentesocial'
    ])->middleware('roles:admin|trabajo_social');

    Route::get('/asistentesocial/showAyuda/{id}', [
    'uses' => 'FichaSocialController@showFicha',
    'as' => 'social.showAyuda'
    ])->middleware('roles:secretaria|admin|trabajo_social');

    Route::get('/asistentesocial/showVisita/{id}', [
    'uses' => 'FichaSocialController@showFicha',
    'as' => 'social.showVisita'
    ])->middleware('roles:secretaria|admin|trabajo_social');

    Route::get('/asistentesocial/showBecas/{id}', [
    'uses' => 'FichaSocialController@showFicha',
    'as' => 'social.showBecas'
    ])->middleware('roles:secretaria|admin|trabajo_social');

    Route::get('/asistentesocial/showOrientacion/{id}', [
    'uses' => 'FichaSocialController@showFicha',
    'as' => 'social.showOrientacion'
    ])->middleware('roles:secretaria|admin|trabajo_social');

    Route::get('/asistentesocial/showFichas/{id}', [
    'uses' => 'FichaSocialController@showFichas',
    'as' => 'social.showFichas'
    ])->middleware('roles:secretaria|admin|trabajo_social');
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
            ])->middleware('roles:admin|kinesiologia');

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

            Route::post('/postFono', [
                'uses' => 'FichaFonoaudiologiaController@postFono',
                'as' => 'area-medica.ficha-evaluacion-inicial.fonoaudiologia.postFono'
            ])->middleware('roles:admin|fonoaudiologia');

            Route::get('/show/{id}', [
                'uses' => 'FichaFonoaudiologiaController@show',
                'as' => 'area-medica.ficha-evaluacion-inicial.fonoaudiologia.show'
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


            Route::get('/show/{id}', [
                'uses' => 'FichaTerapiaOcupacionalController@show',
                'as' => 'area-medica.ficha-evaluacion-inicial.terapia-ocupacional.show'
            ])->middleware('roles:admin|terapia_ocupacional');
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
            ])->middleware('roles:admin|psicologia');
        });

        Route::group(['prefix' => '/fichas'], function (){

            Route::get('/listaFichas/{id}', [
                'uses' => 'FichasController@listaFichas',
                'as' => 'area-medica.ficha-evaluacion-inicial.fichas.listaFichas'
            ])->middleware('roles:admin|psicologia|terapia_ocupacional|fonoaudiologia|kinesiologia');
        });
    });

    Route::group(['prefix' => '/informe-cierre'], function (){

        Route::get('/create/{idFuncionario}/{idBeneficiario}/{idFicha}', [
            'uses' => 'InformeCierreController@create',
            'as' => 'area-medica.informe-cierre.create'
        ])->middleware('roles:admin|psicologia|terapia_ocupacional|fonoaudiologia|kinesiologia');

        Route::post('/store',[
            'uses' => 'InformeCierreController@store',
            'as' => 'area-medica.informe-cierre.store'
        ])->middleware('roles:admin|psicologia|terapia_ocupacional|fonoaudiologia|kinesiologia');

        Route::get('/show/{idFuncionario}/{idBeneficiario}/{idFicha}', [
            'uses' => 'InformeCierreController@show',
            'as' => 'area-medica.informe-cierre.show'
        ])->middleware('roles:admin|psicologia|terapia_ocupacional|fonoaudiologia|kinesiologia');
    });
});



Route::group(['prefix' => 'beneficiario', 'middleware' => 'auth'], function () {
    Route::get('/registrar', [
        'uses' => 'BeneficiarioController@create',
        'as' => 'beneficiario.create',
    ])->middleware('roles:admin');

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
    ])->middleware('roles:admin|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    // El buscador de beneficiarios no tiene restriccion de roles
    Route::get('/buscar', [
        'uses' => 'BeneficiarioController@find',
        'as' => 'beneficiario.find'
    ])->middleware('roles:admin|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/buscar-json', [
        'uses' => 'BeneficiarioController@findLikeNombreApellidoRutJson',
        'as' => 'beneficiario.findLikeNombreApellidoRutJson'
    ])->middleware('roles:admin|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/pdf/{id}', [
        'uses' => 'BeneficiarioController@generatePDF',
        'as' => 'beneficiario.generatePDF'
    ])->middleware('roles:admin|secretaria');

    Route::get('/listaEspera/show', [
        'uses' => 'BeneficiarioController@listaEspera',
        'as' => 'beneficiario.listaEspera'
    ])->middleware('roles:admin|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');
});

Route::group(['prefix' => 'reportabilidad', 'middleware' => 'auth'], function(){
    Route::get('/createFichaPaciente', [
        'uses' => 'ReportabilidadController@show',
        'as' => 'reportabilidad.createFichaPaciente'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/showEstadistica', [
        'uses' => 'ReportabilidadController@showResults',
        'as' => 'reportabilidad.showEstadistica'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/menu', [
        'uses' => 'ReportabilidadController@index',
        'as' => 'reportabilidad.menuReportabilidad'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reporteGeneralOID.pdf', [
        'uses' => 'PdfController@invoice',
        'as' => 'reportabilidad.reporteGeneral'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reporteKinesiologia.pdf', [
        'uses' => 'PdfController@invoice1',
        'as' => 'reportabilidad.reporteKine'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reportePsicologia.pdf', [
        'uses' => 'PdfController@invoice2',
        'as' => 'reportabilidad.reportePsico'

    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reporteFonoaudiologia.pdf', [
        'uses' => 'PdfController@invoiceFono',
        'as' => 'reportabilidad.reporteFono'

    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reporteTerapOcupacional.pdf', [
        'uses' => 'PdfController@invoice3',
        'as' => 'reportabilidad.reporteTer'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reporteSocial.pdf', [
        'uses' => 'PdfController@invoice4',
        'as' => 'reportabilidad.reporteSoc'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reporteGrupal.pdf', [
        'uses' => 'PdfController@invoice5',
        'as' => 'reportabilidad.reporteGru'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reporteHistorico.pdf', [
        'uses' => 'PdfController@invoiceHistoricReport',
        'as' => 'reportabilidad.reporteHist'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/menu', [
        'uses' => 'ReportabilidadController@index',
        'as' => 'reportabilidad.menuReportabilidad'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/profesional',[
        'uses'=>'ReportabilidadController@porProfesional',
        'as' => 'reportabilidad.reportabilidadPorProfesional'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reportabilidadGeneral',[
        'uses'=>'ReportabilidadController@showResults',
        'as' => 'reportabilidad.reportabilidadGene'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reportabilidadKinesiologia',[
        'uses'=>'ReportabilidadController@showResultKine',
        'as' => 'reportabilidad.reportabilidadKine'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reportabilidadPsicologia',[
        'uses'=>'ReportabilidadController@showResultPsico',
        'as' => 'reportabilidad.reportabilidadPsico'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reportabilidadTerapiaOcupacional',[
        'uses'=>'ReportabilidadController@showResultTer',
        'as' => 'reportabilidad.reportabilidadTer'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reportabilidadFonoaudilogia',[
        'uses'=>'ReportabilidadController@showResultFono',
        'as' => 'reportabilidad.reportabilidadFono'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reportabilidadAtencionSocial',[
        'uses'=>'ReportabilidadController@showResultSoc',
        'as' => 'reportabilidad.reportabilidadSoc'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reportabilidadGrupal',[

    'uses'=>'ReportabilidadController@showResultGrupal',
    'as' => 'reportabilidad.reportabilidadGru'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reportabilidadHistorica',[
    'uses'=>'ReportabilidadController@showResultHistorica',
    'as' => 'reportabilidad.reportabilidadHistorica'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reportabilidadHistoricaEntreMes',[
    'uses'=>'ReportabilidadController@showResultHistoricaEntreMes',
    'as' => 'reportabilidad.reportabilidadHistEntreMes'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reportabilidadGene',[
        'uses'=>'ReportabilidadController@showResults',
        'as' => 'reportabilidad.reporteGene'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reportabilidadKine',[
        'uses'=>'ReportabilidadController@showResultKine',
        'as' => 'reportabilidad.reporteKine'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reportabilidadPsico',[
        'uses'=>'ReportabilidadController@showResultPsico',
        'as' => 'reportabilidad.reportePsico'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reportabilidadTer',[
        'uses'=>'ReportabilidadController@showResultTer',
        'as' => 'reportabilidad.reporteTer'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reportabilidadFono',[
        'uses'=>'ReportabilidadController@showResultFono',
        'as' => 'reportabilidad.reporteFono'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reportabilidadSoc',[
        'uses'=>'ReportabilidadController@showResultSoc',
        'as' => 'reportabilidad.reporteSoc'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reportabilidadHist',[
        'uses'=>'ReportabilidadController@showResultHistorica',
        'as' => 'reportabilidad.reporteHistorica'

    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');

    Route::get('/reportabilidadHistoricaEntreMeses',[
        'uses'=>'ReportabilidadController@showResultHistoricaEntreMes',
        'as' => 'reportabilidad.reporteHistEntreMes'
    ])->middleware('roles:admin|jefatura|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional|trabajo_social');
});

Route::group(['prefix' => '/malla', 'middleware' => 'auth'], function (){
    Route::get('/show', [
        'uses' => 'MallaController@show',
        'as' => 'malla.show'
    ])->middleware('roles:admin|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');

    Route::get('/show2', [
        'uses' => 'MallaController@show2',
        'as' => 'malla.show2'
    ])->middleware('roles:admin|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');

    Route::get('/show2/{id}', [
        'uses' => 'MallaController@showMalla',
        'as' => 'malla.showMalla'
    ])->middleware('roles:admin|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');

    Route::get('/edit/{id}', [
        'uses' => 'MallaController@edit',
        'as' => 'malla.editAgendaHora'
    ])->middleware('roles:admin|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');

    Route::post('/update', [
        'uses' => 'MallaController@update',
        'as' => 'malla.updateAgendarHora'
    ])->middleware('roles:admin|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');

    Route::get('/create/{id}/{fecha}/{hora}', [
        'uses' => 'MallaController@create',
        'as' => 'malla.CreateAgendarHora'
    ])->middleware('roles:admin|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');

    Route::post('/store', [
        'uses' => 'MallaController@store',
        'as' => 'malla.store'
    ])->middleware('roles:admin|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');



    Route::post('/destroy', [
        'uses' => 'MallaController@destroy',
    ])->middleware('roles:admin|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');

    Route::post('/validarusuario', [
        'uses' => 'MallaController@validarUsuario',
    ])->middleware('roles:admin|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');

    Route::post('/eliminarhora', [
        'uses' => 'MallaController@eliminarHora',
    ])->middleware('roles:admin|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');

    Route::post('/puedeatender', [
        'uses' => 'MallaController@puedeAtender',
    ])->middleware('roles:admin|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');


    Route::get('/poblar', [
        'uses' => 'MallaController@poblar',
    ])->middleware('roles:admin|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');

    Route::get('/getnombre', [
        'uses' => 'BeneficiarioController@findNombrePorRut'
    ])->middleware('roles:admin|secretaria|kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');

    Route::get('/listaPrestaciones', [
        'uses' => 'MallaController@listaPrestaciones',
        'as' => 'malla.listaPrestaciones'
    ])->middleware('roles:admin|jefatura');

    Route::get('/crearPrestacion', [
        'uses' => 'MallaController@crearPrestacion',
        'as' => 'malla.crearPrestacion'
    ])->middleware('roles:admin|jefatura');

    Route::post('/guardarPrestacion', [
        'uses' => 'MallaController@guardarPrestacion',
        'as' => 'malla.guardarPrestacion'
    ])->middleware('roles:admin|jefatura');

    Route::get('/confirmarEliminarPrestacion/{id}', [
        'uses' => 'MallaController@confirmarEliminarPrestacion',
        'as' => 'malla.confirmarEliminarPrestacion'
    ])->middleware('roles:admin|jefatura');

    Route::post('/eliminarPrestacion', [
        'uses' => 'MallaController@eliminarPrestacion',
        'as' => 'malla.eliminarPrestacion'
    ])->middleware('roles:admin|jefatura');
});


/*Route::group(['prefix' => 'informecierre', 'middleware' => 'auth'], function(){
    Route::get('/informe', [
        'uses' => 'InformeController@index',
        'as' => 'informe-cierre.informe'
    ]);
});*/

Route::group(['prefix' => '/registro_prestacion', 'middleware' => 'auth'], function (){
    Route::get('/{id}', [
        'uses' => 'MallaController@registroPrestacion',
        'as' => 'malla.showIngresoPrestacion'
    ])->middleware('roles:kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');

    Route::get('/inasistencia/{id}', [
        'uses' => 'MallaController@registroInasistencia',
        'as' => 'malla.showIngresoInasistencia'
    ])->middleware('roles:kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');

    Route::post('/storeinasistencia', [
        'uses' => 'MallaController@storeInasistencia'
    ])->middleware('roles:kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');

    Route::post('/getprestacionesprofesional', [
        'uses' => 'MallaController@getPrestacionesProfesional'
    ])->middleware('roles:kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');

    Route::post('/getnombrecompleto', [
        'uses' => 'MallaController@getNombreCompleto'
    ])->middleware('roles:kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');

    Route::post('/checkfichaactiva', [
        'uses' => 'MallaController@checkFicha'
    ])->middleware('roles:kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');

    Route::post('/getarea', [
        'uses' => 'MallaController@getArea'
    ])->middleware('roles:kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');

    Route::post('/storeprestaciones', [
        'uses' => 'MallaController@storePrestaciones'
    ])->middleware('roles:kinesiologia|psicologia|fonoaudiologia|terapia_ocupacional');
});

Route::group(['prefix' => 'funcionario', 'middleware' => 'auth'], function () {
    Route::get('/registrar', [
        'uses' => 'FuncionarioController@create',
        'as' => 'funcionario.create',
    ])->middleware('roles:admin|coordinador_oficina');

    Route::post('/registrar', [
        'uses' => 'FuncionarioController@store',
        'as' => 'funcionario.store'
    ])->middleware('roles:admin|coordinador_oficina');

    Route::get('/editar/{funcionario}', [
        'uses' => 'FuncionarioController@edit',
        'as' => 'funcionario.edit'
    ])->middleware('roles:admin|coordinador_oficina');

    Route::post('/editar/{funcionario}', [
        'uses' => 'FuncionarioController@update',
        'as' => 'funcionario.update'
    ])->middleware('roles:admin|coordinador_oficina');

    Route::get('/informacion/{id}', [
        'uses' => 'FuncionarioController@show',
        'as' => 'funcionario.show'
    ])->middleware('roles:admin|coordinador_oficina');

    Route::get('/buscar', [
        'uses' => 'FuncionarioController@find',
        'as' => 'funcionario.find'
    ])->middleware('roles:admin|coordinador_oficina');

    Route::get('/{id}', [
        'uses' => 'FuncionarioController@funcionarioInfoJson',
        'as' => 'funcionario.funcionarioInfoJson'
    ])->middleware('roles:admin|coordinador_oficina');

});
