<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use Illuminate\Http\Request;

class MallaController extends Controller
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
     * @param $id
     * @return view
     */
    public function create($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return view
     */
    public function store(Request $request)
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function show()
    {
        return view('malla.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
