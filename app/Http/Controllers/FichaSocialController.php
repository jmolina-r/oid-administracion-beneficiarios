<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use App\TipoAyudaTecnicoSocial;
use App\TipoSubmotivoSocial;
use Illuminate\Http\Request;

class FichaSocialController extends Controller
{
    public function index() {
        return view('social.asistenteSocial');
    }

    public function store(Request $request){
        $rut = $request -> input('rut');
        $beneficiario = Beneficiario::where('rut',$rut)->first();
        if(isset($beneficiario)){
            return view('social.asistenteSocialMenu', compact('beneficiario'));
        }else{
            echo "Usuario invalido";
            return view('social.asistenteSocial');
        }

    }

    public function index2(){

        return view('social.asistenteSocialVisitaDomiciliaria');
    }

    public function index3(){

        return view('social.asistenteSocialBeca');
    }

    public function index4(){

        $tipoSubmotivoSocial = TipoSubmotivoSocial::get();
        return view('social.asistenteSocialOrientacion')
            ->with(compact('tipoSubmotivoSocial'));
    }

    public function index5(){

        $tipoAyudaTecnicoSocial = TipoAyudaTecnicoSocial::get();
        return view('social.asistenteSocialAyudaTecnica')
            ->with(compact('tipoAyudaTecnicoSocial'));

    }
}
