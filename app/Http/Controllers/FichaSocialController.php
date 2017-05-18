<?php

namespace App\Http\Controllers;

use App\Beneficiario;
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
        }
        
    }

    public function index2(){

        return view('social.asistenteSocialVisitaDomiciliaria');
    }
    public function index5(){

        return view('social.asistenteSocialAyudaTecnica');
    }


}
