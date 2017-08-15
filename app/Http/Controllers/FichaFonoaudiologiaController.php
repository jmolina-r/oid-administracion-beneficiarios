<?php

namespace App\Http\Controllers;
use App\Funcionario;
use Illuminate\Support\Facades\Auth;
use App\AntecedentesMorbidosFamiliaresSiNoFono;
use App\AntecedentesMorbidosSiNoFono;
use App\AntecedentesPerinatalesFono;
use App\AntecedentesPostnatalesFono;
use App\AntecedentesPrenatalesFono;
use App\DesarrolloLenguajeEdades;
use App\DesarrolloPsicomotorEdades;
use App\DesarrolloSocialFono;
use App\FichaFonoaudiologia;
use App\HabitosSiNoFono;
use App\ParienteHogarFono;
use App\Beneficiario;
use Illuminate\Http\Request;

class FichaFonoaudiologiaController extends Controller
{

    /**
     * Mostrar formulario de ingreso de evaluacion inicial.
     *
     * @return view
     */
    public function create($id)
    {
        return view('area-medica.ficha-evaluacion-inicial.fonoaudiologia.create')
            ->with(compact('id'));
    }

    public function postFono(Request $request)
    {
        $ultimaFicha = FichaFonoaudiologia::where('beneficiario_id', $request->input('id'))->orderBy('created_at', $direction = 'des');

        if($ultimaFicha->first() != null){
            if($ultimaFicha->first()->estado == 'abierto'){
                return view('home');
            }
        }

        //dd($request->all());
        $this->validate($request, $this->rules($request));

        if (Auth::check())
        {
            $idUsuario = Auth::user()->id;
            $idFuncionario=Auth::user()->funcionario_id;
        }

        try{
            $habitosSiNoFono = new HabitosSiNoFono([
                'mamadera' => $request->input('mamadera'),
                'chupete' => $request->input('chupete'),
                'chupa_dedo' => $request->input('chupa_dedo'),
                'come_solo_tipo' => $request->input('come_solo_tipo'),
                'viste_solo' => $request->input('viste_solo'),
                'boca_abierta_dia' => $request->input('boca_abierta_dia'),
                'boca_abierta_noche' => $request->input('boca_abierta_noche'),
            ]);
            $habitosSiNoFono->save();

            $desarrolloLenguajeEdades = new DesarrolloLenguajeEdades([
                'balbuceo' => $request->input('balbuceo'),
                'sonrio' => $request->input('sonrio'),
                'primeras_palabras' => $request->input('primeras_palabras'),
                'frases_dos_palabras' => $request->input('frases_dos_palabras'),
                'oraciones' => $request->input('oraciones'),
                'hablo_espo' => $request->input('hablo_espo'),
                'siguio_inst' => $request->input('siguio_inst'),
                'mira_ojos' => $request->input('mira_ojos'),
                'mira_labios' => $request->input('mira_labios'),
                'comunica_palabras' => $request->input('comunica_palabras'),
                'comunica_jergas' => $request->input('comunica_jergas'),
                'comunica_palabras_sueltas' => $request->input('comunica_palabras_sueltas'),
                'comunica_gestos' => $request->input('comunica_gestos'),
                'entiende_dice' => $request->input('entiende_dice'),
                'desconocidos_entienden' => $request->input('desconocidos_entienden'),

            ]);
            $desarrolloLenguajeEdades->save();

            $antecedentesPerinatalesFono = new AntecedentesPerinatalesFono([
                'tipo_parto' => $request->input('tipo_parto'),
                'suf_fetal' => $request->input('suf_fetal'),
                'edad_gest' => $request->input('edad_gest'),
                'lugar_naci' => $request->input('lugar_naci'),
                'peso' => $request->input('peso'),
                'talla' => $request->input('talla'),
                'apgar' => $request->input('apgar'),
                'comp_parto' => $request->input('comp_parto'),
                'hospitalizaciones' => $request->input('hospitalizaciones'),
                'otros_perinatales' => $request->input('otros_perinatales'),
            ]);
            $antecedentesPerinatalesFono->save();

            $antecedentesPrenatalesFono = new AntecedentesPrenatalesFono([
                'plan_embarazo' => $request->input('plan_embarazo'),
                'acept_embarazo' => $request->input('acept_embarazo'),
                'control_embarazo' => $request->input('control_embarazo'),
                'ingesta_med' => $request->input('ingesta_med'),
                'ingesta_oh_drogas' => $request->input('ingesta_oh_drogas'),
                'consumo_cigarrillo' => $request->input('consumo_cigarrillo'),
                'estado_emocional' => $request->input('estado_emocional'),
                'enfermedades_embarazo' => $request->input('enfermedades_embarazo'),
                'otros_prenatales' => $request->input('otros_prenatales'),
            ]);
            $antecedentesPrenatalesFono->save();

            $desarrolloPsicomotorEdades = new DesarrolloPsicomotorEdades([
                'control_cabeza' => $request->input('control_cabeza'),
                'sento' => $request->input('sento'),
                'paro' => $request->input('paro'),
                'gateo' => $request->input('gateo'),
                'camino' => $request->input('camino'),
                'control_esf_diurno' => $request->input('control_esf_diurno'),
                'control_esf_nocturno' => $request->input('control_esf_nocturno'),
            ]);
            $desarrolloPsicomotorEdades->save();

            $desarrolloSocialFono = new DesarrolloSocialFono([
                'respeta_normas' => $request->input('respeta_normas'),
                'comparte_juguetes' => $request->input('comparte_juguetes'),
                'juega_otros' => $request->input('juega_otros'),
                'carinoso' => $request->input('carinoso'),
                'berrinches' => $request->input('berrinches'),
                'frustra_facil' => $request->input('frustra_facil'),
                'irritable' => $request->input('irritable'),
                'agresivo' => $request->input('agresivo'),
                'peleador' => $request->input('peleador'),
                'intereses' => $request->input('intereses'),
                'observaciones_social' => $request->input('observaciones_social'),
            ]);
            $desarrolloSocialFono->save();

            $antecedentesMorbidosSiNoFono = new AntecedentesMorbidosSiNoFono([
                'alergias_sn' => $request->input('alergias_sn'),
                'alergias_desc' => $request->input('alergias_desc'),
                'obesidad_sn' => $request->input('obesidad_sn'),
                'obesidad_desc' => $request->input('obesidad_desc'),
                'otitis_sn' => $request->input('otitis_sn'),
                'otitis_desc' => $request->input('otitis_desc'),
                'diabetes_sn' => $request->input('diabetes_sn'),
                'diabetes_desc' => $request->input('diabetes_desc'),
                'cirugias_sn' => $request->input('cirugias_sn'),
                'cirugias_desc' => $request->input('cirugias_desc'),
                'traumatis_sn' => $request->input('traumatis_sn'),
                'traumatis_desc' => $request->input('traumatis_desc'),
                'epilepsia_sn' => $request->input('epilepsia_sn'),
                'epilepsia_desc' => $request->input('epilepsia_desc'),
                'deficit_visual_sn' => $request->input('deficit_visual_sn'),
                'deficit_visual_desc' => $request->input('deficit_visual_desc'),
                'deficit_auditivo_sn' => $request->input('deficit_auditivo_sn'),
                'deficit_auditivo_desc' => $request->input('deficit_auditivo_desc'),
                'paralisis_cerebral_sn' => $request->input('paralisis_cerebral_sn'),
                'paralisis_cerebral_desc' => $request->input('paralisis_cerebral_desc'),
                'otros_morbidos' => $request->input('otros_morbidos'),
            ]);
            $antecedentesMorbidosSiNoFono->save();

            $antecedentesMorbidosFamiliaresSiNoFono = new AntecedentesMorbidosFamiliaresSiNoFono([
                'diabetes_sn_mor_fa' => $request->input('diabetes_sn_mor_fa'),
                'hipertension_sn' => $request->input('hipertension_sn'),
                'epilepsia_sn_mor_fa' => $request->input('epilepsia_sn_mor_fa'),
                'deficiencia_mental_sn' => $request->input('deficiencia_mental_sn'),
                'autismo_sn' => $request->input('autismo_sn'),
                'trast_lenguaje_sn' => $request->input('trast_lenguaje_sn'),
                'trast_aprendizaje_sn' => $request->input('trast_aprendizaje_sn'),
                'trast_visuales_sn' => $request->input('trast_visuales_sn'),
                'trast_auditivos_sn' => $request->input('trast_auditivos_sn'),
                'trast_psiquiatricos_sn' => $request->input('trast_psiquiatricos_sn'),
            ]);
            $antecedentesMorbidosFamiliaresSiNoFono->save();

            $parienteHogarFono = new ParienteHogarFono([
                'observaciones_parientes' => $request->input('observaciones_parientes'),
                'nombre1' => $request->input('nombre1'),
                'parentesco1' => $request->input('parentesco1'),
                'edad1' => $request->input('edad1'),
                'escolaridad1' => $request->input('escolaridad1'),
                'ocupacion1' => $request->input('ocupacion1'),
                'nombre2' => $request->input('nombre2'),
                'parentesco2' => $request->input('parentesco2'),
                'edad2' => $request->input('edad2'),
                'escolaridad2' => $request->input('escolaridad2'),
                'ocupacion2' => $request->input('ocupacion2'),
                'nombre3' => $request->input('nombre3'),
                'parentesco3' => $request->input('parentesco3'),
                'edad3' => $request->input('edad3'),
                'escolaridad3' => $request->input('escolaridad3'),
                'ocupacion3' => $request->input('ocupacion3'),
                'nombre4' => $request->input('nombre4'),
                'parentesco4' => $request->input('parentesco4'),
                'edad4' => $request->input('edad4'),
                'escolaridad4' => $request->input('escolaridad4'),
                'ocupacion4' => $request->input('ocupacion4'),
                'nombre5' => $request->input('nombre5'),
                'parentesco5' => $request->input('parentesco5'),
                'edad5' => $request->input('edad5'),
                'escolaridad5' => $request->input('escolaridad5'),
                'ocupacion5' => $request->input('ocupacion5'),
                'nombre6' => $request->input('nombre6'),
                'parentesco6' => $request->input('parentesco6'),
                'edad6' => $request->input('edad6'),
                'escolaridad6' => $request->input('escolaridad6'),
                'ocupacion6' => $request->input('ocupacion6'),

            ]);
            $parienteHogarFono->save();

            $antecedentesPostnatalesFono = new AntecedentesPostnatalesFono([
                'trat_post_parto' => $request->input('trat_post_parto'),
                'tipo_alimenta' => $request->input('tipo_alimenta'),
                'limite_edad_alimenta' => $request->input('limite_edad_alimenta'),
                'operaciones_edad' => $request->input('operaciones_edad'),
                'observaciones_postnatales' => $request->input('observaciones_postnatales'),
                'hospitalizaciones_edad' => $request->input('hospitalizaciones_edad'),
            ]);
            $antecedentesPostnatalesFono->save();


            $fichaFonoaudiologia = new FichaFonoaudiologia([
                'motivo_consulta' => $request->input('motivo_consulta'),
                'estado'=>'abierto',
                'habitos_si_no_id' => $habitosSiNoFono->id,
                'desarrollo_le_ed_id' => $desarrolloLenguajeEdades->id,
                'antecedentes_peri_fono_id' => $antecedentesPerinatalesFono->id,
                'antecedentes_pre_fono_id' => $antecedentesPrenatalesFono->id,
                'desarrollo_social_fono_id' => $desarrolloSocialFono->id,
                'desarrollo_psi_ed_id' => $desarrolloPsicomotorEdades->id,
                'antecedentes_mor_fono_id' => $antecedentesMorbidosSiNoFono->id,
                'antecedentes_mor_fa_fono_id' => $antecedentesMorbidosFamiliaresSiNoFono->id,
                'parientes_hogar_fono_id' => $parienteHogarFono->id,
                'antecedentes_pos_fono_id' => $antecedentesPostnatalesFono->id,
                'funcionario_id' => $idFuncionario,
                'beneficiario_id' => $request->input('id'),
            ]);
            $fichaFonoaudiologia->save();
        }
        catch(Exception $e){

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
        $fichaFonoaudiologia = FichaFonoaudiologia::find($id);

        if($fichaFonoaudiologia == null){
            return view('area-medica.ficha-evaluacion-inicial.Error');
        }

        $persona = Beneficiario::find($fichaFonoaudiologia->beneficiario_id);
        $funcionario=Funcionario::find($fichaFonoaudiologia->funcionario_id);

        $habitosSiNoFono = HabitosSiNoFono::find($fichaFonoaudiologia->habitos_si_no_id);
        $desarrolloLenguajeEdades = DesarrolloLenguajeEdades::find($fichaFonoaudiologia->desarrollo_le_ed_id);
        $antecedentesPerinatalesFono = AntecedentesPerinatalesFono::find($fichaFonoaudiologia->antecedentes_peri_fono_id);
        $antecedentesPrenatalesFono = AntecedentesPrenatalesFono::find($fichaFonoaudiologia->antecedentes_pre_fono_id);
        $desarrolloPsicomotorEdades = DesarrolloPsicomotorEdades::find($fichaFonoaudiologia->desarrollo_psi_ed_id);
        $desarrolloSocialFono = DesarrolloSocialFono::find($fichaFonoaudiologia->desarrollo_social_fono_id);
        $antecedentesMorbidosSiNoFono = AntecedentesMorbidosSiNoFono::find($fichaFonoaudiologia->antecedentes_mor_fono_id);
        $antecedentesMorbidosFamiliaresSiNoFono = AntecedentesMorbidosFamiliaresSiNoFono::find($fichaFonoaudiologia->antecedentes_mor_fa_fono_id);
        $parienteHogarFono = ParienteHogarFono::find($fichaFonoaudiologia->parientes_hogar_fono_id);
        $antecedentesPostnatalesFono = AntecedentesPostnatalesFono::find($fichaFonoaudiologia->antecedentes_pos_fono_id);

        return view('area-medica.ficha-evaluacion-inicial.fonoaudiologia.show', compact('fichaFonoaudiologia'))
            ->with(compact('persona'))
            ->with(compact('habitosSiNoFono'))
            ->with(compact('desarrolloLenguajeEdades'))
            ->with(compact('antecedentesPerinatalesFono'))
            ->with(compact('antecedentesPrenatalesFono'))
            ->with(compact('desarrolloPsicomotorEdades'))
            ->with(compact('antecedentesMorbidosSiNoFono'))
            ->with(compact('antecedentesMorbidosFamiliaresSiNoFono'))
            ->with(compact('parienteHogarFono'))
            ->with(compact('antecedentesPostnatalesFono'))
            ->with(compact('desarrolloSocialFono'))
            ->with(compact('funcionario'))
            ;
    }

    private function rules(Request $request) {
        $rules = [
            'id' => 'required|exists:beneficiarios',
            'motivo_consulta' => 'nullable|max:200',
            'mamadera' => 'nullable|max:200',
            'chupete' => 'nullable|max:200',
            'chupa_dedo' => 'nullable|max:200',
            'come_solo_tipo' => 'nullable|max:200',
            'viste_solo' => 'nullable|max:200',
            'boca_abierta_dia' => 'nullable|max:200',
            'boca_abierta_noche' => 'nullable|max:200',
            'balbuceo' => 'nullable|max:200',
            'sonrio' => 'nullable|max:200',
            'primeras_palabras' => 'nullable|max:200',
            'frases_dos_palabras' => 'nullable|max:200',
            'oraciones' => 'nullable|max:200',
            'hablo_espo' => 'nullable|max:200',
            'siguio_inst' => 'nullable|max:200',
            'mira_ojos' => 'nullable|max:200',
            'mira_labios' => 'nullable|max:200',
            'comunica_palabras' => 'nullable|max:200',
            'comunica_jerga' => 'nullable|max:200',
            'comunica_palabras_sueltas' => 'nullable|max:200',
            'comunica_gestos' => 'nullable|max:200',
            'entiende_dice' => 'nullable|max:200',
            'desconocidos_entienden' => 'nullable|max:200',
            'tipo_parto' => 'nullable|max:200',
            'suf_fetal' => 'nullable|max:200',
            'edad_gest' => 'nullable|max:200',
            'lugar_naci' => 'nullable|max:200',
            'peso' => 'nullable|max:200',
            'talla' => 'nullable|max:200',
            'apgar' => 'nullable|max:200',
            'comp_parto' => 'nullable|max:200',
            'hospitalizaciones' => 'nullable|max:200',
            'otros_perinatales' => 'nullable|max:200',
            'plan_embarazo' => 'nullable|max:200',
            'acept_embarazo' => 'nullable|max:200',
            'control_embarazo' => 'nullable|max:200',
            'ingesta_med' => 'nullable|max:200',
            'ingesta_oh_drogas' => 'nullable|max:200',
            'consumo_cigarrillo' => 'nullable|max:200',
            'estado_emocional' => 'nullable|max:200',
            'enfermedades_embarazo' => 'nullable|max:200',
            'otros_prenatales' => 'nullable|max:200',
            'control_cabeza' => 'nullable|max:200',
            'sento' => 'nullable|max:200',
            'paro' => 'nullable|max:200',
            'gateo' => 'nullable|max:200',
            'camino' => 'nullable|max:200',
            'control_esf_diurno' => 'nullable|max:200',
            'control_esf_nocturno' => 'nullable|max:200',
            'respeta_normas' => 'nullable|max:200',
            'comparte_juguetes' => 'nullable|max:200',
            'juega_otros' => 'nullable|max:200',
            'carinoso' => 'nullable|max:200',
            'berrinches' => 'nullable|max:200',
            'frustra_facil' => 'nullable|max:200',
            'irritable' => 'nullable|max:200',
            'agresivo' => 'nullable|max:200',
            'peleador' => 'nullable|max:200',
            'intereses' => 'nullable|max:200',
            'observaciones_social' => 'nullable|max:200',
            'alergias_sn' => 'nullable|max:200',
            'alergias_desc' => 'nullable|max:200',
            'obesidad_sn' => 'nullable|max:200',
            'obesidad_desc' => 'nullable|max:200',
            'otitis_sn' => 'nullable|max:200',
            'otitis_desc' => 'nullable|max:200',
            'diabetes_sn' => 'nullable|max:200',
            'diabetes_desc' => 'nullable|max:200',
            'cirugias_sn' => 'nullable|max:200',
            'cirugias_desc' => 'nullable|max:200',
            'traumatis_sn' => 'nullable|max:200',
            'traumatis_desc' => 'nullable|max:200',
            'epilepsia_sn' => 'nullable|max:200',
            'epilepsia_desc' => 'nullable|max:200',
            'deficit_visual_sn' => 'nullable|max:200',
            'deficit_visual_desc' => 'nullable|max:200',
            'deficit_auditivo_sn' => 'nullable|max:200',
            'deficit_auditivo_desc' => 'nullable|max:200',
            'paralisis_cerebral_sn' => 'nullable|max:200',
            'paralisis_cerebral_desc' => 'nullable|max:200',
            'otros_morbidos' => 'nullable|max:200',
            'diabetes_sn_mor_fa' => 'nullable|max:200',
            'hipertension_sn' => 'nullable|max:200',
            'epilepsia_sn_mor_fa' => 'nullable|max:200',
            'deficiencia_mental_sn' => 'nullable|max:200',
            'autismo_sn' => 'nullable|max:200',
            'trast_lenguaje_sn' => 'nullable|max:200',
            'trast_aprendizaje_sn' => 'nullable|max:200',
            'trast_visuales_sn' => 'nullable|max:200',
            'trast_auditivos_sn' => 'nullable|max:200',
            'trast_psiquiatricos_sn' => 'nullable|max:200',
            'observaciones_parientes' => 'nullable|max:200',
            'nombre1' => 'nullable|max:200',
            'parentesco1' => 'nullable|max:200',
            'edad1' => 'nullable|max:200',
            'escolaridad1' => 'nullable|max:200',
            'ocupacion1' => 'nullable|max:200',
            'nombre2' => 'nullable|max:200',
            'parentesco2' => 'nullable|max:200',
            'edad2' => 'nullable|max:200',
            'escolaridad2' => 'nullable|max:200',
            'ocupacion2' => 'nullable|max:200',
            'nombre3' => 'nullable|max:200',
            'parentesco3' => 'nullable|max:200',
            'edad3' => 'nullable|max:200',
            'escolaridad3' => 'nullable|max:200',
            'ocupacion3' => 'nullable|max:200',
            'nombre4' => 'nullable|max:200',
            'parentesco4' => 'nullable|max:200',
            'edad4' => 'nullable|max:200',
            'escolaridad4' => 'nullable|max:200',
            'ocupacion4' => 'nullable|max:200',
            'nombre5' => 'nullable|max:200',
            'parentesco5' => 'nullable|max:200',
            'edad5' => 'nullable|max:200',
            'escolaridad5' => 'nullable|max:200',
            'ocupacion5' => 'nullable|max:200',
            'nombre6' => 'nullable|max:200',
            'parentesco6' => 'nullable|max:200',
            'edad6' => 'nullable|max:200',
            'escolaridad6' => 'nullable|max:200',
            'ocupacion6' => 'nullable|max:200',
            'trat_post_parto' => 'nullable|max:200',
            'tipo_alimenta' => 'nullable|max:200',
            'limite_edad_alimenta' => 'nullable|max:200',
            'operaciones_edad' => 'nullable|max:200',
            'observaciones_postnatales' => 'nullable|max:200',
            'hospitalizaciones_edad' => 'nullable|max:200',
        ];
        return $rules;
    }



}
