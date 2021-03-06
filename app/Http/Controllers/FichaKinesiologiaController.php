<?php

namespace App\Http\Controllers;

use App\AntecedentesMorbidos;
use App\ValAutocuidado;
use App\ValComCog;
use App\ValControlEsfinter;
use App\ValEvaluacion;
use App\ValSocial;
use App\FichaKinesiologia;
use App\Funcionario;
use App\ValDeambulacion;
use App\ValMotora;
use App\ValMovilidad;
use App\ValSensorial;
use App\Beneficiario;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $persona = Beneficiario::find($id);

        return view('area-medica.ficha-evaluacion-inicial.kinesiologia.create')
            ->with(compact('id'))
            ->with(compact('persona'));
    }

    /**
     * Guardar datos recibidos del formulario en bd.
     *
     * @param Request $request
     * @return view
     */
    public function store(Request $request)
    {
        $ultimaFicha = FichaKinesiologia::where('beneficiario_id', $request->input('id'))->orderBy('created_at', $direction = 'des')->first();

        if ($ultimaFicha != null) {
            if ($ultimaFicha->estado == 'abierto') {
                return view('area-medica.ficha-evaluacion-inicial.Error');
            }
        }

        // Validate Fields
        $this->validate($request, $this->rules($request));

        if (Auth::check()) {

            $idFuncionario = Auth::user()->funcionario_id;
            if ($idFuncionario == null) {
                return view('area-medica.ficha-evaluacion-inicial.Error');
            }
        }

        try {
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
                'coment_aseo_pers' => $request->input('coment_aseo_pers'),
            ]);
            $valAutocuidado->save();

            $valComCog = new ValComCog([
                'puntaje_expresion' => $request->input('puntaje_expresion'),
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
                'puntaje_escaleras' => $request->input('puntaje_escaleras'),
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
                'estado' => 'abierto',
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
                'funcionario_id' => $idFuncionario,
                'beneficiario_id' => $request->input('id'),
                'observaciones'=> $request->input('observaciones')
            ]);
            $fichaKinesiologia->save();
        } catch (Exception $e) {

            //procedimiento en caso de reportar errores
            return view('area-medica.ficha-evaluacion-inicial.Error');
        }
        return redirect(route('area-medica.ficha-evaluacion-inicial.fichas.listaFichas', $request->input('id')));
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
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $fichaKinesiologia = FichaKinesiologia::find($id);

        if ($fichaKinesiologia == null) {
            return view('area-medica.ficha-evaluacion-inicial.Error');
        }

        $persona = Beneficiario::find($fichaKinesiologia->beneficiario_id);
        $funcionario = Funcionario::find($fichaKinesiologia->funcionario_id);

        $valSocial = ValSocial::find($fichaKinesiologia->val_social_id);
        $valSensorial = ValSensorial::find($fichaKinesiologia->val_sensorial_id);
        $valMovilidad = ValMovilidad::find($fichaKinesiologia->val_movilidad_id);
        $valMotora = ValMotora::find($fichaKinesiologia->val_motora_id);
        $valEvaluacion = ValEvaluacion::find($fichaKinesiologia->val_evaluacion_id);
        $valDeambulacion = ValDeambulacion::find($fichaKinesiologia->val_deambulacion_id);
        $valControlEsfinter = ValControlEsfinter::find($fichaKinesiologia->val_control_esfinter_id);
        $valComCog = ValComCog::find($fichaKinesiologia->val_com_cog_id);
        $valAutocuidado = ValAutocuidado::find($fichaKinesiologia->val_autocuidado_id);
        $antecedentesMorbidos = AntecedentesMorbidos::find($fichaKinesiologia->antecedentes_morbidos_id);

        return view('area-medica.ficha-evaluacion-inicial.kinesiologia.show', compact('fichaKinesiologia'))
            ->with(compact('persona'))
            ->with(compact('valSocial'))
            ->with(compact('valSensorial'))
            ->with(compact('valMovilidad'))
            ->with(compact('valMotora'))
            ->with(compact('valEvaluacion'))
            ->with(compact('valDeambulacion'))
            ->with(compact('valControlEsfinter'))
            ->with(compact('valComCog'))
            ->with(compact('valAutocuidado'))
            ->with(compact('antecedentesMorbidos'))
            ->with(compact('funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $fichaId
     * @return Response
     */
    public function edit($fichaId)
    {
        $fichaKinesiologia = FichaKinesiologia::find($fichaId);

        if ($fichaKinesiologia == null) {
            return view('area-medica.ficha-evaluacion-inicial.Error');
        }


        //Validar que no se puedan editar fichas cerradas.
        if ($fichaKinesiologia != null) {
            if ($fichaKinesiologia->estado == 'cerrado') {
                return view('area-medica.ficha-evaluacion-inicial.Error');
            }
        }

        $persona = Beneficiario::find($fichaKinesiologia->beneficiario_id);
        $funcionario = Funcionario::find($fichaKinesiologia->funcionario_id);

        $valSocial = ValSocial::find($fichaKinesiologia->val_social_id);
        $valSensorial = ValSensorial::find($fichaKinesiologia->val_sensorial_id);
        $valMovilidad = ValMovilidad::find($fichaKinesiologia->val_movilidad_id);
        $valMotora = ValMotora::find($fichaKinesiologia->val_motora_id);
        $valEvaluacion = ValEvaluacion::find($fichaKinesiologia->val_evaluacion_id);
        $valDeambulacion = ValDeambulacion::find($fichaKinesiologia->val_deambulacion_id);
        $valControlEsfinter = ValControlEsfinter::find($fichaKinesiologia->val_control_esfinter_id);
        $valComCog = ValComCog::find($fichaKinesiologia->val_com_cog_id);
        $valAutocuidado = ValAutocuidado::find($fichaKinesiologia->val_autocuidado_id);
        $antecedentesMorbidos = AntecedentesMorbidos::find($fichaKinesiologia->antecedentes_morbidos_id);

        return view('area-medica.ficha-evaluacion-inicial.kinesiologia.edit')
            ->with(compact('fichaKinesiologia'))
            ->with(compact('persona'))
            ->with(compact('valSocial'))
            ->with(compact('valSensorial'))
            ->with(compact('valMovilidad'))
            ->with(compact('valMotora'))
            ->with(compact('valEvaluacion'))
            ->with(compact('valDeambulacion'))
            ->with(compact('valControlEsfinter'))
            ->with(compact('valComCog'))
            ->with(compact('valAutocuidado'))
            ->with(compact('antecedentesMorbidos'))
            ->with(compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $request
     * @return Response
     */
    public function update(Request $request)
    {

        // Validate Fields
        $this->validate($request, $this->rules($request));

        if (Auth::check()) {

            $idFuncionario = Auth::user()->funcionario_id;
            if ($idFuncionario == null) {
                return view('area-medica.ficha-evaluacion-inicial.Error');
            }
        }

        try {
            $fichaKinesiologia = FichaKinesiologia::find($request->input('fichaId'));
            $valSocial = ValSocial::find($fichaKinesiologia->val_social_id);
            $valSensorial = ValSensorial::find($fichaKinesiologia->val_sensorial_id);
            $valMovilidad = ValMovilidad::find($fichaKinesiologia->val_movilidad_id);
            $valMotora = ValMotora::find($fichaKinesiologia->val_motora_id);
            $valEvaluacion = ValEvaluacion::find($fichaKinesiologia->val_evaluacion_id);
            $valDeambulacion = ValDeambulacion::find($fichaKinesiologia->val_deambulacion_id);
            $valControlEsfinter = ValControlEsfinter::find($fichaKinesiologia->val_control_esfinter_id);
            $valComCog = ValComCog::find($fichaKinesiologia->val_com_cog_id);
            $valAutocuidado = ValAutocuidado::find($fichaKinesiologia->val_autocuidado_id);
            $antecedentesMorbidos = AntecedentesMorbidos::find($fichaKinesiologia->antecedentes_morbidos_id);

            $fichaKinesiologia->motivo_consulta = $request->input('motivo_consulta');
            $fichaKinesiologia->situacion_laboral = $request->input('situacion_laboral');
            $fichaKinesiologia->situacion_familiar = $request->input('situacion_familiar');
            $fichaKinesiologia->asiste_centro_rhb = $request->input('asiste_centro_rhb');
            $fichaKinesiologia->observaciones = $request->input('observaciones');
            $fichaKinesiologia->save();

            $antecedentesMorbidos->pat_concom = $request->input('pat_concom');
            $antecedentesMorbidos->alergias = $request->input('alergias');
            $antecedentesMorbidos->medicamentos = $request->input('medicamentos');
            $antecedentesMorbidos->ant_quir = $request->input('ant_quir');
            $antecedentesMorbidos->aparatos = $request->input('aparatos');
            $antecedentesMorbidos->fuma_sn = $request->input('fuma_sn');
            $antecedentesMorbidos->alcohol_sn = $request->input('alcohol_sn');
            $antecedentesMorbidos->act_fisica_sn = $request->input('act_fisica_sn');
            $antecedentesMorbidos->save();

            $valAutocuidado->puntaje_alimentacion = $request->input('puntaje_alimentacion');
            $valAutocuidado->coment_alimentacion = $request->input('coment_alimentacion');
            $valAutocuidado->puntaje_arreglo_pers = $request->input('puntaje_arreglo_pers');
            $valAutocuidado->coment_arreglo_pers = $request->input('coment_arreglo_pers');
            $valAutocuidado->puntaje_bano = $request->input('puntaje_bano');
            $valAutocuidado->coment_bano = $request->input('coment_bano');
            $valAutocuidado->puntaje_vest_sup = $request->input('puntaje_vest_sup');
            $valAutocuidado->coment_vest_sup = $request->input('coment_vest_sup');
            $valAutocuidado->puntaje_vest_inf = $request->input('puntaje_vest_inf');
            $valAutocuidado->coment_vest_inf = $request->input('coment_vest_inf');
            $valAutocuidado->puntaje_aseo_pers = $request->input('puntaje_aseo_pers');
            $valAutocuidado->coment_aseo_pers = $request->input('coment_aseo_pers');
            $valAutocuidado->save();

            $valComCog->puntaje_expresion = $request->input('puntaje_expresion');
            $valComCog->coment_expresion = $request->input('coment_expresion');
            $valComCog->puntaje_comprension = $request->input('puntaje_comprension');
            $valComCog->coment_comprension = $request->input('coment_comprension');
            $valComCog->save();

            $valControlEsfinter->puntaje_control_vejiga = $request->input('puntaje_control_vejiga');
            $valControlEsfinter->coment_control_vejiga = $request->input('coment_control_vejiga');
            $valControlEsfinter->puntaje_control_intestino = $request->input('puntaje_control_intestino');
            $valControlEsfinter->coment_control_intestino = $request->input('coment_control_intestino');
            $valControlEsfinter->save();

            $valDeambulacion->puntaje_desp_caminando = $request->input('puntaje_desp_caminando');
            $valDeambulacion->coment_desp_caminando = $request->input('coment_desp_caminando');
            $valDeambulacion->puntaje_escaleras = $request->input('puntaje_escaleras');
            $valDeambulacion->coment_escaleras = $request->input('coment_escaleras');
            $valDeambulacion->save();

            $valEvaluacion->conexion_medio = $request->input('conexion_medio');
            $valEvaluacion->nivel_cognitivo_apar = $request->input('nivel_cognitivo_apar');
            $valEvaluacion->save();

            $valMotora->rom = $request->input('rom');
            $valMotora->fm = $request->input('fm');
            $valMotora->tono = $request->input('tono');
            $valMotora->dolor = $request->input('dolor');
            $valMotora->hab_motrices = $request->input('hab_motrices');
            $valMotora->equilibrio = $request->input('equilibrio');
            $valMotora->coordinacion = $request->input('coordinacion');
            $valMotora->save();

            $valMovilidad->puntaje_trans_cama_silla = $request->input('puntaje_trans_cama_silla');
            $valMovilidad->coment_trans_cama_silla = $request->input('coment_trans_cama_silla');
            $valMovilidad->puntaje_traslado_bano = $request->input('puntaje_traslado_bano');
            $valMovilidad->coment_traslado_bano = $request->input('coment_traslado_bano');
            $valMovilidad->puntaje_traslado_ducha = $request->input('puntaje_traslado_ducha');
            $valMovilidad->coment_traslado_ducha = $request->input('coment_traslado_ducha');
            $valMovilidad->save();

            $valSensorial->visual = $request->input('visual');
            $valSensorial->auditivo = $request->input('auditivo');
            $valSensorial->tactil = $request->input('tactil');
            $valSensorial->propioceptivo = $request->input('propioceptivo');
            $valSensorial->vestibular = $request->input('vestibular');
            $valSensorial->save();

            $valSocial->puntaje_int_social = $request->input('puntaje_int_social');
            $valSocial->coment_int_social = $request->input('coment_int_social');
            $valSocial->puntaje_sol_problemas = $request->input('puntaje_sol_problemas');
            $valSocial->coment_sol_problemas = $request->input('coment_sol_problemas');
            $valSocial->puntaje_memoria = $request->input('puntaje_memoria');
            $valSocial->coment_memoria = $request->input('coment_memoria');
            $valSocial->save();

        } catch (Exception $e) {

            //procedimiento en caso de reportar errores
            return view('area-medica.ficha-evaluacion-inicial.Error');
        }
        return redirect(route('area-medica.ficha-evaluacion-inicial.fichas.listaFichas', $request->input('id')));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    private function rules(Request $request)
    {
        $rules = [
            'id' => 'required|exists:beneficiarios',
            'pat_concom' => 'nullable|max:200',
            'alergias' => 'nullable|max:200',
            'medicamentos' => 'nullable|max:200',
            'ant_quir' => 'nullable|max:200',
            'aparatos' => 'nullable|max:200',
            'fuma_sn' => 'nullable|max:200',
            'alcohol_sn' => 'nullable|max:200',
            'act_fisica_sn' => 'nullable|max:200',
            'puntaje_alimentacion' => 'nullable|numeric|between:1,7',
            'coment_alimentacion' => 'nullable|max:200',
            'puntaje_arreglo_pers' => 'nullable|numeric|between:1,7',
            'coment_arreglo_pers' => 'nullable|max:200',
            'puntaje_bano' => 'nullable|numeric|between:1,7',
            'coment_bano' => 'nullable|max:200',
            'puntaje_vest_sup' => 'nullable|numeric|between:1,7',
            'coment_vest_sup' => 'nullable|max:200',
            'puntaje_vest_inf' => 'nullable|numeric|between:1,7',
            'coment_vest_inf' => 'nullable|max:200',
            'puntaje_aseo_pers' => 'nullable|numeric|between:1,7',
            'coment_aseo_pers' => 'nullable|max:200',
            'puntaje_expresion' => 'nullable|numeric|between:1,7',
            'coment_expresion' => 'nullable|max:200',
            'puntaje_comprension' => 'nullable|numeric|between:1,7',
            'coment_comprension' => 'nullable|max:200',
            'puntaje_control_vejiga' => 'nullable|numeric|between:1,7',
            'coment_control_vejiga' => 'nullable|max:200',
            'puntaje_control_intestino' => 'nullable|numeric|between:1,7',
            'coment_control_intestino' => 'nullable|max:200',
            'puntaje_desp_caminando' => 'nullable|numeric|between:1,7',
            'coment_desp_caminando' => 'nullable|max:200',
            'puntaje_escaleras' => 'nullable|numeric|between:1,7',
            'coment_escaleras' => 'nullable|max:200',
            'conexion_medio' => 'nullable|max:200',
            'nivel_cognitivo_apar' => 'nullable|max:200',
            'rom' => 'nullable|max:200',
            'fm' => 'nullable|max:200',
            'tono' => 'nullable|max:200',
            'dolor' => 'nullable|max:200',
            'hab_motrices' => 'nullable|max:200',
            'equilibrio' => 'nullable|max:200',
            'coordinacion' => 'nullable|max:200',
            'puntaje_trans_cama_silla' => 'nullable|numeric|between:1,7',
            'coment_trans_cama_silla' => 'nullable|max:200',
            'puntaje_traslado_bano' => 'nullable|numeric|between:1,7',
            'coment_traslado_bano' => 'nullable|max:200',
            'puntaje_traslado_ducha' => 'nullable|numeric|between:1,7',
            'coment_traslado_ducha' => 'nullable|max:200',
            'visual' => 'nullable|max:200',
            'auditivo' => 'nullable|max:200',
            'tactil' => 'nullable|max:200',
            'propioceptivo' => 'nullable|max:200',
            'vestibular' => 'nullable|max:200',
            'puntaje_int_social' => 'nullable|numeric|between:1,7',
            'coment_int_social' => 'nullable|max:200',
            'puntaje_sol_problemas' => 'nullable|numeric|between:1,7',
            'coment_sol_problemas' => 'nullable|max:200',
            'puntaje_memoria' => 'nullable|numeric|between:1,7',
            'coment_memoria' => 'nullable|max:200',
            'motivo_consulta' => 'nullable|max:20000',
            'situacion_laboral' => 'nullable|max:200',
            'situacion_familiar' => 'nullable|max:200',
            'asiste_centro_rhb' => 'nullable|max:200',
        ];
        return $rules;
    }
}
