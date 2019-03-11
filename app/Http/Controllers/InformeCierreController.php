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
    public function create($idFuncionario, $idBeneficiario, $idFicha)
    {

        $beneficiario = Beneficiario::find($idBeneficiario);

        $timestamp = strtotime($beneficiario->fecha_nacimiento);
        $now = strtotime(date("Y-m-d"));
        $edad = idate('Y', $now) - idate('Y', $timestamp);

        $funcionario = Funcionario::find($idFuncionario);

        $tipoFuncionario = TipoFuncionario::find($funcionario->tipo_funcionario_id);

        if ($tipoFuncionario->nombre == "Kinesiologo") {
            $ficha = FichaKinesiologia::find($idFicha);
        }
        if ($tipoFuncionario->nombre == "Psicologo") {
            $ficha = FichaPsicologia::find($idFicha);
        }
        if ($tipoFuncionario->nombre == "Fonoaudiologo") {
            $ficha = FichaFonoaudiologia::find($idFicha);
        }
        if ($tipoFuncionario->nombre == "Terapeuta ocupacional") {
            $ficha = FichaTerapiaOcupacional::find($idFicha);
        }

        if ($ficha->estado == 'cerrado') {
            return view('home');
        }

        $motivoAtencion = $ficha->motivo_consulta;
        $fechaInicio = $ficha->created_at->format('d-m-Y');
        $fechaTermino = date('d-m-Y');

        $prestacionesRealizadas = DB::table('mallas')
            ->where('beneficiario_id', $idBeneficiario)
            ->where('mallas.deleted_at','=',null)
            ->join('hora_agendadas', 'mallas.hora_agendada_id', '=', 'hora_agendadas.id')
            ->where('hora_agendadas.user_id', $funcionario->user()->first()->id)
            ->where('hora_agendadas.fecha', '>=', $ficha->created_at->format('Y-m-d'))
            ->where('hora_agendadas.fecha', '<=', date('Y-m-d'))
            ->join('prestacions', 'prestacions.id', '=', 'mallas.prestacion_id')
            ->select('prestacions.nombre')
            ->get();


        //$prestacionesRealizadas = DB::table('prestacion_realizadas')
        //    ->where('funcionario_id', $idFuncionario)
        //    ->where('beneficiario_id', $idBeneficiario)
        //    ->where('prestacion_realizadas.created_at', '>=', $ficha->created_at)
        //    ->where('prestacion_realizadas.created_at', '<=', date("Y-m-d H:i:s"))
        //    ->join('prestacions', 'prestacions.id', '=', 'prestacion_realizadas.prestacions_id')
        //    ->select('prestacions.nombre')
        //    ->get();

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

    public function store(Request $request)
    {

        $this->validate($request, ['desercion' => 'required', 'culminar_proceso' => 'required']);

        if ($request->input('area') == "Kinesiologo") {
            $ficha = FichaKinesiologia::find($request->input('ficha'));
        }
        if ($request->input('area') == "Psicologo") {
            $ficha = FichaPsicologia::find($request->input('ficha'));
        }
        if ($request->input('area') == "Fonoaudiologo") {
            $ficha = FichaFonoaudiologia::find($request->input('ficha'));
        }
        if ($request->input('area') == "Terapeuta ocupacional") {
            $ficha = FichaTerapiaOcupacional::find($request->input('ficha'));
        }

        try {
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
        } catch (Exception $e) {

            //procedimiento en caso de reportar errores

        }
        return redirect(route('area-medica.ficha-evaluacion-inicial.fichas.listaFichas', $request->input('idBeneficiario')));
    }

    public function show($idFuncionario, $idBeneficiario, $idFicha)
    {
        $beneficiario = Beneficiario::find($idBeneficiario);

        $timestamp = strtotime($beneficiario->fecha_nacimiento);
        $now = strtotime(date("Y-m-d"));
        $edad = idate('Y', $now) - idate('Y', $timestamp);

        $funcionario = Funcionario::find($idFuncionario);

        $tipoFuncionario = TipoFuncionario::find($funcionario->tipo_funcionario_id);

        if ($tipoFuncionario->nombre == "Kinesiologo") {
            $fichaInicial = FichaKinesiologia::find($idFicha);
        }
        if ($tipoFuncionario->nombre == "Psicologo") {
            $fichaInicial = FichaPsicologia::find($idFicha);
        }
        if ($tipoFuncionario->nombre == "Fonoaudiologo") {
            $fichaInicial = FichaFonoaudiologia::find($idFicha);
        }
        if ($tipoFuncionario->nombre == "Terapeuta ocupacional") {
            $fichaInicial = FichaTerapiaOcupacional::find($idFicha);
        }

        $fichaCierre = InformeCierre::where('area', $tipoFuncionario->nombre)->where('ficha', $idFicha)->where('beneficiario_id', $idBeneficiario)->first();

        $motivoAtencion = $fichaInicial->motivo_consulta;
        $fechaInicio = $fichaInicial->created_at->format('d-m-Y');
        $fechaTermino = $fichaCierre->created_at->format('d-m-Y');

        $prestacionesRealizadas = DB::table('mallas')
            ->where('beneficiario_id', $idBeneficiario)
            ->where('mallas.deleted_at','=',null)
            ->join('hora_agendadas', 'mallas.hora_agendada_id', '=', 'hora_agendadas.id')
            ->where('hora_agendadas.user_id', $funcionario->user()->first()->id)
            ->where('hora_agendadas.fecha', '>=', $fichaInicial->created_at->format('Y-m-d'))
            ->where('hora_agendadas.fecha', '<=', date('Y-m-d'))
            ->join('prestacions', 'prestacions.id', '=', 'mallas.prestacion_id')
            ->select('prestacions.nombre')
            ->get();


        $ficha = $idFicha;
        $area = $tipoFuncionario->nombre;

        return view('area-medica.informe-cierre.show')
            ->with(compact('ficha'))
            ->with(compact('area'))
            ->with(compact('beneficiario'))
            ->with(compact('edad'))
            ->with(compact('motivoAtencion'))
            ->with(compact('fechaInicio'))
            ->with(compact('fechaTermino'))
            ->with(compact('prestacionesRealizadas'))
            ->with(compact('fichaCierre'));
    }
}
