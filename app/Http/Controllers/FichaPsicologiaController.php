<?php

namespace App\Http\Controllers;

use App\AntecedentesFamiliares;
use App\AntecedentesMedicos;
use App\FichaPsicologia;
use App\Beneficiario;
use App\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $persona = Beneficiario::find($id);

        return view('area-medica.ficha-evaluacion-inicial.psicologia.create')
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
        $this->validate($request, ['motivo_consulta' => 'required']);

        $ultimaFicha = FichaPsicologia::where('beneficiario_id', $request->input('id'))->orderBy('created_at', $direction = 'des');

        if ($ultimaFicha->first() != null) {
            if ($ultimaFicha->first()->estado == 'abierto') {
                return view('area-medica.ficha-evaluacion-inicial.Error');
            }
        }

        // Validate Fields
        $this->validate($request, $this->rules($request));

        if (Auth::check()) {
            $idUsuario = Auth::user()->id;
            $idFuncionario = Auth::user()->funcionario_id;
            if ($idFuncionario == null) {
                return view('area-medica.ficha-evaluacion-inicial.Error');
            }
        }

        try {
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

            $hashName = null;
            if ($request->file('genograma') != null) {
                $request->file('genograma')->store('public/genogramas-psi');
                $hashName = $request->file('genograma')->hashName();
            }
            $fichaPsicologia = new FichaPsicologia([
                'motivo_consulta' => $request->input('motivo_consulta'),
                'estado' => 'abierto',
                'genograma' => $hashName,
                'antecedentes_medicos_id' => $antecedentesMedicos->id,
                'antecedentes_familiares_id' => $antecedentesFamiliares->id,
                'funcionario_id' => $idFuncionario,
                'beneficiario_id' => $request->input('id'),
            ]);
            $fichaPsicologia->save();
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
     * Mostrar formulario de ingreso de evaluacion inicial.
     *
     * @return Response
     */
    public function show($id)
    {
        $fichaPsicologia = FichaPsicologia::find($id);

        if ($fichaPsicologia == null) {
            return view('area-medica.ficha-evaluacion-inicial.Error');
        }

        $persona = Beneficiario::find($fichaPsicologia->beneficiario_id);
        $funcionario = Funcionario::find($fichaPsicologia->funcionario_id);
        $antecedentesMedicos = AntecedentesMedicos::find($fichaPsicologia->antecedentes_medicos_id);
        $antecedentesFamiliares = AntecedentesFamiliares::find($fichaPsicologia->antecedentes_familiares_id);


        return view('area-medica.ficha-evaluacion-inicial.psicologia.show', compact('fichaPsicologia'))
            ->with(compact('persona'))
            ->with(compact('antecedentesMedicos'))
            ->with(compact('antecedentesFamiliares'))
            ->with(compact('funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($fichaId)
    {
        $fichaPsicologia = FichaPsicologia::find($fichaId);

        if ($fichaPsicologia == null) {
            return view('area-medica.ficha-evaluacion-inicial.Error');
        }

        //Validar que no se puedan editar fichas cerradas.
        if ($fichaPsicologia != null) {
            if ($fichaPsicologia->estado == 'cerrado') {
                return view('area-medica.ficha-evaluacion-inicial.Error');
            }
        }

        $persona = Beneficiario::find($fichaPsicologia->beneficiario_id);
        $funcionario = Funcionario::find($fichaPsicologia->funcionario_id);
        $antecedentesMedicos = AntecedentesMedicos::find($fichaPsicologia->antecedentes_medicos_id);
        $antecedentesFamiliares = AntecedentesFamiliares::find($fichaPsicologia->antecedentes_familiares_id);


        return view('area-medica.ficha-evaluacion-inicial.psicologia.edit', compact('fichaPsicologia'))
            ->with(compact('persona'))
            ->with(compact('antecedentesMedicos'))
            ->with(compact('antecedentesFamiliares'))
            ->with(compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
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

        $fichaPsicologia = FichaPsicologia::find($request->input('fichaId'));
        $antecedentesMedicos = AntecedentesMedicos::find($fichaPsicologia->antecedentes_medicos_id);
        $antecedentesFamiliares = AntecedentesFamiliares::find($fichaPsicologia->antecedentes_familiares_id);

        $hashName = null;
        if ($request->file('genograma') != null) {
            $request->file('genograma')->store('public/genogramas-psi');
            $hashName = $request->file('genograma')->hashName();
        }

        try {

            $fichaPsicologia->motivo_consulta = $request->input('motivo_consulta');
            if($hashName!=null) {
                $fichaPsicologia->genograma = $hashName;
            }
            $fichaPsicologia->save();

            $antecedentesMedicos->enfermedades_familiares = $request->input('enfermedades_familiares');
            $antecedentesMedicos->medicamentos = $request->input('medicamentos');
            $antecedentesMedicos->tratamientos_neurologo_nombre = $request->input('tratamientos_neurologo_nombre');
            $antecedentesMedicos->tratamientos_neurologo_sesiones = $request->input('tratamientos_neurologo_sesiones');
            $antecedentesMedicos->tratamientos_psiquiatra_nombre = $request->input('tratamientos_psiquiatra_nombre');
            $antecedentesMedicos->tratamientos_psiquiatra_sesiones = $request->input('tratamientos_psiquiatra_sesiones');
            $antecedentesMedicos->tratamientos_fonoaudiologo_nombre = $request->input('tratamientos_fonoaudiologo_nombre');
            $antecedentesMedicos->tratamientos_fonoaudiologo_sesiones = $request->input('tratamientos_fonoaudiologo_sesiones');
            $antecedentesMedicos->tratamientos_ocupacional_nombre = $request->input('tratamientos_ocupacional_nombre');
            $antecedentesMedicos->tratamientos_ocupacional_sesiones = $request->input('tratamientos_ocupacional_sesiones');
            $antecedentesMedicos->tratamientos_kinesiologo_nombre = $request->input('tratamientos_kinesiologo_nombre');
            $antecedentesMedicos->tratamientos_kinesiologo_sesiones = $request->input('tratamientos_kinesiologo_sesiones');
            $antecedentesMedicos->tratamientos_psicologo_nombre = $request->input('tratamientos_psicologo_nombre');
            $antecedentesMedicos->tratamientos_psicologo_sesiones = $request->input('tratamientos_psicologo_sesiones');
            $antecedentesMedicos->save();

            $antecedentesFamiliares->nombre_madre = $request->input('nombre_madre');
            $antecedentesFamiliares->edad_madre = $request->input('edad_madre');
            $antecedentesFamiliares->rut_madre = $request->input('rut_madre');
            $antecedentesFamiliares->fecha_nacimiento_madre = $request->input('fecha_nacimiento_madre');
            $antecedentesFamiliares->escolaridad_madre = $request->input('escolaridad_madre');
            $antecedentesFamiliares->telefono_madre = $request->input('telefono_madre');
            $antecedentesFamiliares->ocupacion_madre = $request->input('ocupacion_madre');
            $antecedentesFamiliares->observaciones_madre = $request->input('observaciones_madre');
            $antecedentesFamiliares->nombre_padre = $request->input('nombre_padre');
            $antecedentesFamiliares->edad_padre = $request->input('edad_padre');
            $antecedentesFamiliares->rut_padre = $request->input('rut_padre');
            $antecedentesFamiliares->fecha_nacimiento_padre = $request->input('fecha_nacimiento_padre');
            $antecedentesFamiliares->escolaridad_padre = $request->input('escolaridad_padre');
            $antecedentesFamiliares->telefono_padre = $request->input('telefono_padre');
            $antecedentesFamiliares->ocupacion_padre = $request->input('ocupacion_padre');
            $antecedentesFamiliares->observaciones_padre = $request->input('observaciones_padre');
            $antecedentesFamiliares->save();

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
            'motivo_consulta' => 'nullable|max:20000',
            'enfermedades_familiares' => 'nullable|max:200',
            'tratamientos_neurologo_nombre' => 'nullable|max:200',
            'tratamientos_neurologo_sesiones' => 'nullable|max:200',
            'tratamientos_psiquiatra_nombre' => 'nullable|max:200',
            'tratamientos_psiquiatra_sesiones' => 'nullable|max:200',
            'tratamientos_fonoaudiologo_nombre' => 'nullable|max:200',
            'tratamientos_fonoaudiologo_sesiones' => 'nullable|max:200',
            'tratamientos_ocupacional_nombre' => 'nullable|max:200',
            'tratamientos_ocupacional_sesiones' => 'nullable|max:200',
            'tratamientos_kinesiologo_nombre' => 'nullable|max:200',
            'tratamientos_kinesiologo_sesiones' => 'nullable|max:200',
            'tratamientos_psicologo_nombre' => 'nullable|max:200',
            'tratamientos_psicologo_sesiones' => 'nullable|max:200',
            'medicamentos' => 'nullable|max:200',
            'nombre_madre' => 'nullable|max:200',
            'edad_madre' => 'nullable|max:200',
            'ocupacion_madre' => 'nullable|max:200',
            'escolaridad_madre' => 'nullable|max:200',
            'telefono_madre' => 'nullable|max:200',
            'observaciones_madre' => 'nullable|max:20000',
            'fecha_nacimiento_madre' => 'nullable|max:200',
            'rut_madre' => 'nullable|max:200',
            'nombre_padre' => 'nullable|max:200',
            'edad_padre' => 'nullable|max:200',
            'ocupacion_padre' => 'nullable|max:200',
            'escolaridad_padre' => 'nullable|max:200',
            'telefono_padre' => 'nullable|max:200',
            'observaciones_padre' => 'nullable|max:20000',
            'fecha_nacimiento_padre' => 'nullable|max:200',
            'rut_padre' => 'nullable|max:200',
            'genograma' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        return $rules;
    }
}
