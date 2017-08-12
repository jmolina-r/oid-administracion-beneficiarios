<?php

namespace App\Http\Controllers;

use App\FichaFonoaudiologia;
use App\FichaKinesiologia;
use App\FichaPsicologia;
use App\FichaTerapiaOcupacional;
use App\PrestacionRealizada;
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
            $fichasKinesiologia = FichaKinesiologia::where('beneficiario_id', $id)->where('user_id', $idUsuario)->orderBy('created_at', $direction = 'des')->get();
        }

        $fichasPsicologia = array();
        if(Auth::user()->hasRole('psicologia')){
            $fichasPsicologia= FichaPsicologia::where('beneficiario_id', $id)->where('user_id', $idUsuario)->get();
        }

        $fichasFonoaudiologia = array();
        if(Auth::user()->hasRole('fonoaudiologia')){
            $fichasFonoaudiologia = FichaFonoaudiologia::where('beneficiario_id', $id)->where('user_id', $idUsuario)->get();
        }

        $fichasTerapiaOcuacional = array();
        if(Auth::user()->hasRole('terapia_ocupacional')){
            $fichasTerapiaOcuacional = FichaTerapiaOcupacional::where('beneficiario_id', $id)->where('user_id', $idUsuario)->get();
        }

        return view('area-medica.ficha-evaluacion-inicial.fichas.listaFichas')
            ->with(compact('fichasKinesiologia'))
            ->with(compact('fichasPsicologia'))
            ->with(compact('fichasFonoaudiologia'))
            ->with(compact('fichasTerapiaOcuacional'))
            ->with(compact('id'))
            ->with(compact('idUsuario'));
    }

    /**
     *
     *
     * @param $id
     * @return Response
     */
    public function listaPrestacionesRealizadas($idUser, $idBeneficiario, $idFicha)
    {
        $prestacionesRealizadas = PrestacionRealizada::where('user_id', $idUser)->where('beneficiario_id', $idBeneficiario)->orderBy('fecha', $direction = 'des')->get();

        return view('malla.listaPrestaciones', compact('$prestacionesRealizadas'));
    }
}
