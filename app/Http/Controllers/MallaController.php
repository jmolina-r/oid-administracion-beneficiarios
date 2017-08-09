<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use App\HoraAgendada;
use App\Prestacion;
use App\PrestacionRealizada;
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

        $contentHeight = 286;
        $minTime = '08:00:00';
        $maxTime = '17:00:00';
        $slotDuration = '00:45:00';
        $slotLabelInterval = 1;

        return view('malla.show')
            ->with(compact('contentHeight'))
            ->with(compact('minTime'))
            ->with(compact('maxTime'))
            ->with(compact('slotDuration'))
            ->with(compact('slotLabelInterval'));
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

            $horaSeparada = explode(':',$horaAgendada->hora);

            $hora = $horaSeparada[0];
            $minutos = (int)$horaSeparada[1] + 45;

            if($minutos >= 60){
                $hora = ((int)$horaSeparada[0] + 1);
                $minutos = $minutos - 60;

                if($hora < 10){
                    $hora = '0'.$hora;
                }

                if($minutos < 10){
                    $minutos = '0'.$minutos;
                }
            }

            $horaEnd = $hora.':'.$minutos;

            $e = array();
            $e['id'] = $horaAgendada->id;
            $e['title'] = $beneficiario->nombre;
            $e['start'] = $horaAgendada->fecha.'T'.$horaAgendada->hora;
            $e['end'] = $horaAgendada->fecha.'T'.$horaEnd;
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

    public function getNombreCompleto(Request $request){

        $idHora = $request->input('id');
        $hora = HoraAgendada::where('id', $idHora)->first();
        $idBeneficiario = $hora->beneficiario_id;
        $beneficiarioEncontrado = Beneficiario::where('id', $idBeneficiario)->first();

        return $beneficiarioEncontrado->nombre . " " . $beneficiarioEncontrado->apellido;

    }

    public function storePrestaciones(Request $request){

        //necesito el id para borrar la hora
        $idHora = $request->input('idHoraAgendada');
        $jsonPrestaciones = $request->input('jsonPrestaciones');

        $horaAgendada = HoraAgendada::where('id', $idHora)->first();


        foreach ($jsonPrestaciones as $prestacionRegistro){

            $prestacionRealizada = new PrestacionRealizada([
               'beneficiario_id' => $horaAgendada->beneficiario_id,
                'prestacions_id' => $prestacionRegistro['id'],
                'fecha' => date('Y-m-d')
            ]);
            $prestacionRealizada->save();
        }

        $horaAgendada->delete();

        return;
    }

}
