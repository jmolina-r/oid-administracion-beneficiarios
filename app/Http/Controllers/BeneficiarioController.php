<?php

namespace App\Http\Controllers;

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
        $paises = collect();

        //Lista de Estados Civiles
        $estados_civiles = collect();

        //Situacin actual, cesante, estudiante, etc...
        $situaciones = collect();

        //Niveles de educacion, basico, universitario, etc...
        $niveles_educacion = collect();

        //Dependencias del paciente
        $dependencias = collect();


        return view('beneficiario.create')
        ->with(compact('paises'))
        ->with(compact('estados_civiles'))
        ->with(compact('previsiones'))
        ->with(compact('situaciones'))
        ->with(compact('niveles_educacion'))
        ->with(compact('dependencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($response, $request)
    {
        $nombre = $request->nombres;
        $apellido = $request->apellidos;
        $rut = $request->rut;
        $idPais = $request->id_pais;
        $fechaNacimiento = $request->fecha_nacimiento;
        $sexo = $request->sexo;
        $estadoCivil = $request->estado_civil_id;
        $domicilioCalle = $request->domicilio_calle;
        $domicilioNumero = $request->domicilio_numero;
        $domicilioDepto = $request->domicilio_depto;
        $domicilioPoblacion = $request->domicilio_poblacion;
        $telefonoFijo = $request->tel_fijo;
        $telefonoMovil = $request->tel_movil;
        $email = $request->email;
        $credencialDiscapacidad = $request->credencial_discapacidad;
        $credencialVencimiento = $request->credencial_vencimiento;
        $registroSocialHogares = $request->registro_social_hogares;
        $registroSocialPorcentaje = $request->registro_social_porcentaje;
        $tutorNombre = $request->tutor_nombre;
        $tutorApellido = $request->tutor_apellido;
        $tutorFono = $request->tutor_fono;

        $sistema = $request->sistema;
        $sistemaSalud = $request->sistema_salud;
        $tipoPrevision = $request->prevision_radio;
        $prevision = $request->prevision;
        $nivelEducacion = $request->nivel_educacion;
        $sistemaProteccion = $request->sistema_proteccion;
        $organizacionSocial = $request->organizacion_social;

        $discapacidadVisualPorcentaje = $request->discapacidad_visual_porcentaje;
        $discapacidadCogniticaPorcentaje = $request->discapacidad_cognitiva_porcentaje;
        $discapacidadPsiquicaPorcentaje = $request->discapacidad_psiquica_porcentaje;
        $discapacidadSensVisualPorcentaje = $request->discapacidad_sens_visual_porcentaje;
        $discapacidadSensAuditivaPorcentaje = $request->discapacidad_sens_auditiva_porcentaje;
        $diacapacidadSocialPorcentaje = $request->discapacidad_social_porcentaje;
        $diagnostico = $request->diagnostico;
        $tipoDependenciaId = $request->tipo_dependencia_id;
        $cuidados = $request->cuidados;
        $planDeRehabilitacionTratamientoControl= $request->p_reha_trat_ctrl;
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
