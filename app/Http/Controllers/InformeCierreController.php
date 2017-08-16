<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use App\FichaFonoaudiologia;
use App\FichaKinesiologia;
use App\FichaPsicologia;
use App\FichaTerapiaOcupacional;
use App\Funcionario;
use App\InformeCierre;
use App\TipoFuncionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InformeCierreController extends Controller
{
    public function create($idFuncionario, $idBeneficiario, $idFicha) {

        $beneficiario = Beneficiario::find($idBeneficiario);

        $timestamp = strtotime($beneficiario->fecha_nacimiento);
        $now = strtotime(date("Y-m-d"));
        $edad = idate('Y', $now) - idate('Y', $timestamp);

        $funcionario = Funcionario::find($idFuncionario);

        $tipoFuncionario = TipoFuncionario::find($funcionario->tipo_funcionario_id);

        if($tipoFuncionario->nombre == "kinesiologo"){
            $ficha = FichaKinesiologia::find($idFicha);
        }
        if($tipoFuncionario->nombre == "psicologo"){
            $ficha = FichaPsicologia::find($idFicha);
        }
        if($tipoFuncionario->nombre == "fonoaudiologo"){
            $ficha = FichaFonoaudiologia::find($idFicha);
        }
        if($tipoFuncionario->nombre == "terapeuta ocupacional"){
            $ficha = FichaTerapiaOcupacional::find($idFicha);
        }

        if($ficha->estado == 'cerrado'){
            return view('home');
        }

        $motivoAtencion = $ficha->motivo_consulta;
        $fechaInicio = $ficha->created_at->format('d-m-Y');
        $fechaTermino = date('d-m-Y');

        $prestacionesRealizadas = DB::table('prestacion_realizadas')
            ->where('funcionario_id', Auth::user()->funcionario_id)
            ->where('beneficiario_id', $idBeneficiario)
            ->where('prestacion_realizadas.created_at', '>=', $ficha->created_at)
            ->where('prestacion_realizadas.created_at', '<=', date("Y-m-d H:i:s"))
            ->join('prestacions', 'prestacions.id', '=', 'prestacion_realizadas.prestacions_id')
            ->select('prestacions.nombre')
            ->get();

        $ficha = $idFicha;
        $area = $tipoFuncionario->nombre;

        return view('area-medica.informe-cierre.create')
            ->with(compact('ficha'))
            ->with(compact('area'))
            ->with(compact('beneficiario'))
            ->with(compact('edad'))
            ->with(compact('motivoAtencion'))
            ->with(compact('fechaInicio'))
            ->with(compact('fechaTermino'))
            ->with(compact('prestacionesRealizadas'));
    }

    public function store(Request $request){

        $this->validate($request, ['desercion' => 'required' ,'culminar_proceso' => 'required']);

        if($request->input('area') == "kinesiologo"){
            $ficha = FichaKinesiologia::find($request->input('ficha'));
        }
        if($request->input('area') == "psicologo"){
            $ficha = FichaPsicologia::find($request->input('ficha'));
        }
        if($request->input('area') == "fonoaudiologo"){
            $ficha = FichaFonoaudiologia::find($request->input('ficha'));
        }
        if($request->input('area') == "terapeuta ocupacional"){
            $ficha = FichaTerapiaOcupacional::find($request->input('ficha'));
        }

        try{
            $informe_cierre = new InformeCierre([
                'desercion' => $request->input('desercion'),
                'culmino_proceso' => $request->input('culminar_proceso'),
                'observacion' => $request->input('observaciones_sugerencias'),
                'ficha' => $request->input('ficha'),
                'area' => $request->input('area'),
                'beneficiario_id' => $request->input('idBeneficiario')
            ]);
            $informe_cierre->save();

            $ficha->estado = 'cerrado';
            $ficha->save();
        }
        catch(Exception $e){

            //procedimiento en caso de reportar errores

        }
        return redirect(route('area-medica.ficha-evaluacion-inicial.fichas.listaFichas', $request->input('idBeneficiario')));
    }

    public function show($idFuncionario, $idBeneficiario, $idFicha) {
        $beneficiario = Beneficiario::find($idBeneficiario);

        $timestamp = strtotime($beneficiario->fecha_nacimiento);
        $now = strtotime(date("Y-m-d"));
        $edad = idate('Y', $now) - idate('Y', $timestamp);

        $funcionario = Funcionario::find($idFuncionario);

        $tipoFuncionario = TipoFuncionario::find($funcionario->tipo_funcionario_id);

        if($tipoFuncionario->nombre == "kinesiologo"){
            $fichaInicial = FichaKinesiologia::find($idFicha);
        }
        if($tipoFuncionario->nombre == "psicologo"){
            $fichaInicial = FichaPsicologia::find($idFicha);
        }
        if($tipoFuncionario->nombre == "fonoaudiologo"){
            $fichaInicial = FichaFonoaudiologia::find($idFicha);
        }
        if($tipoFuncionario->nombre == "terapeuta ocupacional"){
            $fichaInicial = FichaTerapiaOcupacional::find($idFicha);
        }

        $fichaCierre = InformeCierre::where('area', $tipoFuncionario->nombre)->where('ficha', $idFicha)->where('beneficiario_id', $idBeneficiario)->get();

        $motivoAtencion = $fichaInicial->motivo_consulta;
        $fechaInicio = $fichaInicial->created_at->format('d-m-Y');
        $fechaTermino = date('d-m-Y');

        $prestacionesRealizadas = DB::table('prestacion_realizadas')
            ->where('funcionario_id', Auth::user()->funcionario_id)
            ->where('beneficiario_id', $idBeneficiario)
            ->where('prestacion_realizadas.created_at', '>=', $fichaInicial->created_at)
            ->where('prestacion_realizadas.created_at', '<=', date("Y-m-d H:i:s"))
            ->join('prestacions', 'prestacions.id', '=', 'prestacion_realizadas.prestacions_id')
            ->select('prestacions.nombre')
            ->get();

        $ficha = $idFicha;
        $area = $tipoFuncionario->nombre;

        return view('area-medica.informe-cierre.create')
            ->with(compact('ficha'))
            ->with(compact('area'))
            ->with(compact('beneficiario'))
            ->with(compact('edad'))
            ->with(compact('motivoAtencion'))
            ->with(compact('fechaInicio'))
            ->with(compact('fechaTermino'))
            ->with(compact('prestacionesRealizadas'));
    }
}
