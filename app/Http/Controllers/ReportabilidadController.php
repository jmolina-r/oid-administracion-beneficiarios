<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use App\MotivoAtencionSocial;
use App\SubMotivoAtencionSocial;
use App\TipoAyudaTecnicoSocial;
use App\TipoSubmotivoSocial;
use App\TipoMotivoSocial;
use Illuminate\Http\Request;

class ReportabilidadController extends Controller
{
    public function index() {
        return view('social.asistenteSocial');
    }

    public function show(Request $request){
    
        return view('reportabilidad.createFichaPaciente');
    /*
        $this->validate($request, ['rut' => 'required|exists:beneficiarios,rut']);
        $beneficiario = Beneficiario::where('rut',$request->input('rut'))->first();
                         
        $tipoMotivoSocial = TipoMotivoSocial::get();
        $tipoSubmotivoSocial = TipoSubmotivoSocial::get();
        $tipoAyudaTecnicoSocial = TipoAyudaTecnicoSocial::get();
        return view('reportabilidad.createFichaPaciente', compact('tipoMotivoSocial','tipoSubmotivoSocial','tipoAyudaTecnicoSocial','beneficiario'));   
    */
    }

    public function showResults(Request $request){
        return view('reportabilidad.createFichaPaciente');
        /*$this->validate($request, ['rut' => 'required|exists:beneficiarios,rut']);
        $beneficiario = Beneficiario::where('rut',$request->input('rut'))->first();
                         
        $tipoMotivoSocial = TipoMotivoSocial::get();
        $tipoSubmotivoSocial = TipoSubmotivoSocial::get();
        $tipoAyudaTecnicoSocial = TipoAyudaTecnicoSocial::get();
        return view('reportabilidad.showEstadistica', compact('tipoMotivoSocial','tipoSubmotivoSocial','tipoAyudaTecnicoSocial','beneficiario'));   
    */
    }
 
    
}