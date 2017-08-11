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

        $fichasKinesiologia = array();
        if(Auth::user()->hasRole('kinesiologia')){
            $fichasKinesiologia = FichaKinesiologia::where('beneficiario_id', $id)->get();
        }

        $fichasPsicologia = array();
        if(Auth::user()->hasRole('psicologia')){
            $fichasPsicologia= FichaPsicologia::where('beneficiario_id', $id)->get();
        }

        $fichasFonoaudiologia = array();
        if(Auth::user()->hasRole('fonoaudiologia')){
            $fichasFonoaudiologia = FichaFonoaudiologiaController::where('beneficiario_id', $id)->get();
        }

        $fichasTerapiaOcuacional = array();
        if(Auth::user()->hasRole('terapia_ocupacional')){
            $fichasTerapiaOcuacional = FichaTerapiaOcupacionalController::where('beneficiario_id', $id)->get();
        }

        return view('area-medica.ficha-evaluacion-inicial.fichas.listaFichas')
            ->with(compact('fichasKinesiologia'))
            ->with(compact('fichasPsicologia'))
            ->with(compact('fichasFonoaudiologia'))
            ->with(compact('fichasTerapiaOcuacional'));
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
