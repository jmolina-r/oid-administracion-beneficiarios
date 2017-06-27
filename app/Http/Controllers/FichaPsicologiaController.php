<?php

namespace App\Http\Controllers;

use App\AntecedentesFamiliares;
use App\AntecedentesMedicos;
use App\FichaPsicologia;
use Illuminate\Http\Request;

class FichaPsicologiaController extends Controller
{
    /**
     * Mostrar formulario de ingreso de evaluacion inicial.
     *
     * @return view
     */
    public function getIngresar()
    {
        return view('medica.ficha-evaluacion-inicial.psicologia.ingresar');
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

        //obtener el psicologo por su sesion
        /*
        if (Auth::check())
        {
            $psicologo = Psicologo::where('rut', Auth::user()->rut);
        }
        */

        try{
            $antecedentesMedicos = new AntecedentesMedicos([
                'diagnostico' => $request->input('diagnostico'),
                'enfermedades_familiares' => $request->input('enfermedades_familiares'),
                'tratamientos_psiquiatra' => $request->input('tratamientos_psiquiatra'),
                'tratamientos_fonoaudiologo' => $request->input('tratamientos_fonoaudiologo'),
                'tratamientos_ocupacional' => $request->input('tratamientos_ocupacional'),
                'tratamientos_kinesiologo' => $request->input('tratamientos_kinesiologo'),
                'tratamientos_psicologo' => $request->input('tratamientos_psicologo'),
                'tratamientos_neurologo' => $request->input('tratamientos_neurologo'),
                'medicamentos' => $request->input('medicamentos'),
            ]);
            $antecedentesMedicos->save();

            $antecedentesFamiliares = new AntecedentesFamiliares([
                'nombre_madre' => $request->input('nombre_madre'),
                'edad_madre' => $request->input('edad_madre'),
                'ocupacion_madre' => $request->input('ocupacion_madre'),
                'escolaridad_madre' => $request->input('escolaridad_madre'),
                'telefono_madre' => $request->input('telefono_madre'),
                'observaciones_madre' => $request->input('observaciones_madre'),
                'fecha_nacimiento_madre' => $request->input('fecha_nacimiento_madre'),
                'nombre_padre' => $request->input('nombre_padre'),
                'edad_padre' => $request->input('edad_padre'),
                'ocupacion_padre' => $request->input('ocupacion_padre'),
                'escolaridad_padre' => $request->input('escolaridad_padre'),
                'telefono_padre' => $request->input('telefono_padre'),
                'observaciones_padre' => $request->input('observaciones_padre'),
                'fecha_nacimiento_padre' => $request->input('fecha_nacimiento_padre'),
            ]);
            $antecedentesFamiliares->save();

            $fichaPsicologia = new FichaPsicologia([
                //'diagnostico' => $beneficiario->diagnostico,
                'diagnostico_base' => 'diagnostico_base', //provisional, diagnostico no esta implementado en beneficiario
                'motivo_consulta' => $request->input('motivo_consulta'),
                'antecedentes_medicos_id' => $antecedentesMedicos->id,
                'antecedentes_familiares_id' => $antecedentesFamiliares->id,
                //'psicologo_id' => $psicologo->id,
                'psicologo_id' => '1', //provisional, psicologo no esta implementado
                'beneficiario_id' => $beneficiario->last()->id,
                //'beneficiario_id' => '1',
            ]);
            $fichaPsicologia->save();
        }
        catch(Exception $e){

            //procedimiento en caso de reportar errores

        }
        return redirect()->route('medica.ficha-evaluacion-inicial.psicologia.ingresar');
    }
}
