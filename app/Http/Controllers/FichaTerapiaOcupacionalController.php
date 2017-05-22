<?php

namespace App\Http\Controllers;

use App\ActividadesVidaDiaria;
use App\AntecedentesSalud;
use App\AntecedentesSocioFamiliares;
use App\DesarrolloEvolutivo;
use Illuminate\Http\Request;

class FichaTerapiaOcupacionalController extends Controller
{
    /**
     * Mostrar formulario de ingreso de evaluacion inicial.
     *
     * @return view
     */
    public function getIngresar()
    {
        return view('medica.ficha-evaluacion-inicial.terapia-ocupacional.ingresar');
    }

    /**
     * Guardar datos recibidos del formulario en bd.
     *
     * @return redirect
     */
    public function postIngresar(Request $request)
    {
        $this->validate($request, [
            'rut' => 'required|exists:beneficiarios',

        ]);


        //Obtener el beneficiario segun el rut
        $beneficiario = Beneficiario::where('rut', $request->input('rut'))->get();

        //obtener el terapeuta ocupacional por su sesion
        /*
        if (Auth::check())
        {
            $terapeuta = TerapeutaOcupacional::where('rut', Auth::user()->rut);
        }
        */

        try{
            $actividadesVidaDiaria = new ActividadesVidaDiaria([
                'alimentacion' => $request->input('alimentacion'),
                'arreglo_personal' => $request->input('arreglo_personal'),
                'banio' => $request->input('banio'),
                'vestuario_superior' => $request->input('vestuario_superior'),
                'vestuario_inferior' => $request->input('vestuario_inferior'),
                'ponerse_zapatos' => $request->input('ponerse_zapatos'),
                'aseo_perianal' => $request->input('aseo_perianal'),
                'lavado_dental' => $request->input('lavado_dental'),
                'manejo_vesical' => $request->input('manejo_vesical'),
                'manejo_anal' => $request->input('manejo_anal'),
                'preparar_comida' => $request->input('preparar_comida'),
                'poner_mesa' => $request->input('poner_mesa'),
                'limpieza_ligera' => $request->input('limpieza_ligera'),
                'espacio_ordenado' => $request->input('espacio_ordenado'),
                'manejo_dinero' => $request->input('manejo_dinero'),
                'ir_compras' => $request->input('ir_compras'),
                'locomocion' => $request->input('locomocion'),
                'resolver_problemas' => $request->input('resolver_problemas'),
                'adecuacion_social' => $request->input('adecuacion_social'),
                'seguir_instrucciones' => $request->input('seguir_instrucciones'),
                'expresar_necesidades' => $request->input('expresar_necesidades'),
            ]);
            $actividadesVidaDiaria->save();

            $antecedentesSalud = new AntecedentesSalud([
                'tiempo_gestacional' => $request->input('tiempo_gestacional'),
                'tipo_parto' => $request->input('tipo_parto'),
                'enfermedades_natal_sn' => $request->input('enfermedades_natal_sn'),
                'observaciones_enfermedades' => $request->input('observaciones_enfermedades'),
            ]);
            $antecedentesSalud->save();

            $antecedentesSocioFamiliares = new AntecedentesSocioFamiliares([
                'nombre_madre' => $request->input('nombre_madre'),
                'edad_madre' => $request->input('edad_madre'),
                'ocupacion_madre' => $request->input('ocupacion_madre'),
                'escolaridad_madre' => $request->input('escolaridad_madre'),
                'horario_trabajo_madre' => $request->input('horario_trabajo_madre'),
                'nombre_padre' => $request->input('nombre_padre'),
                'edad_padre' => $request->input('edad_padre'),
                'ocupacion_padre' => $request->input('ocupacion_padre'),
                'escolaridad_padre' => $request->input('escolaridad_padre'),
                'horario_trabajo_padre' => $request->input('horario_trabajo_padre'),
            ]);
            $antecedentesSocioFamiliares->save();

            $desarrolloEvolutivo = new DesarrolloEvolutivo([
                'edad_sento' => $request->input('edad_sento'),
                'edad_camino' => $request->input('edad_camino'),
                'edad_palabra' => $request->input('edad_palabra'),
                'control_vesical_sn' => $request->input('control_vesical_sn'),
            ]);
            $desarrolloEvolutivo->save();

            $valDeambulacion = new ValDeambulacion([
                'puntaje_desp_caminando' => $request->input('puntaje_desp_caminando'),
                'coment_desp_caminando' => $request->input('coment_desp_caminando'),
                'puntae_escaleras' => $request->input('puntae_escaleras'),
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
                //'diagnostico' => $beneficiario->diagnostico,
                'diagnostico' => 'diagnostico', //provisional, diagnostico no esta implementado en beneficiario
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
                'beneficiario_id' => $beneficiario->last()->id,
                //'beneficiario_id' => '1',
            ]);
            $fichaKinesiologia->save();
        }
        catch(Exception $e){

            //procedimiento en caso de reportar errores

        }
        return redirect()->route('medica.ficha-evaluacion-inicial.kinesiologia.ingresar');
    }
}
