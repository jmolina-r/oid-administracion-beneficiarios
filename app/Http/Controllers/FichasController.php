<?php

namespace App\Http\Controllers;

use App\FichaKinesiologia;
use App\FichaPsicologia;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FichasController extends Controller
{
    /**
     *
     *
     * @return Response
     */
    public function listaFichas($id)
    {
        if (Auth::check())
        {
            $idUsuario = Auth::user()->id;
        }

        $fichas = array();

        if(Auth::user()->hasRole('kinesiologia')){
            array_merge($fichas, FichaKinesiologia::where('beneficiario_id', $id)->where('user_id', $idUsuario)->get()->toArray());
        }

        if(Auth::user()->hasRole('psicologia')){
            array_merge($fichas, FichaPsicologia::where('beneficiario_id', $id)->get()->toArray());
        }

        if(Auth::user()->hasRole('fonoaudiologia')){
            array_merge($fichas, FichaFonoaudiologiaController::where('beneficiario_id', $id)->get()->toArray());
        }

        if(Auth::user()->hasRole('terapia_ocupacional')){
            array_merge($fichas, FichaTerapiaOcupacionalController::where('beneficiario_id', $id)->get()->toArray());
        }

        return view('area-medica.ficha-evaluacion-inicial.fichas.listaFichas', compact('fichas'));
            ->with(compact('idUsuario'));
    }

    /**
     *
     *
     * @return Response
     */
    public function listaPrestacionesRealizadas()
    {
        $prestaciones = Prestacion::orderBy('area', $direction = 'asc')->get();

        return view('malla.listaPrestaciones', compact('prestaciones'));
    }
}
