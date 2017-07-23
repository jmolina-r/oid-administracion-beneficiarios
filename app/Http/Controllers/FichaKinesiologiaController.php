<?php

namespace App\Http\Controllers;

use App\AntecedentesMorbidos;
use App\ValAutocuidado;
use App\ValComCog;
use App\ValControlEsfinter;
use App\ValEvaluacion;
use App\ValSocial;
use App\FichaKinesiologia;
use App\Kinesiologo;
use App\ValDeambulacion;
use App\ValMotora;
use App\ValMovilidad;
use App\ValSensorial;
use App\Beneficiario;

use Illuminate\Http\Request;

class FichaKinesiologiaController extends Controller
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
     * Mostrar formulario de ingreso de evaluacion inicial.
     *
     * @param $id
     * @return view
     */
    public function create($id)
    {
        return view('area-medica.ficha-evaluacion-inicial.kinesiologia.create')
            ->with(compact('id'));
    }

    /**
     * Guardar datos recibidos del formulario en bd.
     *
     * @param Request $request
     * @return view
     */
    public function store(Request $request)
    {

        // Validate Fields
        $this->validate($request, $this->rules($request));

        //obtener el kinesiologo por su sesion
        /*
        if (Auth::check())
        {
            $kinesiologo = Kinesiologo::where('rut', Auth::user()->rut);
        }
        */

        try{
            $antecedentesMorbidos = new AntecedentesMorbidos([
                'pat_concom' => $request->input('pat_concom'),
                'alergias' => $request->input('alergias'),
                'medicamentos' => $request->input('medicamentos'),
                'ant_quir' => $request->input('ant_quir'),
                'aparatos' => $request->input('aparatos'),
                'fuma_sn' => $request->input('fuma_sn'),
                'alcohol_sn' => $request->input('alcohol_sn'),
                'act_fisica_sn' => $request->input('act_fisica_sn'),
            ]);
            $antecedentesMorbidos->save();

            $valAutocuidado = new ValAutocuidado([
                'puntaje_alimentacion' => $request->input('puntaje_alimentacion'),
                'coment_alimentacion' => $request->input('coment_alimentacion'),
                'puntaje_arreglo_pers' => $request->input('puntaje_arreglo_pers'),
                'coment_arreglo_pers' => $request->input('coment_arreglo_pers'),
                'puntaje_bano' => $request->input('puntaje_bano'),
                'coment_bano' => $request->input('coment_bano'),
                'puntaje_vest_sup' => $request->input('puntaje_vest_sup'),
                'coment_vest_sup' => $request->input('coment_vest_sup'),
                'puntaje_vest_inf' => $request->input('puntaje_vest_inf'),
                'coment_vest_inf' => $request->input('coment_vest_inf'),
                'puntaje_aseo_pers' => $request->input('puntaje_aseo_pers'),
                'coment_aseo_pers' =>$request->input('coment_aseo_pers'),
            ]);
            $valAutocuidado->save();

            $valComCog = new ValComCog([
                'puntae_expresion' => $request->input('puntaje_expresion'),
                'coment_expresion' => $request->input('coment_expresion'),
                'puntaje_comprension' => $request->input('puntaje_comprension'),
                'coment_comprension' => $request->input('coment_comprension'),
            ]);
            $valComCog->save();

            $valControlEsfinter = new ValControlEsfinter([
                'puntaje_control_vejiga' => $request->input('puntaje_control_vejiga'),
                'coment_control_vejiga' => $request->input('coment_control_vejiga'),
                'puntaje_control_intestino' => $request->input('puntaje_control_intestino'),
                'coment_control_intestino' => $request->input('coment_control_intestino'),
            ]);
            $valControlEsfinter->save();

            $valDeambulacion = new ValDeambulacion([
                'puntaje_desp_caminando' => $request->input('puntaje_desp_caminando'),
                'coment_desp_caminando' => $request->input('coment_desp_caminando'),
                'puntae_escaleras' => $request->input('puntaje_escaleras'),
                'coment_escaleras' => $request->input('coment_escaleras'),
            ]);
            $valDeambulacion->save();

            $valEvaluacion = new ValEvaluacion([
                'conexion_medio' => $request->input('conexion_medio'),
                'nivel_cognitivo_apar' => $request->input('nivel_cognitivo_apar'),
            ]);
            $valEvaluacion->save();

            $valMotora = new ValMotora([
                'rom' => $request->input('rom'),
                'fm' => $request->input('fm'),
                'tono' => $request->input('tono'),
                'dolor' => $request->input('dolor'),
                'hab_motrices' => $request->input('hab_motrices'),
                'equilibrio' => $request->input('equilibrio'),
                'coordinacion' => $request->input('coordinacion'),
            ]);
            $valMotora->save();

            $valMovilidad = new ValMovilidad([
                'puntaje_trans_cama_silla' => $request->input('puntaje_trans_cama_silla'),
                'coment_trans_cama_silla' => $request->input('coment_trans_cama_silla'),
                'puntaje_traslado_bano' => $request->input('puntaje_traslado_bano'),
                'coment_traslado_bano' => $request->input('coment_traslado_bano'),
                'puntaje_traslado_ducha' => $request->input('puntaje_traslado_ducha'),
                'coment_traslado_ducha' => $request->input('coment_traslado_ducha'),
            ]);
            $valMovilidad->save();

            $valSensorial = new ValSensorial([
                'visual' => $request->input('visual'),
                'auditivo' => $request->input('auditivo'),
                'tactil' => $request->input('tactil'),
                'propioceptivo' => $request->input('propioceptivo'),
                'vestibular' => $request->input('vestibular'),
            ]);
            $valSensorial->save();

            $valSocial = new ValSocial([
                'puntaje_int_social' => $request->input('puntaje_int_social'),
                'coment_int_social' => $request->input('coment_int_social'),
                'puntaje_sol_problemas' => $request->input('puntaje_sol_problemas'),
                'coment_sol_problemas' => $request->input('coment_sol_problemas'),
                'puntaje_memoria' => $request->input('puntaje_memoria'),
                'coment_memoria' => $request->input('coment_memoria'),
            ]);
            $valSocial->save();

            $fichaKinesiologia = new FichaKinesiologia([
                'motivo_consulta' => $request->input('motivo_consulta'),
                'situacion_laboral' => $request->input('situacion_laboral'),
                'situacion_familiar' => $request->input('situacion_familiar'),
                'asiste_centro_rhb' => $request->input('asiste_centro_rhb'),
                'antecedentes_morbidos_id' => $antecedentesMorbidos->id,
                'val_motora_id' => $valMotora->id,
                'val_deambulacion_id' => $valDeambulacion->id,
                'val_movilidad_id' => $valMovilidad->id,
                'val_social_id' => $valSocial->id,
                'val_autocuidado_id' => $valAutocuidado->id,
                'val_sensorial_id' => $valSensorial->id,
                'val_com_cog_id' => $valComCog->id,
                'val_evaluacion_id' => $valEvaluacion->id,
                'val_control_esfinter_id' => $valControlEsfinter->id,
                //'kinesiologo_id' => $kinesiologo->id,
                'kinesiologo_id' => '1', //provisional, kinesiologo no esta implementado
                'beneficiario_id' => $request->input('id'),
            ]);
            $fichaKinesiologia->save();
        }
        catch(Exception $e){

            //procedimiento en caso de reportar errores

        }
        $id = $request->input('id');
        return view('area-medica.ficha-evaluacion-inicial.kinesiologia.create')
            ->with(compact('id'));
    }

    /**
     * Show the form for finding a resourse
     *
     * @return Response
     */
    public function find()
    {
        //
    }

    /**
     * Mostrar formulario de ingreso de evaluacion inicial.
     *
     * @return Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
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

    private function rules(Request $request) {
        $rules = [
            'id' => 'required|exists:beneficiarios',
            'pat_concom' => 'required|max:200',
            'alergias' => 'required|max:200',
            'medicamentos' => 'required|max:200',
            'ant_quir' => 'required|max:200',
            'aparatos' => 'required|max:200',
            'fuma_sn' => 'required|max:200',
            'alcohol_sn' => 'required|max:200',
            'act_fisica_sn' => 'required|max:200',
            'puntaje_alimentacion' => 'required|numeric|between:0,10',
            'coment_alimentacion' => 'nullable|max:200',
            'puntaje_arreglo_pers' => 'required|numeric|between:0,10',
            'coment_arreglo_pers' => 'nullable|max:200',
            'puntaje_bano' => 'required|numeric|between:0,10',
            'coment_bano' => 'nullable|max:200',
            'puntaje_vest_sup' => 'required|numeric|between:0,10',
            'coment_vest_sup' => 'nullable|max:200',
            'puntaje_vest_inf' => 'required|numeric|between:0,10',
            'coment_vest_inf' => 'nullable|max:200',
            'puntaje_aseo_pers' => 'required|numeric|between:0,10',
            'coment_aseo_pers' => 'nullable|max:200',
            'puntaje_expresion' => 'required|numeric|between:0,10',
            'coment_expresion' => 'nullable|max:200',
            'puntaje_comprension' => 'required|numeric|between:0,10',
            'coment_comprension' => 'nullable|max:200',
            'puntaje_control_vejiga' => 'required|numeric|between:0,10',
            'coment_control_vejiga' => 'nullable|max:200',
            'puntaje_control_intestino' => 'required|numeric|between:0,10',
            'coment_control_intestino' => 'nullable|max:200',
            'puntaje_desp_caminando' => 'required|numeric|between:0,10',
            'coment_desp_caminando' => 'nullable|max:200',
            'puntaje_escaleras' => 'required|numeric|between:0,10',
            'coment_escaleras' => 'nullable|max:200',
            'conexion_medio' => 'required|max:200',
            'nivel_cognitivo_apar' => 'required|max:200',
            'rom' => 'required|max:200',
            'fm' => 'required|max:200',
            'tono' => 'required|max:200',
            'dolor' => 'required|max:200',
            'hab_motrices' => 'required|max:200',
            'equilibrio' => 'required|max:200',
            'coordinacion' => 'required|max:200',
            'puntaje_trans_cama_silla' => 'required|numeric|between:0,10',
            'coment_trans_cama_silla' => 'nullable|max:200',
            'puntaje_traslado_bano' => 'required|numeric|between:0,10',
            'coment_traslado_bano' => 'nullable|max:200',
            'puntaje_traslado_ducha' => 'required|numeric|between:0,10',
            'coment_traslado_ducha' => 'nullable|max:200',
            'visual' => 'required|max:200',
            'auditivo' => 'required|max:200',
            'tactil' => 'required|max:200',
            'propioceptivo' => 'required|max:200',
            'vestibular' => 'required|max:200',
            'puntaje_int_social' => 'required|numeric|between:0,10',
            'coment_int_social' => 'nullable|max:200',
            'puntaje_sol_problemas' => 'required|numeric|between:0,10',
            'coment_sol_problemas' => 'nullable|max:200',
            'puntaje_memoria' => 'required|numeric|between:0,10',
            'coment_memoria' => 'nullable|max:200',
            'motivo_consulta' => 'required|max:200',
            'situacion_laboral' => 'required|max:200',
            'situacion_familiar' => 'required|max:200',
            'asiste_centro_rhb' => 'required|max:200',
        ];
        return $rules;
    }
}
