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
    public function create($id)
    {
        return view('area-medica.ficha-evaluacion-inicial.fonoaudiologia.create')
            ->with(compact('id'));
    }



}
