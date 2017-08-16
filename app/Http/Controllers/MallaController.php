<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use App\FichaFonoaudiologia;
use App\FichaKinesiologia;
use App\FichaPsicologia;
use App\FichaTerapiaOcupacional;
use App\Funcionario;
use App\HoraAgendada;
use App\Prestacion;
use App\PrestacionRealizada;
use App\Role;
use App\TipoFuncionario;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;
use Psy\Util\Json;

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
        $id = $request->input('id');

        $beneficiario = Beneficiario::where('rut', $rut_beneficiario)->first();
        $id_beneficiario = $beneficiario->id;

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
        $id = Auth::user()->id;

        $usuarios = null;

        if(Auth::user()->hasAnyRole(['admin', 'secretaria'])){
            $usuarios = DB::table('users')
                ->join('funcionarios', 'users.funcionario_id', '=', 'funcionarios.id')
                ->join('tipo_funcionarios', 'funcionarios.tipo_funcionario_id', '=', 'tipo_funcionarios.id')
                ->select('users.id', 'users.username', 'tipo_funcionarios.nombre')
                ->where('tipo_funcionarios.nombre', '!=', 'secretaria')
                ->where('tipo_funcionarios.nombre', '!=', 'asistente social')
                ->where('tipo_funcionarios.nombre', '!=', 'otro')
                ->get();
        }

        $contentHeight = 286;
        $minTime = '08:00:00';
        $maxTime = '17:00:00';
        $slotDuration = '00:45:00';
        $slotLabelInterval = 1;

        return view('malla.show')
            ->with(compact('usuarios'))
            ->with(compact('id'))
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

        $horasAgendadas = HoraAgendada::where('user_id', $request->input('id'))->get();


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
            $e['title'] = $beneficiario->nombre . " " . $beneficiario->apellido;
            $e['start'] = $horaAgendada->fecha.'T'.$horaAgendada->hora;
            $e['end'] = $horaAgendada->fecha.'T'.$horaEnd;
            $e['allDay'] = false;

            // Merge the event array into the return array
            array_push($eventos, $e);
        }

        $horasAgendadasSoftdeleted = HoraAgendada::onlyTrashed()->where('user_id', $request->input('id'))->where('asist_sn', 'si')->get();

        foreach ($horasAgendadasSoftdeleted as $horaDeleted) {

            $beneficiario = Beneficiario::where('id', $horaDeleted->beneficiario_id)->first();

            $horaSeparada = explode(':',$horaDeleted->hora);

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

            $f = array();
            $f['id'] = $horaDeleted->id;
            $f['title'] = $beneficiario->nombre . " " . $beneficiario->apellido . " (REALIZADO)";
            $f['start'] = $horaDeleted->fecha.'T'.$horaDeleted->hora;
            $f['end'] = $horaDeleted->fecha.'T'.$horaEnd;
            $f['allDay'] = false;
            $f['color'] = "green";
            $f['realizado'] = true;


            // Merge the event array into the return array
            array_push($eventos, $f);
        }

        $horasAgendadasInasistencia = HoraAgendada::onlyTrashed()->where('user_id', $request->input('id'))
            ->where('asist_sn', 'no')->get();

        foreach ($horasAgendadasInasistencia as $horaDeleted) {

            $beneficiario = Beneficiario::where('id', $horaDeleted->beneficiario_id)->first();

            $horaSeparada = explode(':',$horaDeleted->hora);

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

            $f = array();
            $f['id'] = $horaDeleted->id;
            $f['title'] = $beneficiario->nombre . " " . $beneficiario->apellido . " (INASISTENTE)";
            $f['start'] = $horaDeleted->fecha.'T'.$horaDeleted->hora;
            $f['end'] = $horaDeleted->fecha.'T'.$horaEnd;
            $f['allDay'] = false;
            $f['color'] = "red";
            $f['realizado'] = true;


            // Merge the event array into the return array
            array_push($eventos, $f);
        }
        return json_encode($eventos);
    }

    public function registroPrestacion($id){

        return view('malla.showIngresoPrestacion')->with(compact('id'));

    }

    public function registroInasistencia($id){
        return view('malla.showIngresoInasistencia')->with(compact('id'));
    }

    public function storeInasistencia(Request $request){

        $idHora = $request->input('id');
        $coment = $request->input('comentario');

        $hora = HoraAgendada::where('id', $idHora)->first();

        $hora->asist_sn = 'no';
        $hora->razon_inasis = $coment;
        $hora->save();
        $hora->delete();

        return;

    }

    public function getPrestacionesProfesional(Request $request){

        if (Auth::check())
        {
            $id = Auth::user()->id;
        }

        $prestacionesConsolidadas = array();

        $user = User::where('id', $id)->first();
        $funcionario = $user->funcionario()->get()->first();
        $tipo = $funcionario->tipo_funcionario()->get()->first();

        if($tipo->nombre == 'secretaria'){
            return "";
        }

        $prestacionSegunTipo = Prestacion::where('area', $tipo->nombre)->get();

        foreach ($prestacionSegunTipo as $prestacionTipo){
            array_push($prestacionesConsolidadas, $prestacionTipo);
        }

        return json_encode($prestacionesConsolidadas);
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

        if (Auth::check())
        {
            $id = Auth::user()->id;
        }

        $user = User::where('id', $id)->first();
        $funcionario = $user->funcionario()->get()->first();
        $idFuncionario = $funcionario->id;

        foreach ($jsonPrestaciones as $prestacionRegistro){

            $prestacionRealizada = new PrestacionRealizada([
                'funcionario_id' => $idFuncionario,
                'beneficiario_id' => $horaAgendada->beneficiario_id,
                'prestacions_id' => $prestacionRegistro['id'],
                'fecha' => date('Y-m-d')
            ]);
            $prestacionRealizada->save();
        }

        $horaAgendada->asist_sn = "si";
        $horaAgendada->save();
        $horaAgendada->delete();

        return;
    }


    /**
     *
     *
     * @return Response
     */
    public function listaPrestaciones()
    {
        $prestaciones = Prestacion::orderBy('area', $direction = 'asc')->get();

        return view('malla.listaPrestaciones', compact('prestaciones'));
    }

    /**
     *
     *
     * @return Response
     */
    public function crearPrestacion()
    {
        return view('malla.crearPrestacion');
    }

    /**
     *
     *
     *
     * @param Request $request
     * @return Response
     */
    public function guardarPrestacion(Request $request)
    {
        $this->validate($request, $this->rules($request));

        try{
            $prestacion = new Prestacion([
                'nombre' => $request->input('nombre'),
                'area' => $request->input('area')
            ]);
            $prestacion->save();
        }
        catch(Exception $e){

            //procedimiento en caso de reportar errores

        }

        return view('malla.crearPrestacion');
    }

    public function checkFicha(Request $request)
    {
        $idHora = $request->input('idHora');
        $hora = HoraAgendada::where('id', $idHora)->first();
        $idBeneficiario = $hora->beneficiario_id;

        $user = User::find($hora->user_id);
        $funcionario = Funcionario::find($user->funcionario_id);
        $tipo = TipoFuncionario::find($funcionario->tipo_funcionario_id);

        $nombreTipo = $tipo->nombre;

        if($nombreTipo == "kinesiologo"){

            $fichasKine = FichaKinesiologia::where('beneficiario_id', $idBeneficiario)
                ->where('funcionario_id', $funcionario->id)
                ->where('estado', "abierto")->get();

            if(count($fichasKine) == 0){
                return "false";
            }else{
                return "true";
            }

        }

        if($nombreTipo == "psicologo"){
            $fichasPsico = FichaPsicologia::where('beneficiario_id', $idBeneficiario)
                ->where('funcionario_id', $funcionario->id)
                ->where('estado', "abierto")->get();

            if(count($fichasPsico) == 0){
                return "false";
            }else{
                return "true";
            }
        }

        if($nombreTipo == "fonoaudiologo"){
            $fichasFono = FichaFonoaudiologia::where('beneficiario_id', $idBeneficiario)
                ->where('funcionario_id', $funcionario->id)
                ->where('estado', "abierto")->get();

            if(count($fichasFono) == 0){
                return "false";
            }else{
                return "true";
            }
        }

        if($nombreTipo == "terapeuta ocupacional"){
            $fichasTo = FichaTerapiaOcupacional::where('beneficiario_id', $idBeneficiario)
                ->where('funcionario_id', $funcionario->id)
                ->where('estado', "abierto")->get();

            if(count($fichasTo) == 0){
                return "false";
            }else{
                return "true";
            }
        }

        return "false";

    }

    public function validarUsuario(Request $request)
    {
        if (Auth::check())
        {
            $id = Auth::user()->id;
        }

        $usuario = User::where('id', $id)->first();

        $rol = $usuario->role;



        if($rol->nombre == 'secretaria' || $rol->nombre == 'admin'){
            return "true";
        }



        return "false";
    }

    public function puedeAtender(Request $request)
    {
        if (Auth::check())
        {
            $id = Auth::user()->id;
        }

        $usuario = User::where('id', $id)->first();

        $rol = $usuario->role;



        if($rol->nombre == 'psicologia'
            || $rol->nombre == 'kinesiologia'
            || $rol->nombre == 'trabajo_social'
            || $rol->nombre == 'terapia_ocupacional'
            || $rol->nombre == 'fonoaudiologia'){
            return "true";
        }


        return "false";
    }

    /**
     *
     *
     * @param  int  $id
     * @return Response
     */
    public function confirmarEliminarPrestacion($id)
    {
        $prestacion = Prestacion::find($id);

        return view('malla.confirmarEliminarPrestacion', compact('prestacion'));
    }

    /**
     *
     *
     * @param Request $request
     * @return Response
     */
    public function eliminarPrestacion(Request $request)
    {
        $prestacion = Prestacion::find($request->id);

        $prestacion->delete();

        $prestaciones = Prestacion::orderBy('area', $direction = 'asc')->get();

        return view('malla.listaPrestaciones', compact('prestaciones'));
    }

    public function eliminarHora(Request $request)
    {
        $idHora = $request->input('idHora');
        $horaAgendada = HoraAgendada::where('id', $idHora)->first();
        $horaAgendada->forceDelete();

        return;
    }

    private function rules(Request $request)
    {
        $rules = [
            'nombre' => 'required|max:200',
            'area' => 'required|max:200'
        ];
        return $rules;
    }

    public function getArea(Request $request){

        if (Auth::check())
        {
            $id = Auth::user()->id;
        }

        $user = User::where('id', $id)->first();

        return $user->role->nombre;

    }
}
