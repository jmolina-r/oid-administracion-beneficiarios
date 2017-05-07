<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeneficiarioController extends Controller
{
    public function getRegistrar()
    {
        return view('beneficiario.crear-beneficiario');
    }

    public function getEditar()
    {
        return view('beneficiario.editar-beneficiario');
    }

    public function getPerfil()
    {
        return view('beneficiario.perfil-beneficiario');
    }

    public function getBuscar()
    {
        return view('beneficiario.obtener-beneficiario');
    }
}
