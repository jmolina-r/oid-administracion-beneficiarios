<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeneficiarioController extends Controller
{
    public function getRegistrar()
    {
        //Colecciones vacias de prueba
        $paises = collect();
        $estados_civiles = collect();

        return view('beneficiario.crear-beneficiario')
        ->with(compact('paises'))
        ->with(compact('estados_civiles'));
    }

    public function getEditar($id)
    {
        return view('beneficiario.editar-beneficiario');
    }

    public function getPerfil($id)
    {
        return view('beneficiario.perfil-beneficiario');
    }

    public function getBuscar()
    {
        return view('beneficiario.obtener-beneficiario');
    }
}
