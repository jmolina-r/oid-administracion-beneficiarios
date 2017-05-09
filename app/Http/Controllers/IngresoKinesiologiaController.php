<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IngresoKinesiologiaController extends Controller
{
    public function getIngresar()
    {
        return view('medica.ficha-evaluacion-inicial.kinesiologia.ingresar');
    }

    public function postIngresar()
    {
        return view('user.login');
    }
}
