<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
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
        //dd($request->file('genograma'));
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
                'comentario_alimen' => $request->input('comentario_alimen'),
                'arreglo_personal' => $request->input('arreglo_personal'),
                'comentario_arreglo' => $request->input('comentario_arreglo'),
                'banio' => $request->input('banio'),
                'comentario_banio' => $request->input('comentario_banio'),
                'vestuario_superior' => $request->input('vestuario_superior'),
                'comentario_superior' => $request->input('comentario_superior'),
                'vestuario_inferior' => $request->input('vestuario_inferior'),
                'comentario_inferior' => $request->input('comentario_inferior'),
                'ponerse_zapatos' => $request->input('ponerse_zapatos'),
                'comentario_zapatos' => $request->input('comentario_zapatos'),
                'aseo_perianal' => $request->input('aseo_perianal'),
                'comentario_aseo' => $request->input('comentario_aseo'),
                'lavado_dental' => $request->input('lavado_dental'),
                'comentario_dental' => $request->input('comentario_dental'),
                'manejo_vesical' => $request->input('manejo_vesical'),
                'comentario_vesical' => $request->input('comentario_vesical'),
                'manejo_anal' => $request->input('manejo_anal'),
                'comentario_anal' => $request->input('comentario_anal'),
                'preparar_comida' => $request->input('preparar_comida'),
                'comentario_comida' => $request->input('comentario_comida'),
                'poner_mesa' => $request->input('poner_mesa'),
                'comentario_mesa' => $request->input('comentario_mesa'),
                'limpieza_ligera' => $request->input('limpieza_ligera'),
                'comentario_ligera' => $request->input('comentario_ligera'),
                'espacio_ordenado' => $request->input('espacio_ordenado'),
                'comentario_orden' => $request->input('comentario_orden'),
                'manejo_dinero' => $request->input('manejo_dinero'),
                'comentario_dinero' => $request->input('comentario_dinero'),
                'ir_compras' => $request->input('ir_compras'),
                'comentario_compras' => $request->input('comentario_compras'),
                'locomocion' => $request->input('locomocion'),
                'comentario_locomocion' => $request->input('comentario_locomocion'),
                'resolver_problemas' => $request->input('resolver_problemas'),
                'comentario_problemas' => $request->input('comentario_problemas'),
                'adecuacion_social' => $request->input('adecuacion_social'),
                'comentario_adecuacion' => $request->input('comentario_adecuacion'),
                'seguir_instrucciones' => $request->input('seguir_instrucciones'),
                'comentario_instrucciones' => $request->input('comentario_instrucciones'),
                'expresar_necesidades' => $request->input('expresar_necesidades'),
                'comentario_necesidades' => $request->input('comentario_necesidades'),
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
                $request->file('genograma')->store('public/genogramas-to'),
                'genograma' => $request->file('genograma')->hashName(),
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
                'profesional_id' => '1', //provisional, profesional no esta implementado
                'beneficiario_id' => $request->input('id'),
                //'beneficiario_id' => '1',
            ]);
            $fichaTerapiaOcupacional->save();
        }
        catch(Exception $e){

            //procedimiento en caso de reportar errores

        }
        $id = $request->input('id');
        return view('home');
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
            'motivo_consulta' => 'nullable|max:200',
            'derivado_por' => 'nullable|max:200',
            'relacion_paciente' => 'nullable|max:200',
            'nombre_madre'  => 'nullable|max:200',
            'edad_madre'  => 'nullable|max:200',
            'ocupacion_madre'  => 'nullable|max:200',
            'escolaridad_madre'  => 'nullable|max:200',
            'horario_trabajo_madre'  => 'nullable|max:200',
            'nombre_padre'  => 'nullable|max:200',
            'edad_padre'  => 'nullable|max:200',
            'ocupacion_padre' => 'nullable|max:200',
            'escolaridad_padre'  => 'nullable|max:200',
            'horario_trabajo_padre'  => 'nullable|max:200',
            'tiempo_gestacional' => 'nullable|max:200',
            'tipo_parto' => 'nullable|max:200',
            'enfermedades_natal_sn' => 'nullable|max:200',
            'observaciones_enfermedades' => 'nullable|max:200',
            'enfermedades_familiares'=> 'nullable|max:200',
            'evaluacion_psiquiatra' => 'nullable|max:200',
            'evaluacion_fonoaudiologo' => 'nullable|max:200',
            'evaluacion_ocupacional' => 'nullable|max:200',
            'evaluacion_kinesiologo' => 'nullable|max:200',
            'evaluacion_psicologo' => 'nullable|max:200',
            'otra_evaluacion' => 'nullable|max:200',
            'tratamientos_recibidos'=> 'nullable|max:200',
            'medicamentos_sn' => 'nullable|max:200',
            'medicamentos' => 'nullable|max:200',
            'efectos_medicamentos' => 'nullable|max:200',
            'diagnosticos_previos' => 'nullable|max:200',
            'edad_sento' => 'nullable|max:200',
            'edad_camino' => 'nullable|max:200',
            'edad_palabra' => 'nullable|max:200',
            'control_vesical_sn' => 'nullable|max:200',
            'edad_control_vesical' => 'nullable|max:200',
            'control_anal_sn' => 'nullable|max:200',
            'edad_control_anal' => 'nullable|max:200',
            'vesical_diurno' => 'nullable|max:200',
            'vesical_nocturno' => 'nullable|max:200',
            'anal_diurno' => 'nullable|max:200',
            'anal_nocturno' => 'nullable|max:200',
            'observaciones' => 'nullable|max:200',
            'estabilidad_caminar_sna' => 'nullable|max:200',
            'caidas_frecuentes_sna' => 'nullable|max:200',
            'dominancia_lateral_sna' => 'nullable|max:200',
            'garra_sna' => 'nullable|max:200',
            'pinza_sna' => 'nullable|max:200',
            'como_pinza' => 'nullable|max:200',
            'dibuja_sna' => 'nullable|max:200',
            'escribe_sna' => 'nullable|max:200',
            'corta_sna' => 'nullable|max:200',
            'estimulos_visuales' => 'nullable|max:200',
            'estimulos_auditivos' => 'nullable|max:200',
            'estimulos_gustativos' => 'nullable|max:200',
            'estimulos_tactiles' => 'nullable|max:200',
            'estimulos_olfativos' => 'nullable|max:200',
            'come_solo_sn' => 'nullable|max:200',
            'acepta_solido_sn' => 'nullable|max:200',
            'acepta_semisolido_sn' => 'nullable|max:200',
            'acepta_liquidos_sn' => 'nullable|max:200',
            'temperatura_preferida' => 'nullable|max:200',
            'sabores_preferidos' => 'nullable|max:200',
            'colores_preferidos' => 'nullable|max:200',
            'ejemplo_comida'=> 'nullable|max:200',
            'alimentacion' => ['nullable', Rule::in(['d','p','e','D','P','E']),],
            'comentario_alimen' => 'nullable|max:200',
            'arreglo_personal' => ['nullable', Rule::in(['d','p','e','D','P','E']),],
            'comentario_arreglo' => 'nullable|max:200',
            'banio' => ['nullable', Rule::in(['d','p','e','D','P','E']),],
            'comentario_banio' => 'nullable|max:200',
            'vestuario_superior'=> ['nullable', Rule::in(['d','p','e','D','P','E']),],
            'comentario_superior' => 'nullable|max:200',
            'vestuario_inferior' => ['nullable', Rule::in(['d','p','e','D','P','E']),],
            'comentario_inferior' => 'nullable|max:200',
            'ponerse_zapatos' => ['nullable', Rule::in(['d','p','e','D','P','E']),],
            'comentario_zapatos' => 'nullable|max:200',
            'aseo_perianal' => ['nullable', Rule::in(['d','p','e','D','P','E']),],
            'comentario_aseo' => 'nullable|max:200',
            'lavado_dental' => ['nullable', Rule::in(['d','p','e','D','P','E']),],
            'comentario_dental' => 'nullable|max:200',
            'manejo_vesical' => ['nullable', Rule::in(['d','p','e','D','P','E']),],
            'comentario_vesical' => 'nullable|max:200',
            'manejo_anal' => ['nullable', Rule::in(['d','p','e','D','P','E']),],
            'comentario_anal' => 'nullable|max:200',
            'preparar_comida' => ['nullable', Rule::in(['d','p','e','D','P','E']),],
            'comentario_comida' => 'nullable|max:200',
            'poner_mesa' => ['nullable', Rule::in(['d','p','e','D','P','E']),],
            'comentario_mesa' => 'nullable|max:200',
            'limpieza_ligera' => ['nullable', Rule::in(['d','p','e','D','P','E']),],
            'comentario_ligera' => 'nullable|max:200',
            'espacio_ordenado' => ['nullable', Rule::in(['d','p','e','D','P','E']),],
            'comentario_orden' => 'nullable|max:200',
            'manejo_dinero' => ['nullable', Rule::in(['d','p','e','D','P','E']),],
            'comentario_dinero' => 'nullable|max:200',
            'ir_compras' => ['nullable', Rule::in(['d','p','e','D','P','E']),],
            'comentario_compras' => 'nullable|max:200',
            'locomocion' => ['nullable', Rule::in(['d','p','e','D','P','E']),],
            'comentario_locomocion' => 'nullable|max:200',
            'resolver_problemas' => ['nullable', Rule::in(['d','p','e','D','P','E']),],
            'comentario_problemas' => 'nullable|max:200',
            'adecuacion_social' => ['nullable', Rule::in(['d','p','e','D','P','E']),],
            'comentario_adecuacion' => 'nullable|max:200',
            'seguir_instrucciones'=> ['nullable', Rule::in(['d','p','e','D','P','E']),],
            'comentario_instrucciones'=> 'nullable|max:200',
            'expresar_necesidades' => ['nullable', Rule::in(['d','p','e','D','P','E']),],
            'comentario_necesidades' => 'nullable|max:200',
            'contacto_visual' => 'nullable|max:200',
            'sonrisa_social' => 'nullable|max:200',
            'seguimiento_personas' => 'nullable|max:200',
            'seguimiento_objetos' => 'nullable|max:200',
            'investigacion_visual' => 'nullable|max:200',
            'investigacion_motora' => 'nullable|max:200',
            'atencion_conjunta' => 'nullable|max:200',
            'imitacion_gestual' => 'nullable|max:200',
            'imitacion_vocal' => 'nullable|max:200',
            'imitacion_motora' => 'nullable|max:200',
            'situaciones_repetidas' => 'nullable|max:200',
            'situaciones_nuevas' => 'nullable|max:200',
            'intencion_comunicacional' => 'nullable|max:200',
            'carinioso' => 'nullable|max:200',
            'juego_solitario' => 'nullable|max:200',
            'juego_paralelo' => 'nullable|max:200',
            'juego_interactivo' => 'nullable|max:200',
            'gestos_adecuados' => 'nullable|max:200',
            'inicia_conversacion' => 'nullable|max:200',
            'formula_peticiones' => 'nullable|max:200',
            'aclarar_dudas' => 'nullable|max:200',
            'emisor_receptor' => 'nullable|max:200',
            'ninios_edad' => 'nullable|max:200',
            'preferencia_tipo_persona' => 'nullable|max:200',
            'mayores_intereses' => 'nullable|max:200',
            'cosas_no_gustan' => 'nullable|max:200',
            'juegos' => 'nullable|max:200',
            'genograma' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        return $rules;
    }
}
