<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeneficiarioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //Colecciones vacias de prueba

        //Lista de Paises
        $paises = collect();

        //Lista de Estados Civiles
        $estados_civiles = collect();

        //Previsiones, especificamente AFP
        $previsiones = collect();

        //Situacin actual, cesante, estudiante, etc...
        $situaciones = collect();

        //Niveles de educacion, basico, universitario, etc...
        $niveles_educacion = collect();


        return view('beneficiario.crear-beneficiario')
        ->with(compact('paises'))
        ->with(compact('estados_civiles'))
        ->with(compact('previsiones'))
        ->with(compact('situaciones'))
        ->with(compact('niveles_educacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
    * Show the form for finding a resourse
    *
    * @return Response
    */
    public function find()
    {
        return view('beneficiario.obtener-beneficiario');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('beneficiario.perfil-beneficiario');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('beneficiario.editar-beneficiario');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
