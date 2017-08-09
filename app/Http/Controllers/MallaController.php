<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use App\HoraAgendada;
use App\Prestacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function MongoDB\BSON\toJSON;

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

        $beneficiario = Beneficiario::where('rut', $rut_beneficiario)->first();
        $id_beneficiario = $beneficiario->id;

        if (Auth::check())
        {
            $id = Auth::user()->id;
        }

        $hora_agendada = new HoraAgendada([
            'beneficiario_id' => $id_beneficiario,
            'asist_sn' => '-',
            'hora' => $hora,
            'fecha' => $fecha,
            'razon_inasis' => '-',
            'user_id' => $id
        ]);

        $hora_agendada->save();
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
            $id = Auth::user()->id;
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
        $eventos = array();

        if (Auth::check())
        {
            $id = Auth::user()->id;
        }

        $horasAgendadas = HoraAgendada::where('user_id', $id)->get();


        foreach ($horasAgendadas as $horaAgendada) {

            $beneficiario = Beneficiario::where('id', $horaAgendada->beneficiario_id)->first();

            $hora = explode(':',$horaAgendada->hora);
            $horaMasUno = ((int)$hora[0]+1).':'.$hora[1];

            if(strlen($horaMasUno) == 4){
                $horaMasUno = '0'.$horaMasUno;
            }

            $e = array();
            $e['id'] = $horaAgendada->id;
            $e['title'] = $beneficiario->nombre;
            $e['start'] = $horaAgendada->fecha.'T'.$horaAgendada->hora;
            $e['end'] = $horaAgendada->fecha.'T'.$horaMasUno;
            $e['allDay'] = false;

            // Merge the event array into the return array
            array_push($eventos, $e);
        }

        return json_encode($eventos);
    }

    public function registroPrestacion($id){

        return view('malla.showIngresoPrestacion')->with(compact('id'));

    }

    public function getPrestacionesProfesional(Request $request){
        $data = Prestacion::all();
        return $data->toJson();
    }

}
