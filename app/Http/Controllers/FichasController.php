<?php

namespace App\Http\Controllers;

use App\FichaFonoaudiologia;
use App\FichaKinesiologia;
use App\FichaPsicologia;
use App\FichaTerapiaOcupacional;
use App\Funcionario;
use App\PrestacionRealizada;
use App\TipoFuncionario;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FichasController extends Controller
{
    /**
     *
     *
     * @return Response
     */
    public function listaFichas($idBeneficiario)
    {
        $idUsuario = Auth::user()->id;

        $idFuncionario = Auth::user()->funcionario_id;

        if(Auth::user()->hasRole('admin')) {
            $fichasKinesiologia = FichaKinesiologia::where('beneficiario_id', $idBeneficiario)->where('funcionario_id', $idFuncionario)->orderBy('created_at', $direction = 'des')->get();
            $fichasPsicologia= FichaPsicologia::where('beneficiario_id', $idBeneficiario)->where('funcionario_id', $idFuncionario)->orderBy('created_at', $direction = 'des')->get();
            $fichasFonoaudiologia = FichaFonoaudiologia::where('beneficiario_id', $idBeneficiario)->where('funcionario_id', $idFuncionario)->orderBy('created_at', $direction = 'des')->get();
            $fichasTerapiaOcuacional = FichaTerapiaOcupacional::where('beneficiario_id', $idBeneficiario)->where('funcionario_id', $idFuncionario)->orderBy('created_at', $direction = 'des')->get();
        }
        else{
            $fichasKinesiologia = array();
            if(Auth::user()->hasRole('kinesiologia')){
                $fichasKinesiologia = FichaKinesiologia::where('beneficiario_id', $idBeneficiario)->where('funcionario_id', $idFuncionario)->orderBy('created_at', $direction = 'des')->get();
            }

            $fichasPsicologia = array();
            if(Auth::user()->hasRole('psicologia')){
                $fichasPsicologia= FichaPsicologia::where('beneficiario_id', $idBeneficiario)->where('funcionario_id', $idFuncionario)->orderBy('created_at', $direction = 'des')->get();
            }

            $fichasFonoaudiologia = array();
            if(Auth::user()->hasRole('fonoaudiologia')){
                $fichasFonoaudiologia = FichaFonoaudiologia::where('beneficiario_id', $idBeneficiario)->where('funcionario_id', $idFuncionario)->orderBy('created_at', $direction = 'des')->get();
            }

            $fichasTerapiaOcuacional = array();
            if(Auth::user()->hasRole('terapia_ocupacional')){
                $fichasTerapiaOcuacional = FichaTerapiaOcupacional::where('beneficiario_id', $idBeneficiario)->where('funcionario_id', $idFuncionario)->orderBy('created_at', $direction = 'des')->get();
            }
        }

        $funcionario = Funcionario::find($idFuncionario);

        if($funcionario == null){
            $estado = 'abierto';
            $tipoFuncionario = 'no tiene';
        }
        else{
            $tipoFuncionario = TipoFuncionario::find($funcionario->tipo_funcionario_id)->nombre;

            $estado = 'cerrado';
            if($tipoFuncionario == 'kinesiologo' && $fichasKinesiologia != null){
                $estado = $fichasKinesiologia->first()->estado;
            }
            if($tipoFuncionario == 'psicologo' && $fichasPsicologia != null){
                $estado = $fichasKinesiologia->first()->estado;
            }
            if($tipoFuncionario == 'fonoaudiologo' && $fichasFonoaudiologia != null){
                $estado = $fichasKinesiologia->first()->estado;
            }
            if($tipoFuncionario == 'terapeuta ocupacional' && $fichasTerapiaOcuacional != null){
                $estado = $fichasKinesiologia->first()->estado;
            }
        }

        return view('area-medica.ficha-evaluacion-inicial.fichas.listaFichas')
            ->with(compact('estado'))
            ->with(compact('fichasKinesiologia'))
            ->with(compact('fichasPsicologia'))
            ->with(compact('fichasFonoaudiologia'))
            ->with(compact('fichasTerapiaOcuacional'))
            ->with(compact('idBeneficiario'))
            ->with(compact('idUsuario'))
            ->with(compact('tipoFuncionario'));
    }
}
