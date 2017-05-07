<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeneficiarioController extends Controller
{
    public function getRegistrar()
    {
        return view('beneficiario.crear-beneficiario');
    }
}
