<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use App\HoraAgendada;
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
        $fecha = $request->input('fecha');
        $hora = $request->input('hora');
        $rut_beneficiario = $request->input('rut');

        $hora_agendada = new HoraAgendada([

        ]);
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
     * @return view
     */
    public function show()
    {
        //obtener el rol por su sesion
        /*
        if (Auth::check())
        {
            $rolUsuario = Auth::user()->rol;
        }
        */

        $contentHeight = 465;
        $minTime = '08:00:00';
        $maxTime = '17:00:00';
        $slotDuration = '00:30:00';

        return view('malla.show')
            ->with(compact('contentHeight'))
            ->with(compact('minTime'))
            ->with(compact('maxTime'))
            ->with(compact('slotDuration'));
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

    /**
     * Poblar malla.
     *
     * @param Request $request
     * @return view
     */
    public function poblar(Request $request)
    {
        // Returning array
        $events = array();

        //$horasAgendadas = HoraAgendada::where();

        //while (){
            $e = array();
            $e['id'] = '1';
            $e['title'] = 'Lo logre !!!!!';
            $e['start'] = '2017-07-23T08:00';
            $e['end'] = '2017-07-23T09:00';
            $e['allDay'] = false;

            // Merge the event array into the return array
            array_push($events, $e);
        //}

        return json_encode($events);
    }
}
