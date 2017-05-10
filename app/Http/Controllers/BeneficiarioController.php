<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use App\FichaDiscapacidad;
use App\Fonasa;
use App\Isapre;
use App\Pais;
use App\Educacion;
use App\EstadoCivil;
use App\Ocupacion;
use App\OrganizacionSocial;
use App\RegistroSocialHogar;
use App\SistemaProteccion;
use App\Telefono;
use App\Tutor;
use App\FichaBenefeciario;
use App\TipoDependencia;



use Illuminate\Http\Request;

class BeneficiarioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        /**
         * Estas son las clecciones vacias de prueba
         * Son las que se deben enviar al fronend a partir de los datos
         * almacenados en la BD
         */

        //Lista de Paises
        $paises = Pais::get();

        //Lista de Estados Civiles
        $estados_civiles = EstadoCivil::get();

        //Situacin actual, cesante, estudiante, etc...
        $situaciones = Ocupacion::get();

        //Niveles de educacion, basico, universitario, etc...
        $niveles_educacion = Educacion::get();

        //Dependencias del paciente
        $dependencias = TipoDependencia::get();

        $fonasa = Fonasa::get();

        $isapre = Isapre::get();


        return view('beneficiario.create')
            ->with(compact('paises'))
            ->with(compact('estados_civiles'))
            ->with(compact('previsiones'))
            ->with(compact('situaciones'))
            ->with(compact('niveles_educacion'))
            ->with(compact('dependencias'))
            ->with(compact('fonasa'))
            ->with(compact('isapre'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $beneficiario = new Beneficiario([
            'nombre' => $request->input('nombres'),
            'apellido' => $request->input('apellidos'),
            'rut' => $request->input('rut'),
            'sexo' => $request->input('sexo'),
            'pais_id' => $request->input('id_pais'),

            'educacion_id' => $request->input('nivel_educacion'),
            
        ]);
        $beneficiario->save();


        $domicilioCalle = $request->input('domicilio_calle');
        $domicilioNumero = $request->input('domicilio_numero');
        $domicilioDepto = $request->input('domicilio_depto');
        $domicilioPoblacion = $request->input('domicilio_poblacion');
        $telefonoFijo = $request->input('tel_fijo');
        $telefonoMovil = $request->input('tel_movil');
        $email = $request->input('email');
        $credencialDiscapacidad = $request->input('credencial_discapacidad');
        $credencialVencimiento = $request->input('credencial_vencimiento');
        $registroSocialHogares = $request->input('registro_social_hogares');
        $registroSocialPorcentaje = $request->input('registro_social_porcentaje');
        $tutorNombre = $request->input('tutor_nombre');
        $tutorApellido = $request->input('tutor_apellido');
        $tutorFono = $request->input('tutor_fono');

        $sistema = $request->input('sistema');
        $sistemaSalud = $request->input('sistema_salud');
        $tipoPrevision = $request->input('prevision_radio');
        $prevision = $request->input('prevision');

        $sistemaProteccion = $request->input('sistema_proteccion');
        $organizacionSocial = $request->input('organizacion_social');

        $discapacidadVisualPorcentaje = $request->input('discapacidad_visual_porcentaje');
        $discapacidadCogniticaPorcentaje = $request->input('discapacidad_cognitiva_porcentaje');
        $discapacidadPsiquicaPorcentaje = $request->input('discapacidad_psiquica_porcentaje');
        $discapacidadSensVisualPorcentaje = $request->input('discapacidad_sens_visual_porcentaje');
        $discapacidadSensAuditivaPorcentaje = $request->input('discapacidad_sens_auditiva_porcentaje');
        $diacapacidadSocialPorcentaje = $request->input('discapacidad_social_porcentaje');
        $diagnostico = $request->input('diagnostico');
        $tipoDependenciaId = $request->input('tipo_dependencia_id');
        $cuidados = $request->input('cuidados');
        $planDeRehabilitacionTratamientoControl= $request->input('p_reha_trat_ctrl');

        return view('beneficiario.show')->with('id', '1');
    }

    /**
    * Show the form for finding a resourse
    *
    * @return Response
    */
    public function find()
    {
        return view('beneficiario.find');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('beneficiario.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('beneficiario.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
