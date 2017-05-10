<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use Illuminate\Http\Request;

class FichaSocialController extends Controller
{
    public function index() {

        return view('social.asistenteSocial');

    }

    public function findBeneficiario($rut){

        $beneficiario = Beneficiario::find($rut);
        return view('social.asistenteSocial', compact('beneficiario'));
    }


}
