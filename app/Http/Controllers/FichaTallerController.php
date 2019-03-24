<?php

namespace App\Http\Controllers;

use App\FichaTaller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Beneficiario;
use App\Funcionario;

class FichaTallerController extends Controller
{
    /**
     * Mostrar formulario de ingreso de evaluacion inicial.
     *
     * @param $id
     * @return view
     */
    public function create($id)
    {
        return view('area-medica.ficha-evaluacion-inicial.tallerista.create')
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
        //$this->validate($request, ['motivo_consulta' => 'required']);

        $ultimaFicha = FichaTaller::where('beneficiario_id', $request->input('id'))->orderBy('created_at', $direction = 'des');

        if($ultimaFicha->first() != null){
            if($ultimaFicha->first()->estado == 'abierto'){
                return view('area-medica.ficha-evaluacion-inicial.Error');
            }
        }

        // Validate Fields
        $this->validate($request, $this->rules($request));

        if (Auth::check())
        {
            $idUsuario = Auth::user()->id;
            $idFuncionario=Auth::user()->funcionario_id;
            if($idFuncionario==null)
            {
                return view('area-medica.ficha-evaluacion-inicial.Error');
            }
        }

        try{

            $fichaTaller = new FichaTaller([
                'nombre_taller' => $request->input('nombre_taller'),
                'estado'=>'abierto',
                'objetivo' => $request->input('objetivo'),
                'funcionario_id' => $idFuncionario,
                'beneficiario_id' => $request->input('id'),
            ]);
            $fichaTaller->save();

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
     * Mostrar formulario de ingreso de evaluacion inicial.
     *
     * @return Response
     */
    public function show($id)
    {
        $fichaTaller = FichaTaller::find($id);

        if($fichaTaller == null){
            return view('area-medica.ficha-evaluacion-inicial.Error');
        }

        $persona = Beneficiario::find($fichaTaller->beneficiario_id);
        $funcionario=Funcionario::find($fichaTaller->funcionario_id);

        return view('area-medica.ficha-evaluacion-inicial.tallerista.show', compact('fichaTaller'))
            ->with(compact('persona'))
            ->with(compact('funcionario'));
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
            'nombre_taller' => 'nullable|max:200',
            'objetivo' => 'nullable|max:200',
        ];
        return $rules;
    }
}
