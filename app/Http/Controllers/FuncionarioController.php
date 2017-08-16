<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\TipoFuncionario;
use App\User;
use App\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class FuncionarioController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tipo_funcionarios = TipoFuncionario::get();

        return view('funcionario.create')
            ->with(compact('tipo_funcionarios'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'rut' => 'required|unique:funcionarios'
        ]);

        // Validate Fields
        $this->validate($request, $this->rules($request));

        // Funcionario Save
        $funcionario = new Funcionario([
            'nombre' => strtolower($request->input('nombre')),
            'apellido' => strtolower($request->input('apellido')),
            'fecha_nacimiento' => date('Y-m-d', strtotime(str_replace('/', '-', $request->input('fecha_nacimiento')))),
            'rut' => $request->input('rut'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
            'email' => $request->input('email'),
            'tipo_funcionario_id' => $request->input('tipo_funcionario'),
        ]);
        $funcionario->save();

        return redirect()->route('funcionario.find');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function find()
    {
        $funcionarios = Funcionario::get();

        return view('funcionario.find')
            ->with(compact('funcionarios'));
    }

    public function funcionarioInfoJson($id)
    {
        return Funcionario::where('id', $id)
            ->with('tipo_funcionario')
            ->first();
    }

    public function edit(Funcionario $funcionario)
    {
        $tipo_funcionarios = TipoFuncionario::get();

        return view('funcionario.edit')
            ->with(compact($funcionario, 'funcionario'))
            ->with(compact('tipo_funcionarios'));
    }

    public function update(Request $request, Funcionario $funcionario)
    {
        $this->validate($request, [
            'rut' => 'required|exists:funcionarios,rut'
        ]);

        // Validate Fields
        $this->validate($request, $this->rules($request));

        // Funcionario Save
        $funcionario->update([
            'nombre' => strtolower($request->input('nombre')),
            'apellido' => strtolower($request->input('apellido')),
            'fecha_nacimiento' => date('Y-m-d', strtotime(str_replace('/', '-', $request->input('fecha_nacimiento')))),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
            'email' => $request->input('email'),
            'tipo_funcionario_id' => $request->input('tipo_funcionario'),
        ]);

        return redirect()->route('funcionario.find');
    }

    private function rules(Request $request)
    {
        $rules = [
            'apellido' => 'required|max:200',
            'nombre' => 'required|max:200',
            'tipo_funcionario' => 'required|exists:tipo_funcionarios,id',
            'email' => 'required|email',
            'fecha_nacimiento' => 'required|date_format:"d/m/Y"|before:"today"',
            'telefono' => 'required|numeric',
            'direccion' => 'required'
        ];
        return $rules;
    }
}
