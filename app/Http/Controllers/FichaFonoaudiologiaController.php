<?php

namespace App\Http\Controllers;

use App\AntecedentesPerinatalesFono;
use App\ParienteHogarFono;
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

    public function postAgregarPariente(Request $request)
    {
        \Debugbar::warning('Watch out…');
        $parienteHogarFono = new ParienteHogarFono([
            'nombre' => $request->input('nombre'),
            'parentesco' => $request->input('parentesco'),
            'edad' => $request->input('edad'),
            'escolaridad' => $request->input('escolaridad'),
            'ocupacion' => $request->input('ocupacion'),
        ]);

        return $parienteHogarFono->toJson();

    }

    public function postFono(Request $request){

        $antecedentesPerinatalesFono = new AntecedentesPerinatalesFono([
            'tipo_parto' => $request->input('tipoParto'),
            'suf_fetal' => $request->input('sufrimientoFatal'),
            'edad_gest' => $request->input('edadGestacional'),
            'lugar_naci' => $request->input('lugarNacimiento'),
            'peso' => $request->input('peso'),
            'talla' => $request->input('talla'),
            'apgar' => $request->input('apgar'),
            'comp_parto' => $request->input('complicaciones')
        ]);

        $antecedentesPerinatalesFono->save();
        return $antecedentesPerinatalesFono->toJson();

    }

}
