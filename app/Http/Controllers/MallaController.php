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
use Symfony\Component\VarDumper\Caster\DateCaster;
use \Validator;
use App\Malla;

class MallaController extends Controller
{

    private $contentHeight = 223;
    private $minTime = '08:00:00';
    private $maxTime = '17:00:00';
    private $slotDuration = '00:60:00';
    private $slotLabelInterval = 1;

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
    public function create($id, $fecha, $hora)
    {
        //redireccionar a vista createAgendaHora
        return view('malla.CreateAgendarHora')
            ->with(compact('id'))
            ->with(compact('fecha'))
            ->with(compact('hora'));
    }

    /**
     * Almacena una nueva hora en la agenda del usuario seleccionado.
     *
     * @param Request $request
     * @return view
     */
    public function store(Request $request)
    {
        //id del usuario-funcionario
        $id = $request->input('id_funcionario');

        $fecha = $request->input('fecha');
        $cantSesiones = $request->input('cantSesiones');
        if ($cantSesiones == 0) {
            $cantSesiones = 1;
        }

        $jsonBeneficiariosSeleccionados = $request->input('jsonBeneficiariosSeleccionados');

        //Agenda horas segun cantidad de repeticiones
        for ($i = 0; $i < $cantSesiones; $i++) {
            //almacenar hora
            $hora_agendada = new HoraAgendada([
                'tipo' => $request->input('tipo'),
                'hora' => $request->input('hora'),
                'fecha' => $fecha,
                'user_id' => $id //id del usuario-funcionario
            ]);

            //almacenar hora
            $hora_agendada->save();
            $id_hora = $hora_agendada->id;

            foreach ($jsonBeneficiariosSeleccionados as $BeneficiarioRegistro) {
                $malla = new Malla([
                    'beneficiario_id' => $BeneficiarioRegistro['beneficiario_id'],
                    'hora_agendada_id' => $id_hora
                ]);
                //almacenar relacion con beneficiario
                $malla->save();
            }
            //aumentar fecha + 7dias
            $fecha = new \DateTime($fecha);
            $fecha->modify('+7 days');
            $fecha = $fecha->format('Y-m-d');
        }

        return redirect()->route('malla.showMalla', [
            'id' => $id,
            'contentHeight' => $this->contentHeight,
            'minTime' => $this->minTime,
            'maxTime' => $this->maxTime,
            'slotDuration' => $this->slotDuration,
            'slotLabelInterval' => $this->slotLabelInterval
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
     * Selección de usuario especifico al que se desea consultar su malla.
     *
     * @return view
     */
    public function show2()
    {
        //id del usuario que inicio sesión
        //$id = Auth::user()->id;

        //obtener listado de usuarios
        $usuarios = $this->getUsuarios();

        return view('malla.show2')
            ->with(compact('usuarios'))
            ->with(compact('id')); //id del usuario con inicio de sesión
    }

    /**
     * Obtener usuarios del de rol: Kinesiologia, Terapia ocupacional, Psicologia, Fonoaudiologia.
     *
     * @return usuarios
     */
    public function getUsuarios()
    {
        $usuarios = null;
        //obtener usuarios para el select
        if (Auth::user()->hasAnyRole(['admin', 'secretaria'])) {
            //obtener los usuarios a los que se les puede agendar una hora.
            $usuarios = DB::table('users')
                ->join('funcionarios', 'users.funcionario_id', '=', 'funcionarios.id')
                ->join('tipo_funcionarios', 'funcionarios.tipo_funcionario_id', '=', 'tipo_funcionarios.id')
                ->select('users.id', 'users.username', 'funcionario_id', 'tipo_funcionarios.nombre')
                ->where('tipo_funcionarios.nombre', '!=', 'secretaria')
                ->where('tipo_funcionarios.nombre', '!=', 'asistente social')
                ->where('tipo_funcionarios.nombre', '!=', 'otro')
                ->get();
        }
        return $usuarios;
    }

    /**
     * Muestra la malla de atención para el usuario especificado.
     *
     * @return view
     */
    public function showMalla($id)
    {
        //configuracion  calendario
        $contentHeight = $this->contentHeight;
        $minTime = $this->minTime;
        $maxTime = $this->maxTime;
        $slotDuration = $this->slotDuration;
        $slotLabelInterval = $this->slotLabelInterval;

        //id del usuario que inicio sesión
        //$id = Auth::user()->id;

        return view('malla.showMalla')
            ->with(compact('id'))//id del usuario con inicio de sesión
            ->with(compact('contentHeight'))
            ->with(compact('minTime'))
            ->with(compact('maxTime'))
            ->with(compact('slotDuration'))
            ->with(compact('slotLabelInterval'));
    }

    /**
     * Display the specified resource.
     *
     * @return view
     */
    public function show()
    {
        //configuracion  calendario
        $contentHeight = $this->contentHeight;
        $minTime = $this->minTime;
        $maxTime = $this->maxTime;
        $slotDuration = $this->slotDuration;
        $slotLabelInterval = $this->slotLabelInterval;

        //id del usuario que inicio sesión
        $id = Auth::user()->id;

        $usuarios = null;

        if (Auth::user()->hasAnyRole(['admin', 'secretaria'])) {
            //obtener los usuarios a los que se les puede agendar una hora.
            $usuarios = DB::table('users')
                ->join('funcionarios', 'users.funcionario_id', '=', 'funcionarios.id')
                ->join('tipo_funcionarios', 'funcionarios.tipo_funcionario_id', '=', 'tipo_funcionarios.id')
                ->select('users.id', 'users.username', 'tipo_funcionarios.nombre')
                ->where('tipo_funcionarios.nombre', '!=', 'secretaria')
                ->where('tipo_funcionarios.nombre', '!=', 'asistente social')
                ->where('tipo_funcionarios.nombre', '!=', 'otro')
                ->get();

        }

        return view('malla.show')
            ->with(compact('usuarios'))
            ->with(compact('id'))//id del usuario con inicio de sesión
            ->with(compact('contentHeight'))
            ->with(compact('minTime'))
            ->with(compact('maxTime'))
            ->with(compact('slotDuration'))
            ->with(compact('slotLabelInterval'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //datos basicos de la hora agendada
        $hora_agendada = HoraAgendada::where('id', $id)->first();
        $fecha = $hora_agendada->fecha;
        $hora = $hora_agendada->hora;
        $tipo = $hora_agendada->tipo;
        $user_id = $hora_agendada->user_id;
        // se obtienen los beneficiarios asociados
        $horas_agendadas = Malla::where('hora_agendada_id', $hora_agendada->id)->get();

        //obtener las prestaciones asociadas al area del usuario
        $area = User::where('id', $hora_agendada->user_id)->first()->getTipoFuncionario();
        $prestaciones = Prestacion::where('area', $area)->get();


        return view('malla.editAgendarHora')
            ->with(compact('user_id'))//id hora agendada
            ->with(compact('id'))
            ->with(compact('fecha'))
            ->with(compact('hora'))
            ->with(compact('tipo'))
            ->with(compact('prestaciones'))
            ->with(compact('horas_agendadas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Request $request)
    {

        $jsonBeneficiarios = $request->input('jsonBeneficiarios');
        $id = $request->input('id_hora_agendada'); //id hora agendada
        //$idUser =HoraAgendada::where('id',$id)->first()->user_id;
        //$area = User::where('id',$idUser)->first()->getTipoFuncionario();

        foreach ($jsonBeneficiarios as $BeneficiarioRegistro) {
            //obtener malla
            $idBeneficiario = $BeneficiarioRegistro['beneficiario_id'];
            $malla = Malla::where('hora_agendada_id', $id)->where('beneficiario_id',$idBeneficiario)->first();
            //registrar asistencia
            $malla->asist_sn = $BeneficiarioRegistro['asistencia'];
            //registrar prestacion

                $malla->prestacion_id = $BeneficiarioRegistro['prestacion'];

            $malla->save();

        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        $idHora = $request->input('idHora');
        $malla = Malla::where('hora_agendada_id', $idHora)->delete();
        $hora =HoraAgendada::where('id',$idHora)->delete();

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
        $idFuncionario = $request->input('id');


        if (Auth::check()) {
            $id = Auth::user()->id;
        }
        //se obtienen las horas agendadas del usuario seleccionado
        $horasAgendadas = HoraAgendada::where('user_id', $idFuncionario)->get();


        foreach ($horasAgendadas as $horaAgendada) {


            //$beneficiario = Beneficiario::where('id', $horaAgendada->beneficiario_id)->first();

            //calculo de hora finalización
            $horaSeparada = explode(':', $horaAgendada->hora);

            //$hora = $horaSeparada[0]+1;
            //$minutos = (int)$horaSeparada[1] + 45;

            //if($minutos >= 60){
            //    $hora = ((int)$horaSeparada[0] + 1);
            //    $minutos = $minutos - 60;

            //    if($hora < 10){
            //        $hora = '0'.$hora;
            //    }

            //    if($minutos < 10){
            //        $minutos = '0'.$minutos;
            //    }
            //}

            //Obtención de la hora de termino
            if ($horaSeparada[0] < 9) {
                $horaEnd = '0' . ($horaSeparada[0] + 1) . ':' . $horaSeparada[1];
            } else {
                $horaEnd = ($horaSeparada[0] + 1) . ':' . $horaSeparada[1];
            }


            $e = array();
            $e['id'] = $horaAgendada->id;
            if ($horaAgendada->tipo == 'Grupal') {
                $e['title'] = $horaAgendada->tipo;
            } else {
                $idBeneficiario = Malla::where('hora_agendada_id', $horaAgendada->id)->first()->beneficiario_id;
                $beneficiario = Beneficiario::where('id', $idBeneficiario)->first();
                $e['title'] = $beneficiario->nombre . " " . $beneficiario->apellido;
                //$e['title'] = $horaAgendada->id;
            }

            ///$e['title'] = $beneficiario->nombre . " " . $beneficiario->apellido;
            $e['start'] = $horaAgendada->fecha . ' ' . $horaAgendada->hora;
            $e['end'] = $horaAgendada->fecha . ' ' . $horaEnd;
            $e['allDay'] = false;

            // Merge the event array into the return array
            array_push($eventos, $e);
        }

        // se eliminanan las horas realizadas
        //$horasAgendadasSoftdeleted = HoraAgendada::onlyTrashed()->where('user_id', $request->input('id'))->where('asist_sn', 'si')->get();

        //se agregan las horas realizadas con nuevo formato
        /**
         * foreach ($horasAgendadasSoftdeleted as $horaDeleted) {
         *
         * //$beneficiario = Beneficiario::where('id', $horaDeleted->beneficiario_id)->first();
         *
         * $horaSeparada = explode(':', $horaDeleted->hora);
         *
         * $hora = $horaSeparada[0];
         * $minutos = (int)$horaSeparada[1] + 45;
         *
         * if ($minutos >= 60) {
         * $hora = ((int)$horaSeparada[0] + 1);
         * $minutos = $minutos - 60;
         *
         * if ($hora < 10) {
         * $hora = '0' . $hora;
         * }
         *
         * if ($minutos < 10) {
         * $minutos = '0' . $minutos;
         * }
         * }
         *
         * $horaEnd = $hora . ':' . $minutos;
         *
         * $f = array();
         * $f['id'] = $horaDeleted->id;
         * $f['title'] = " (REALIZADO)";
         * //$f['title'] = $beneficiario->nombre . " " . $beneficiario->apellido . " (REALIZADO)";
         * $f['start'] = $horaDeleted->fecha . 'T' . $horaDeleted->hora;
         * $f['end'] = $horaDeleted->fecha . 'T' . $horaEnd;
         * $f['allDay'] = false;
         * $f['color'] = "green";
         * $f['realizado'] = true;
         *
         *
         * // Merge the event array into the return array
         * //array_push($eventos, $f);
         * }
         *
         * $horasAgendadasInasistencia = HoraAgendada::onlyTrashed()->where('user_id', $request->input('id'))
         * ->where('asist_sn', 'no')->get();
         *
         * foreach ($horasAgendadasInasistencia as $horaDeleted) {
         *
         * //$beneficiario = Beneficiario::where('id', $horaDeleted->beneficiario_id)->first();
         *
         * $horaSeparada = explode(':', $horaDeleted->hora);
         *
         * $hora = $horaSeparada[0];
         * $minutos = (int)$horaSeparada[1] + 45;
         *
         * if ($minutos >= 60) {
         * $hora = ((int)$horaSeparada[0] + 1);
         * $minutos = $minutos - 60;
         *
         * if ($hora < 10) {
         * $hora = '0' . $hora;
         * }
         *
         * if ($minutos < 10) {
         * $minutos = '0' . $minutos;
         * }
         * }
         *
         * $horaEnd = $hora . ':' . $minutos;
         *
         * $f = array();
         * $f['id'] = $horaDeleted->id;
         * $f['title'] = " (INASISTENTE)";
         * //$f['title'] = $beneficiario->nombre . " " . $beneficiario->apellido . " (INASISTENTE)";
         * $f['start'] = $horaDeleted->fecha . 'T' . $horaDeleted->hora;
         * $f['end'] = $horaDeleted->fecha . 'T' . $horaEnd;
         * $f['allDay'] = false;
         * $f['color'] = "red";
         * $f['realizado'] = true;
         *
         *
         * // Merge the event array into the return array
         * //array_push($eventos, $f);
         * }
         **/
        return json_encode($eventos);
    }

    public function registroPrestacion($id)
    {

        return view('malla.showIngresoPrestacion')->with(compact('id'));

    }

    public function registroInasistencia($id)
    {
        return view('malla.showIngresoInasistencia')->with(compact('id'));
    }

    public function storeInasistencia(Request $request)
    {

        $idHora = $request->input('id');
        $coment = $request->input('comentario');

        $hora = HoraAgendada::where('id', $idHora)->first();

        $hora->asist_sn = 'no';
        $hora->razon_inasis = $coment;
        $hora->save();
        $hora->delete();

        return;

    }

    public function getPrestacionesProfesional(Request $request)
    {

        if (Auth::check()) {
            $id = Auth::user()->id;
        }

        $prestacionesConsolidadas = array();

        $user = User::where('id', $id)->first();
        $funcionario = $user->funcionario()->get()->first();
        $tipo = $funcionario->tipo_funcionario()->get()->first();

        if ($tipo->nombre == 'secretaria') {
            return "";
        }

        $prestacionSegunTipo = Prestacion::where('area', $tipo->nombre)->get();

        foreach ($prestacionSegunTipo as $prestacionTipo) {
            array_push($prestacionesConsolidadas, $prestacionTipo);
        }

        return json_encode($prestacionesConsolidadas);
    }

    public function getNombreCompleto(Request $request)
    {

        $idHora = $request->input('id');
        $hora = HoraAgendada::where('id', $idHora)->first();
        $idBeneficiario = $hora->beneficiario_id;
        $beneficiarioEncontrado = Beneficiario::where('id', $idBeneficiario)->first();

        return $beneficiarioEncontrado->nombre . " " . $beneficiarioEncontrado->apellido;

    }

    public function storePrestaciones(Request $request)
    {

        //necesito el id para borrar la hora
        $idHora = $request->input('idHoraAgendada');
        $jsonPrestaciones = $request->input('jsonPrestaciones');

        $horaAgendada = HoraAgendada::where('id', $idHora)->first();

        if (Auth::check()) {
            $id = Auth::user()->id;
        }

        $user = User::where('id', $id)->first();
        $funcionario = $user->funcionario()->get()->first();
        $idFuncionario = $funcionario->id;

        foreach ($jsonPrestaciones as $prestacionRegistro) {

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
     * Muestra lista de prestaciones
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
     * @param Request $request
     * @return Response
     */
    public function guardarPrestacion(Request $request)
    {
        $this->validate($request, $this->rules($request));

        try {
            $prestacion = new Prestacion([
                'nombre' => $request->input('nombre'),
                'area' => $request->input('area')
            ]);
            $prestacion->save();
        } catch (Exception $e) {

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

        if ($nombreTipo == "kinesiologo") {

            $fichasKine = FichaKinesiologia::where('beneficiario_id', $idBeneficiario)
                ->where('funcionario_id', $funcionario->id)
                ->where('estado', "abierto")->get();

            if (count($fichasKine) == 0) {
                return "false";
            } else {
                return "true";
            }

        }

        if ($nombreTipo == "psicologo") {
            $fichasPsico = FichaPsicologia::where('beneficiario_id', $idBeneficiario)
                ->where('funcionario_id', $funcionario->id)
                ->where('estado', "abierto")->get();

            if (count($fichasPsico) == 0) {
                return "false";
            } else {
                return "true";
            }
        }

        if ($nombreTipo == "fonoaudiologo") {
            $fichasFono = FichaFonoaudiologia::where('beneficiario_id', $idBeneficiario)
                ->where('funcionario_id', $funcionario->id)
                ->where('estado', "abierto")->get();

            if (count($fichasFono) == 0) {
                return "false";
            } else {
                return "true";
            }
        }

        if ($nombreTipo == "terapeuta ocupacional") {
            $fichasTo = FichaTerapiaOcupacional::where('beneficiario_id', $idBeneficiario)
                ->where('funcionario_id', $funcionario->id)
                ->where('estado', "abierto")->get();

            if (count($fichasTo) == 0) {
                return "false";
            } else {
                return "true";
            }
        }

        return "false";

    }

    public function validarUsuario(Request $request)
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
        }

        $usuario = User::where('id', $id)->first();

        $rol = $usuario->role;


        if ($rol->nombre == 'secretaria' || $rol->nombre == 'admin') {
            return "true";
        }


        return "false";
    }

    public function puedeAtender(Request $request)
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
        }

        $usuario = User::where('id', $id)->first();

        $rol = $usuario->role;


        if ($rol->nombre == 'psicologia'
            || $rol->nombre == 'kinesiologia'
            || $rol->nombre == 'trabajo_social'
            || $rol->nombre == 'terapia_ocupacional'
            || $rol->nombre == 'fonoaudiologia') {
            return "true";
        }


        return "false";
    }

    /**
     *
     * @param  int $id
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

    private function rulesAgendarHora(Request $request)
    {
        $rules = [
            'rut' => 'required|exists:beneficiarios,rut'
        ];
        return $rules;
    }

    public function getArea(Request $request)
    {

        if (Auth::check()) {
            $id = Auth::user()->id;
        }

        $user = User::where('id', $id)->first();

        return $user->role->nombre;

    }


    public function messages()
    {
        return [
            'rut.unique' => 'El Rut del beneficiario no se encuentra registrado en el Sistema.',
        ];
    }
}
