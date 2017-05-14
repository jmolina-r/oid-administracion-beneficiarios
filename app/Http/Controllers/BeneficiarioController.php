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
use App\TipoDiscapacidad;
use App\Prevision;



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

        $tipo_discapacidades = TipoDiscapacidad::get();

        $previsiones = Prevision::get();


        return view('beneficiario.create')
            ->with(compact('paises'))
            ->with(compact('estados_civiles'))
            ->with(compact('previsiones'))
            ->with(compact('situaciones'))
            ->with(compact('niveles_educacion'))
            ->with(compact('dependencias'))
            ->with(compact('fonasa'))
            ->with(compact('tipo_discapacidades'))
            ->with(compact('isapre'))
            ->with(compact('previsiones'))
            ;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $fechaNacimiento = date('Y-m-d', strtotime(str_replace('/', '-', $request->input('fecha_nacimiento'))));
        // 0, 1, or 2. 0 inexistence, 1 exists, 2 waiting.
        $this->validate($request, [
            'nombres' => 'required|max:200',
            'apellidos' => 'required|max:200',
            'rut' => 'required|unique:beneficiarios',
            'fecha_nacimiento' => 'required|date_format:"d/m/Y"|before:"today"',
            'nombre_tutor' => 'required',
            'apellido_tutor' => 'required',
            'telefono_tutor' => 'required_with:nombre_tutor',
            'ocupacion' => 'required|exists:ocupacions,id',
            'educacion' => 'required|exists:educacions,id',
            'tel_fijo' => 'nullable|numeric',
            'tel_movil' => 'nullable|numeric',
            'email' => 'nullable|email',
            'credencial_discapacidad' => 'required|numeric|between:0,2',
            'credencial_vencimiento' => 'required_if:credencial_discapacidad,1',
            'registro_social_hogares' => 'required|numeric|between:0,2',
            'registro_social_porcentaje' => 'required_if:registro_social_hogares,1',
            'domicilio_calle' => 'nullable|max:200',
            'domicilio_numero' => 'required_with:domicilio_calle|numeric',
            'domicilio_numero_dpto' => 'nullable',
            'sexo' => 'required|in:masculino,femenino',
            'sistema_salud' => 'required|in:fonasa,isapre',
            'fonasa' => 'required_if:sistema_salud,fonasa',
            'isapre' => 'required_if:sistema_salud,isapre'
        ]);


        $beneficiario = new Beneficiario([
            'nombre' => $request->input('nombres'),
            'apellido' => $request->input('apellidos'),
            'fecha_nacimiento' => $fechaNacimiento,
            'sexo' => $request->input('sexo'),
            'rut' => $request->input('rut'),
            'pais_id' => $request->input('id_pais'),
            'estado_civil_id' => $request->input('estado_civil'),
            'educacion_id' => $request->input('educacion'),
            'ocupacion_id' => $request->input('ocupacion')
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

        //return view('beneficiario.show')->with('id', '1');
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
        $beneficiario = Beneficiario::where('id',$id)->first();
        $pais = $beneficiario->pais;

        return view('beneficiario.show',compact('beneficiario'))
            ->with(compact('pais'));
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
