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
        return view('social.asistenteSocialMenu', compact('beneficiario'));
    }

    public function index2(){

        return view('social.asistenteSocialVisitaDomiciliaria');
    }


}
