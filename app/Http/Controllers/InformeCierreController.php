<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformeCierreController extends Controller
{
    public function create($id) {
        return view('area-medica.informe-cierre.buscarUser');
    }

    public function showUser(Request $request){

        $this->validate($request, ['rut' => 'required|exists:beneficiarios,rut']);
        $beneficiario = Beneficiario::where('rut',$request->input('rut'))->first();
        $timestamp = strtotime($beneficiario->fecha_nacimiento);
        $now = strtotime(date("Y-m-d"));
        $edad = idate('Y', $now) - idate('Y', $timestamp);;
        return view('area-medica.informe-cierre.createInformeCierre', compact('beneficiario','edad'));
    }

    public function store(Request $request){

        $this->validate($request, ['cant_sesiones','fecha_inicio','fecha_termino' => 'required']);
        $var = $request->input('ben_id');
        //return $request->all();
        $informe_cierre = new InformeCierre([
            'cant_sesiones' => strtolower($request->input('cant_sesiones')),
            'fecha_inicio' => $request->input('fecha_inicio'),
            'fecha_termino' => $request->input('fecha_termino'),
            'motivo_atencion' => strtolower($request->input('motivo_atencion')),
            'objetivos_trabajados' => $request->input('objetivos_trabajados'),
            'desercion' => $request->input('desercionar'),
            'culmino_proceso' => $request->input('culminar_proceso'),
            'observacion' => $request->input('observaciones_sugerencias'),
            'beneficiario_id' => $var,
            'prestacion_realizada_id' => '1'
        ]);
        $informe_cierre->save();
        return view('area-medica.informe-cierre.buscarUser')->with('info','Se ha ingresado con éxito la visita');
    }
}
