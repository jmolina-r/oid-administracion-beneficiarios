<?php

namespace App\Http\Controllers;

use App\AntecedentesFamiliares;
use App\AntecedentesMedicos;
use App\FichaPsicologia;
use Illuminate\Http\Request;

class FichaPsicologiaController extends Controller
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
        return view('area-medica.ficha-evaluacion-inicial.psicologia.create')
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

        //obtener el psicologo por su sesion
        /*
        if (Auth::check())
        {
            $psicologo = Psicologo::where('rut', Auth::user()->rut);
        }
        */

        try{
            $antecedentesMedicos = new AntecedentesMedicos([
                'enfermedades_familiares' => $request->input('enfermedades_familiares'),
                'tratamientos_neurologo_nombre' => $request->input('tratamientos_neurologo_nombre'),
                'tratamientos_neurologo_sesiones' => $request->input('tratamientos_neurologo_sesiones'),
                'tratamientos_psiquiatra_nombre' => $request->input('tratamientos_psiquiatra_nombre'),
                'tratamientos_psiquiatra_sesiones' => $request->input('tratamientos_psiquiatra_sesiones'),
                'tratamientos_fonoaudiologo_nombre' => $request->input('tratamientos_fonoaudiologo_nombre'),
                'tratamientos_fonoaudiologo_sesiones' => $request->input('tratamientos_fonoaudiologo_sesiones'),
                'tratamientos_ocupacional_nombre' => $request->input('tratamientos_ocupacional_nombre'),
                'tratamientos_ocupacional_sesiones' => $request->input('tratamientos_ocupacional_sesiones'),
                'tratamientos_kinesiologo_nombre' => $request->input('tratamientos_kinesiologo_nombre'),
                'tratamientos_kinesiologo_sesiones' => $request->input('tratamientos_kinesiologo_sesiones'),
                'tratamientos_psicologo_nombre' => $request->input('tratamientos_psicologo_nombre'),
                'tratamientos_psicologo_sesiones' => $request->input('tratamientos_psicologo_sesiones'),
                'medicamentos' => $request->input('medicamentos'),
            ]);
            $antecedentesMedicos->save();

            $antecedentesFamiliares = new AntecedentesFamiliares([
                'nombre_madre' => $request->input('nombre_madre'),
                'rut_madre' => $request->input('rut_madre'),
                'edad_madre' => $request->input('edad_madre'),
                'ocupacion_madre' => $request->input('ocupacion_madre'),
                'escolaridad_madre' => $request->input('escolaridad_madre'),
                'telefono_madre' => $request->input('telefono_madre'),
                'observaciones_madre' => $request->input('observaciones_madre'),
                'fecha_nacimiento_madre' => $request->input('fecha_nacimiento_madre'),
                'nombre_padre' => $request->input('nombre_padre'),
                'rut_padre' => $request->input('rut_padre'),
                'edad_padre' => $request->input('edad_padre'),
                'ocupacion_padre' => $request->input('ocupacion_padre'),
                'escolaridad_padre' => $request->input('escolaridad_padre'),
                'telefono_padre' => $request->input('telefono_padre'),
                'observaciones_padre' => $request->input('observaciones_padre'),
                'fecha_nacimiento_padre' => $request->input('fecha_nacimiento_padre'),
            ]);
            $antecedentesFamiliares->save();

            $fichaPsicologia = new FichaPsicologia([
                'image' => $request->input('image'),
                'antecedentes_medicos_id' => $antecedentesMedicos->id,
                'antecedentes_familiares_id' => $antecedentesFamiliares->id,
                //'psicologo_id' => $psicologo->id,
                'profesional_id' => '1', //provisional, profesional no esta implementado
                'beneficiario_id' => $request->input('id'),
            ]);
            $fichaPsicologia->save();
        }
        catch(Exception $e){

            //procedimiento en caso de reportar errores

        }
        $id = $request->input('id');
        return view('area-medica.ficha-evaluacion-inicial.psicologia.create')
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
            'enfermedades_familiares' => 'max:200',
            'tratamientos_neurologo_nombre' => 'max:200',
            'tratamientos_neurologo_sesiones' => 'max:200',
            'tratamientos_psiquiatra_nombre' => 'max:200',
            'tratamientos_psiquiatra_sesiones' => 'max:200',
            'tratamientos_fonoaudiologo_nombre' => 'max:200',
            'tratamientos_fonoaudiologo_sesiones' => 'max:200',
            'tratamientos_ocupacional_nombre' => 'max:200',
            'tratamientos_ocupacional_sesiones' => 'max:200',
            'tratamientos_kinesiologo_nombre' => 'max:200',
            'tratamientos_kinesiologo_sesiones' => 'max:200',
            'tratamientos_psicologo_nombre' => 'max:200',
            'tratamientos_psicologo_sesiones' => 'max:200',
            'medicamentos' => 'max:200',
            'nombre_madre' => 'required|max:200',
            'edad_madre' => 'required|numeric|between:0,120',
            'ocupacion_madre' => 'required|max:200',
            'escolaridad_madre' => 'required|max:200',
            'telefono_madre' => 'required|numeric',
            'observaciones_madre' => 'max:200',
            'fecha_nacimiento_madre' => 'required',
            'rut_madre'=> 'required|max:200',
            'nombre_padre' => 'required|max:200',
            'edad_padre' => 'required|numeric|between:0,120',
            'ocupacion_padre' => 'required|max:200',
            'escolaridad_padre' => 'required|max:200',
            'telefono_padre' => 'required|numeric',
            'observaciones_padre' => 'max:200',
            'fecha_nacimiento_padre' => 'required',
            'rut_padre' => 'required|max:200',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        return $rules;
    }
}
