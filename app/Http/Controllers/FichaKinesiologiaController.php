<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FichaKinesiologiaController extends Controller
{
    public function getIngresar()
    {
        return view('medica.ficha-evaluacion-inicial.kinesiologia.ingresar');
    }

    public function postIngresar(Request $request)
    {
        $this->validate($request, [
            'nombreBenificiario' => 'required',
            'rutBeneficiario' => 'required',

        ]);

        return view('user.login');
    }
}
