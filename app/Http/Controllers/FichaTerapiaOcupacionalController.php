<?php

namespace App\Http\Controllers;

use App\ActividadesVidaDiaria;
use App\AntecedentesSalud;
use App\AntecedentesSocioFamiliares;
use App\DesarrolloEvolutivo;
use App\FichaTerapiaOcupacional;
use App\HabilidadesSociales;
use App\HistorialClinico;
use Illuminate\Http\Request;

class FichaTerapiaOcupacionalController extends Controller
{
    /**
     * Mostrar formulario de ingreso de evaluacion inicial.
     *
     * @param $id
     * @return view
     */
    public function getIngresar($id)
    {
        return view('area-medica.ficha-evaluacion-inicial.terapia-ocupacional.ingresar')
            ->with(compact('id'));
    }

    /**
     * Guardar datos recibidos del formulario en bd.
     *@param Request $request
     * @return redirect
     */
    public function postIngresar(Request $request)
    {
        // Validate Fields
        $this->validate($request, $this->rules($request));


        //Obtener el beneficiario segun el rut
        //$beneficiario = Beneficiario::where('rut', $request->input('rut'))->get();

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
                'edad_control_vesical' => $request->input('edad_control_vesical'),
                'control_anal_sn' => $request->input('control_anal_sn'),
                'edad_control_anal' => $request->input('edad_control_anal'),
                'vesical_diurno' => $request->input('vesical_diurno'),
                'vesical_nocturno' => $request->input('vesical_nocturno'),
                'anal_diurno' => $request->input('anal_diurno'),
                'anal_nocturno' => $request->input('anal_nocturno'),
                'observaciones' => $request->input('observaciones'),
                'estabilidad_caminar_sna' => $request->input('estabilidad_caminar_sna'),
                'caidas_frecuentes_sna' => $request->input('caidas_frecuentes_sna'),
                'dominancia_lateral_sna' => $request->input('dominancia_lateral_sna'),
                'garra_sna' => $request->input('garra_sna'),
                'pinza_sna' => $request->input('pinza_sna'),
                'como_pinza' => $request->input('como_pinza'),
                'dibuja_sna' => $request->input('dibuja_sna'),
                'escribe_sna' => $request->input('escribe_sna'),
                'corta_sna' => $request->input('corta_sna'),
                'estimulos_visuales' => $request->input('estimulos_visuales'),
                'estimulos_auditivos' => $request->input('estimulos_auditivos'),
                'estimulos_gustativos' => $request->input('estimulos_gustativos'),
                'estimulos_tactiles' => $request->input('estimulos_tactiles'),
                'estimulos_olfativos' => $request->input('estimulos_olfativos'),
                'come_solo_sn' => $request->input('come_solo_sn'),
                'acepta_solido_sn' => $request->input('acepta_solido_sn'),
                'acepta_semisolido_sn' => $request->input('acepta_semisolido_sn'),
                'acepta_liquidos_sn' => $request->input('acepta_liquidos_sn'),
                'temperatura_preferida' => $request->input('temperatura_preferida'),
                'sabores_preferidos' => $request->input('sabores_preferidos'),
                'colores_preferidos' => $request->input('colores_preferidos'),
                'ejemplo_comida' => $request->input('ejemplo_comida'),
            ]);
            $desarrolloEvolutivo->save();

            $habilidadesSociales = new HabilidadesSociales([
                'contacto_visual' => $request->input('contacto_visual'),
                'sonrisa_social' => $request->input('sonrisa_social'),
                'seguimiento_personas' => $request->input('seguimiento_personas'),
                'seguimiento_objetos' => $request->input('seguimiento_objetos'),
                'investigacion_visual' => $request->input('investigacion_visual'),
                'investigacion_motora' => $request->input('investigacion_motora'),
                'atencion_conjunta' => $request->input('atencion_conjunta'),
                'imitacion_gestual' => $request->input('imitacion_gestual'),
                'imitacion_vocal' => $request->input('imitacion_vocal'),
                'imitacion_motora' => $request->input('imitacion_motora'),
                'situaciones_repetidas' => $request->input('situaciones_repetidas'),
                'situaciones_nuevas' => $request->input('situaciones_nuevas'),
                'intencion_comunicacional' => $request->input('intencion_comunicacional'),
                'carinioso' => $request->input('carinioso'),
                'juego_solitario' => $request->input('juego_solitario'),
                'juego_paralelo' => $request->input('juego_paralelo'),
                'juego_interactivo' => $request->input('juego_interactivo'),
                'gestos_adecuados' => $request->input('gestos_adecuados'),
                'inicia_conversacion' => $request->input('inicia_conversacion'),
                'formula_peticiones' => $request->input('formula_peticiones'),
                'aclarar_dudas' => $request->input('aclarar_dudas'),
                'emisor_receptor' => $request->input('emisor_receptor'),
                'ninios_edad' => $request->input('ninios_edad'),
                'preferencia_tipo_persona' => $request->input('preferencia_tipo_persona'),
                'mayores_intereses' => $request->input('mayores_intereses'),
                'cosas_no_gustan' => $request->input('cosas_no_gustan'),
                'juegos' => $request->input('juegos'),
            ]);
            $habilidadesSociales->save();

            $historialClinico = new HistorialClinico([
                'enfermedades_familiares' => $request->input('enfermedades_familiares'),
                'evaluacion_psiquiatra' => $request->input('evaluacion_psiquiatra'),
                'evaluacion_fonoaudiologo' => $request->input('evaluacion_fonoaudiologo'),
                'evaluacion_ocupacional' => $request->input('evaluacion_ocupacional'),
                'evaluacion_kinesiologo' => $request->input('evaluacion_kinesiologo'),
                'evaluacion_psicologo' => $request->input('evaluacion_psicologo'),
                'otra_evaluacion' => $request->input('otra_evaluacion'),
                'tratamientos_recibidos' => $request->input('tratamientos_recibidos'),
                'medicamentos_sn' => $request->input('medicamentos_sn'),
                'medicamentos' => $request->input('medicamentos'),
                'efectos_medicamentos' => $request->input('efectos_medicamentos'),
                'diagnosticos_previos' => $request->input('diagnosticos_previos'),
            ]);
            $historialClinico->save();

            $fichaTerapiaOcupacional = new FichaTerapiaOcupacional([
                //'diagnostico' => $beneficiario->diagnostico,
                'diagnostico_base' => 'diagnostico_base', //provisional, diagnostico no esta implementado en beneficiario
                'motivo_consulta' => $request->input('motivo_consulta'),
                'derivado_por' => $request->input('derivado_por'),
                'relacion_paciente' => $request->input('relacion_paciente'),
                'observaciones_generales' => $request->input('observaciones_generales'),
                'actividades_vida_diaria_id' => $actividadesVidaDiaria->id,
                'antecedentes_salud_id' => $antecedentesSalud->id,
                'antecedentes_so_fa_id' => $antecedentesSocioFamiliares->id,
                'desarrollo_evolutivo_id' => $desarrolloEvolutivo->id,
                'habilidades_sociales_id' => $habilidadesSociales->id,
                'historial_clinico_id' => $historialClinico->id,
                //'terapeuta_ocupacional_id' => $terapeuta->id,
                'terapeuta_ocupacional_id' => '1', //provisional, terapeutaOcupacional no esta implementado
                'beneficiario_id' => $request->input('id'),
                //'beneficiario_id' => '1',
            ]);
            $fichaTerapiaOcupacional->save();
        }
        catch(Exception $e){

            //procedimiento en caso de reportar errores

        }
        $id = $request->input('id');
        return redirect()->route('area-medica.ficha-evaluacion-inicial.terapia-ocupacional.ingresar')
            ->with(compact('id'));
    }

    /**
     * Mostrar formulario de ingreso de evaluacion inicial.
     *
     * @return view
     */
    public function getMostrarLista()
    {
        $fichas = FichaTerapiaOcupacional::all();

        return view('area-medica.ficha-evaluacion-inicial.terapia-ocupacional.mostrar-lista', [ 'fichas' => $fichas ]);
    }

    private function rules(Request $request) {
        $rules = [
            'id' => 'required|exists:beneficiarios',

        ];
        return $rules;
    }
}
