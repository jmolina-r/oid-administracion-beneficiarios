<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FichaFonoaudiologiaController extends Controller
{

    /**
     * Mostrar formulario de ingreso de evaluacion inicial.
     *
     * @return view
     */
    public function getIngresar()
    {
        return view('medica.ficha-evaluacion-inicial.fonoaudiologia.ingresar');
    }

}
