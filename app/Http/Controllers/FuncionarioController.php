<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\User;
use App\Role;

use Illuminate\Http\Request;

class FuncionarioController extends Controller
{

    private function rules(Request $request)
    {
        $rules = [
            'apellido' => 'required|max:200',
            'nombre' => 'required|max:200',
            'educacion' => 'required|exists:educacions,id',
            'email' => 'nullable|email',
            'fecha_nacimiento' => 'required|date_format:"d/m/Y"|before:"today"',
            'telefono' => 'nullable|numeric',
        ];

        foreach ($request->input('tipo_discapacidad') as $key => $val) {
            $rules['tipo_discapacidad.'.$key] = 'required|numeric|between:0,100';
        }
        return $rules;
    }
}
