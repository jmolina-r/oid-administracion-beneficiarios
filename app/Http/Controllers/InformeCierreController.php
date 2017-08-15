<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use App\FichaFonoaudiologia;
use App\FichaKinesiologia;
use App\FichaPsicologia;
use App\FichaTerapiaOcupacional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformeCierreController extends Controller
{
    public function create($idUsuario, $idBeneficiario, $idFicha) {

        $beneficiario = Beneficiario::find($idBeneficiario);

        $timestamp = strtotime($beneficiario->fecha_nacimiento);
        $now = strtotime(date("Y-m-d"));
        $edad = idate('Y', $now) - idate('Y', $timestamp);

        $tipoFuncionario = DB::table('users')
            ->where('users.id', $idUsuario)
            ->join('funcionarios', 'users.funcionario_id', '=', 'funcionarios.id')
            ->join('tipo_funcionarios', 'funcionarios.tipo_funcionario_id', '=', 'tipo_funcionarios.id')
            ->select('tipo_funcionarios.nombre')
            ->first();

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
        else{
            return view('home');
        }

        if($ficha->estado == 'cerrado'){
            return view('home');
        }

        $MotivoAtencion = $ficha->motivo_consulta;
        $fechaInicio = $ficha->created_at->format('d-m-Y');
        $fechaTermino = date('d-m-Y');

        $prestacionesRealizadas = DB::table('prestacion_realizadas')
            ->where('funcionario_id', Auth::user()->funcionario_id)
            ->where('beneficiario_id', $idBeneficiario)
            ->where('created_at', '>=', $ficha->created_at)
            ->where('created_at', '<=', date("Y-m-d H:i:s"))
            ->get();

        return view('area-medica.informe-cierre.create')
            ->with(compact('idUsuario'))
            ->with(compact('beneficiario'))
            ->with(compact('edad'))
            ->with(compact('MotivoAtencion'))
            ->with(compact('fechaInicio'))
            ->with(compact('fechaTermino'))
            ->with(compact('prestacionesRealizadas'))

            ->with(compact('tipoFuncionario'));
    }

    public function store(Request $request){

        $this->validate($request, ['cant_sesiones','fecha_inicio','fecha_termino' => 'required']);
        $var = $request->input('ben_id');
        //return $request->all();
        $informe_cierre = new InformeCierre([
            'cant_sesiones' => strtolower($request->input('cant_sesiones')),
            'fecha_inicio' => $request->input('fecha_inicio'),
            'fecha_termino' => $request->input('fecha_termino'),
            'motivo_atencion' => strtolower($request->input('motivo_atencion')),
            'objetivos_trabajados' => $request->input('objetivos_trabajados'),
            'desercion' => $request->input('desercionar'),
            'culmino_proceso' => $request->input('culminar_proceso'),
            'observacion' => $request->input('observaciones_sugerencias'),
            'beneficiario_id' => $var
        ]);
        $informe_cierre->save();
        return view('area-medica.informe-cierre.buscarUser')->with('info','Se ha ingresado con éxito la visita');
    }
}
