<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use App\CredencialDiscapacidad;
use App\DatoSocial;
use App\FichaAtencionSocial;
use App\FichaBeneficiario;
use App\FichaFonoaudiologia;
use App\FichaKinesiologia;
use App\FichaPsicologia;
use App\FichaTerapiaOcupacional;
use App\Fonasa;
use App\Funcionario;
use App\HoraAgendada;
use App\InformeCierre;
use App\MotivoAtencionSocial;
use App\Prestacion;
use App\PrestacionRealizada;
use App\RegistroSocialHogar;
use App\SubMotivoAtencionSocial;
use App\TipoAyudaTecnicoSocial;
use App\TipoSubmotivoSocial;
use App\TipoMotivoSocial;
use App\Kinesiologo;
use App\TerapeutaOcupacional;
use App\Psicologo;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Isset_;

class ReportabilidadController extends Controller
{
    public function index() {
        $kines = Funcionario::where('tipo_funcionario_id','=',2)->get();
        $terapeutas = Funcionario::where('tipo_funcionario_id','=',4)->get();
        $psicologos = Funcionario::where('tipo_funcionario_id','=',1)->get();
        $fonoaudiologos = Funcionario::where('tipo_funcionario_id','=',5)->get();
        return view('reportabilidad.menuReportabilidad', compact('kines','terapeutas','psicologos', 'fonoaudiologos'));

    }

    public function createInformeCierre() {
        return view('area-medica.informe-cierre.buscarUser');
    }

    public function showUser(Request $request){

        $this->validate($request, ['rut' => 'required|exists:beneficiarios,rut']);
        $beneficiario = Beneficiario::where('rut',$request->input('rut'))->first();
        $timestamp = strtotime($beneficiario->fecha_nacimiento);
        $now = strtotime(date("Y-m-d"));
        $edad = idate('Y', $now) - idate('Y', $timestamp);;
        return view('area-medica.informe-cierre.createInformeCierre', compact('beneficiario','edad'));
    }

    public function postInformeCierre(Request $request){

        $this->validate($request, ['cant_sesiones','fecha_inicio','fecha_termino' => 'required']);
        $var = $request->input('ben_id');
        //return $request->all();
        $informe_cierre = new InformeCierre([
            'cant_sesiones' => strtolower($request->input('cant_sesiones')),
            'fecha_inicio' => $request->input('fecha_inicio'),
            'fecha_termino' => $request->input('fecha_termino'),
            'motivo_atencion' => strtolower($request->input('motivo_atencion')),
            'objetivos_trabajados' => $request->input('objetivos_trabajados'),
            'desercion' => $request->input('desercionar'),
            'culmino_proceso' => $request->input('culminar_proceso'),
            'observacion' => $request->input('observaciones_sugerencias'),
            'beneficiario_id' => $var,
            'prestacion_realizada_id' => '1'
        ]);
        $informe_cierre->save();
        return view('area-medica.informe-cierre.buscarUser')->with('info','Se ha ingresado con éxito la visita');
    }

    public function showResults(Request $request){

        $cant = Beneficiario::count();
        $masculino = Beneficiario::where('sexo','masculino')->count();
        $fem = Beneficiario::where('sexo','femenino')->count();
        $ingresoAnual=FichaBeneficiario::whereYear('fecha_ingreso', '=', date('Y'))->count();
        $ingresoMensual = FichaBeneficiario::whereYear('fecha_ingreso', '=', date('Y'))
            ->whereMonth('fecha_ingreso', '=', date('m'))
            ->count();

        $atencionAnual=PrestacionRealizada::whereYear('fecha', '=', date('Y'))->count();
        $atencionMensual=PrestacionRealizada::whereYear('fecha', '=', date('Y'))
            ->whereMonth('fecha', '=', date('m'))
            ->count();
        $estimulacionTemprana = Beneficiario::whereYear('fecha_nacimiento','>=',(date('Y')-2))->count();
        $edad3_5= Beneficiario::whereYear('fecha_nacimiento','<=',(date('Y')-3))->whereYear('fecha_nacimiento','>=',(date('Y')-5))->count();
        $edad6_10= Beneficiario::whereYear('fecha_nacimiento','<=',(date('Y')-6))->whereYear('fecha_nacimiento','>=',(date('Y')-10))->count();
        $edad11_20= Beneficiario::whereYear('fecha_nacimiento','<=',(date('Y')-11))->whereYear('fecha_nacimiento','>=',(date('Y')-20))->count();
        $edad21_30= Beneficiario::whereYear('fecha_nacimiento','<=',(date('Y')-21))->whereYear('fecha_nacimiento','>=',(date('Y')-30))->count();
        $edad31_40= Beneficiario::whereYear('fecha_nacimiento','<=',(date('Y')-31))->whereYear('fecha_nacimiento','>=',(date('Y')-40))->count();
        $edad41_50= Beneficiario::whereYear('fecha_nacimiento','<=',(date('Y')-41))->whereYear('fecha_nacimiento','>=',(date('Y')-50))->count();
        $edad51_60= Beneficiario::whereYear('fecha_nacimiento','<=',(date('Y')-51))->whereYear('fecha_nacimiento','>=',(date('Y')-60))->count();
        $edad61_70= Beneficiario::whereYear('fecha_nacimiento','<=',(date('Y')-61))->whereYear('fecha_nacimiento','>=',(date('Y')-70))->count();
        $edad71_80= Beneficiario::whereYear('fecha_nacimiento','<=',(date('Y')-71))->whereYear('fecha_nacimiento','>=',(date('Y')-80))->count();
        $edad81_90= Beneficiario::whereYear('fecha_nacimiento','<=',(date('Y')-81))->whereYear('fecha_nacimiento','>=',(date('Y')-90))->count();
        $edad91_100= Beneficiario::whereYear('fecha_nacimiento','<=',(date('Y')-91))->whereYear('fecha_nacimiento','>=',(date('Y')-100))->count();
        $edad101_110= Beneficiario::whereYear('fecha_nacimiento','<=',(date('Y')-101))->whereYear('fecha_nacimiento','>=',(date('Y')-110))->count();
        $edad111_120= Beneficiario::whereYear('fecha_nacimiento','<=',(date('Y')-111))->whereYear('fecha_nacimiento','>=',(date('Y')-120))->count();

        $porcentajeJoven=0;
        $porcentajeAdulto=0;
        $porcentajeAdultoMayor=0;

        //SALUD FONASA O ISAPRE
        $fonasa=DatoSocial::where('fonasa_id','!=', null)->count();
        $fonasaTramoA= DatoSocial::where('fonasa_id','=',1)->count();
        $fonasaTramoB= DatoSocial::where('fonasa_id','=',2)->count();
        $fonasaTramoC= DatoSocial::where('fonasa_id','=',3)->count();
        $fonasaTramoD= DatoSocial::where('fonasa_id','=',4)->count();
        //isapre
        $isapre=DatoSocial::where('isapre_id','!=', null)->count();
        $isapreCruzBlanca= datoSocial::where('isapre_id','=',1)->count();
        $isapreColmena= datoSocial::where('isapre_id','=',2)->count();
        $isapreMasVida= datoSocial::where('isapre_id','=',3)->count();
        $isapreConsalud= datoSocial::where('isapre_id','=',4)->count();
        $isapreBanmedica= datoSocial::where('isapre_id','=',5)->count();
        $isapreVidaTres= datoSocial::where('isapre_id','=',6)->count();
        $isapreCodelco= datoSocial::where('isapre_id','=',7)->count();
        $isapreDipreca= datoSocial::where('isapre_id','=',8)->count();
        $isapreCapredena= datoSocial::where('isapre_id','=',9)->count();
        $isapreFerroSalud= datoSocial::where('isapre_id','=',10)->count();
        $isapreOtro= datoSocial::where('isapre_id','=',11)->count();

        if($fonasa!=0){
            $porcentajeFonasa = $fonasa*100/$cant;
            $porcentajeFonasaTramoA=$fonasaTramoA*100/$fonasa;
            $porcentajeFonasaTramoB=$fonasaTramoB*100/$fonasa;
            $porcentajeFonasaTramoC=$fonasaTramoC*100/$fonasa;
            $porcentajeFonasaTramoD=$fonasaTramoD*100/$fonasa;
        }else{
            $porcentajeFonasa = 0;
            $porcentajeFonasaTramoA=0;
            $porcentajeFonasaTramoB=0;
            $porcentajeFonasaTramoC=0;
            $porcentajeFonasaTramoD=0;
        }

        //EDUCACION id 1-9
        $preBasico=Beneficiario::where('educacion_id','=',1)->count();
        $basicoIncompleto=Beneficiario::where('educacion_id','=',2)->count();
        $basicoCompleto=Beneficiario::where('educacion_id','=',3)->count();
        $medioIncompleto=Beneficiario::where('educacion_id','=',4)->count();
        $medioCompleto=Beneficiario::where('educacion_id','=',5)->count();
        $tecnicoIncompleto=Beneficiario::where('educacion_id','=',6)->count();
        $tecnicoCompleto=Beneficiario::where('educacion_id','=',7)->count();
        $universitarioIncompleto=Beneficiario::where('educacion_id','=',8)->count();
        $universitarioCompleto=Beneficiario::where('educacion_id','=',9)->count();

        //SITUACION LABORAL id 1-5
        $trabajador=Beneficiario::where('ocupacion_id','=',1)->count();
        $estudiante=Beneficiario::where('ocupacion_id','=',2)->count();
        $duenoCasa=Beneficiario::where('ocupacion_id','=',3)->count();
        $pensionado=Beneficiario::where('ocupacion_id','=',4)->count();
        $cesante=Beneficiario::where('ocupacion_id','=',5)->count();

        //credencial discapacidad
        $credencialEntregada=CredencialDiscapacidad::where('en_tramite','=',0)->count();
        $credencialTramite=CredencialDiscapacidad::where('en_tramite','=',1)->count();

        //registroSocial de Hogares
        $registroSocialTiene=RegistroSocialHogar::where('en_tramite','=',0)->count();
        $registroSocialTramite=RegistroSocialHogar::where('en_tramite','=',1)->count();

        //Participacion en org social
        $participaOrgSocial=DatoSocial::join('dato_social_organizacion_social','dato_socials.id','=','dato_social_organizacion_social.dato_social_id')->count();

        //Rehabilitacion
        $pacientesReahabAnual=InformeCierre::where('culmino_proceso','=','si')
            ->whereYear('fecha_termino','=',(date('Y')))
            ->count();
        $pacientesReahabMensual=InformeCierre::where('culmino_proceso','=','si')
            ->whereYear('fecha_termino','=',(date('Y')))
            ->whereMonth('fecha_termino', '=', date('m'))
            ->count();

        if($cant!=0){
            $porcentajeMasculino = $masculino*100/$cant;
            $porcentajeFemenino=$fem*100/$cant;
            $porcentajeCredencialEntregada=$credencialEntregada*100/$cant;
            $porcentajeCredencialTramite=$credencialTramite*100/$cant;
            $porcentajeIsapre=$isapre*100/$cant;
            $porcentajeRSTiene=$registroSocialTiene*100/$cant;
            $porcentajeRSTramite=$registroSocialTramite*100/$cant;
            $porcentajeParticipaOrgSocial=$participaOrgSocial*100/$cant;
            $porcentajeReahbAnual=$pacientesReahabAnual*100/$cant;
            $porcentajeReahbMensual=$pacientesReahabMensual*100/$cant;
        }else{
            $porcentajeMasculino =0;
            $porcentajeFemenino=0;
            $porcentajeCredencialEntregada=0;
            $porcentajeCredencialTramite=0;
            $porcentajeIsapre=0;
            $porcentajeRSTiene=0;
            $porcentajeRSTramite=0;
            $porcentajeParticipaOrgSocial=0;
            $porcentajeReahbAnual=0;
            $porcentajeReahbMensual=0;
        }

        if(isset($_GET['visualGene'])) {

            return view('reportabilidad.createFichaPaciente', compact('cant', 'porcentajeRSTramite', 'porcentajeRSTiene', 'porcentajeFemenino', 'porcentajeMasculino', 'ingresoAnual', 'ingresoMensual', 'porcentajeCredencialEntregada', 'porcentajeCredencialTramite', 'atencionAnual', 'atencionMensual', 'porcentajeAdulto', 'porcentajeJoven', 'porcentajeAdultoMayor', 'porcentajeFonasa',
                'porcentajeFonasaTramoA', 'porcentajeFonasaTramoB', 'porcentajeFonasaTramoC', 'porcentajeFonasaTramoD', 'porcentajeIsapre', 'preBasico', 'basicoIncompleto', 'basicoCompleto',
                'medioIncompleto', 'medioCompleto', 'tecnicoIncompleto', 'tecnicoCompleto', 'universitarioIncompleto',

                'universitarioCompleto', 'trabajador', 'estudiante', 'duenoCasa', 'pensionado', 'cesante', 'isapreCruzBlanca', 'isapreColmena', 'isapreMasVida', 'isapreConsalud', 'isapreBanmedica', 'isapreVidaTres', 'isapreCodelco',

                'isapreDipreca', 'isapreCapredena', 'isapreFerroSalud', 'isapreOtro','porcentajeParticipaOrgSocial',
                
                'estimulacionTemprana','edad3_5','edad6_10','edad11_20','edad21_30','edad31_40','edad41_50','edad51_60','edad61_70','edad71_80','edad81_90','edad91_100','edad101_110','edad111_120',

                'porcentajeParticipaOrgSocial',
                
                'porcentajeReahbMensual','porcentajeReahbAnual'));

        }

        $view =  \View::make('pdf.invoice', compact('cant', 'porcentajeRSTramite', 'porcentajeRSTiene', 'porcentajeFemenino', 'porcentajeMasculino', 'ingresoAnual', 'ingresoMensual', 'porcentajeCredencialEntregada', 'porcentajeCredencialTramite', 'atencionAnual', 'atencionMensual', 'porcentajeAdulto', 'porcentajeJoven', 'porcentajeAdultoMayor', 'porcentajeFonasa',
            'porcentajeFonasaTramoA', 'porcentajeFonasaTramoB', 'porcentajeFonasaTramoC', 'porcentajeFonasaTramoD', 'porcentajeIsapre', 'preBasico', 'basicoIncompleto', 'basicoCompleto',
            'medioIncompleto', 'medioCompleto', 'tecnicoIncompleto', 'tecnicoCompleto', 'universitarioIncompleto',

            'universitarioCompleto', 'trabajador', 'estudiante', 'duenoCasa', 'pensionado', 'cesante', 'isapreCruzBlanca', 'isapreColmena', 'isapreMasVida', 'isapreConsalud', 'isapreBanmedica', 'isapreVidaTres', 'isapreCodelco',
            'isapreDipreca', 'isapreCapredena', 'isapreFerroSalud', 'isapreOtro','porcentajeParticipaOrgSocial'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');

    }
    public function showResultKine(Request $request){
        //KINE
        $user_rut=$request->kinesiologos;
        $kinesiologo = Funcionario::where('rut',$request->kinesiologos)->first();

        $atencionAnualKine=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=', date('Y'))
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();

        $atencionMensualKine=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=', date('Y'))
            ->whereMonth('prestacion_realizadas.fecha', '=', date('m'))
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();
        $asistenciaKineAnual =HoraAgendada::where('hora_agendadas.asist_sn','=','si')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->join('funcionarios','hora_agendadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();
        $asistenciaKineMensual=HoraAgendada::where('hora_agendadas.asist_sn','=','si')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->join('funcionarios','hora_agendadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();
        $inasistenciaKineAnual =HoraAgendada::where('hora_agendadas.asist_sn','=','no')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->join('funcionarios','hora_agendadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();
        $inasistenciaKineMensual=HoraAgendada::where('hora_agendadas.asist_sn','=','no')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->join('funcionarios','hora_agendadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();

        $prestaciones = Prestacion::all();
        $porcentajePrest=null;
        $nombrePrest=null;
        $i=0;
        foreach ($prestaciones as $p){
        $nombrePrest[$i]=$p->nombre;
        $porcentajePrest[$i]=Prestacion::where('prestacions.id','=',$p->id)
        ->join('prestacion_realizadas','prestacions.id','=','prestacion_realizadas.prestacions_id')
        ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
        ->where('funcionarios.rut','=',$user_rut)
        ->count();
        $i++;
        }

        if(isset($_GET['visualKine'])) {

            return view('reportabilidad.reportabilidadKine', compact('kinesiologo','atencionAnualKine','atencionMensualKine','asistenciaKineAnual','inasistenciaKineAnual','asistenciaKineMensual','inasistenciaKineMensual','porcentajePrest','nombrePrest'));

        }else {

            if (isset($_GET['imprimirReporKine'])) {
                $view =  \View::make('pdf.invoice1', compact('kinesiologo','atencionAnualKine','atencionMensualKine','asistenciaKine','inasistenciaKine'))->render();
                $pdf = \App::make('dompdf.wrapper');
                $pdf->loadHTML($view);
                return $pdf->stream('invoice1');
            }
        }

        $nombres = $_GET["nombres"];
        $apellidos = $_GET["apellidos"];
        $rut = $_GET["rut"];
        $telefono = $_GET["telefono"];
        $direccion = $_GET["direccion"];
        $atencionAnualKine = $_GET["atencionAnualKine"];
        $atencionMensualKine = $_GET["atencionMensualKine"];
        $asistenciaKine = $_GET["asistenciaKine"];
        $inasistenciaKine = $_GET["inasistenciaKine"];
        $view =  \View::make('pdf.invoice1', compact('nombres','apellidos','direccion','rut','telefono','atencionAnualKine','atencionMensualKine','asistenciaKine','inasistenciaKine'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice1');

        //return $request->all();


    }

    public function showResultFono(Request $request){
        //FONO
        $user_rut=$request->fonoaudiologo;
        $fonoaudiologo = Funcionario::where('rut',$request->fonoaudiologo)->first();
        $atencionAnualFono=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=', date('Y'))
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();
        $atencionMensualFono=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=', date('Y'))
            ->whereMonth('prestacion_realizadas.fecha', '=', date('m'))
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();

        $asistenciaFonoAnual =HoraAgendada::where('hora_agendadas.asist_sn','=','si')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->join('funcionarios','hora_agendadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();
        $asistenciaFonoMensual =HoraAgendada::where('hora_agendadas.asist_sn','=','si')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->join('funcionarios','hora_agendadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();
        $inasistenciaFonoAnual =HoraAgendada::where('hora_agendadas.asist_sn','=','no')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->join('funcionarios','hora_agendadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();
        $inasistenciaFonoMensual =HoraAgendada::where('hora_agendadas.asist_sn','=','no')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->join('funcionarios','hora_agendadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();

        $prestaciones = Prestacion::all();
        $porcentajePrest=null;
        $nombrePrest=null;
        $i=0;
        foreach ($prestaciones as $p){
            $nombrePrest[$i]=$p->nombre;
            $porcentajePrest[$i]=Prestacion::where('prestacions.id','=',$p->id)
                ->join('prestacion_realizadas','prestacions.id','=','prestacion_realizadas.prestacions_id')
                ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
                ->where('funcionarios.rut','=',$user_rut)
                ->count();
            $i++;
        }

        return view('reportabilidad.reportabilidadFono', compact('fonoaudiologo','atencionAnualFono','atencionMensualFono','asistenciaFonoAnual','asistenciaFonoMensual','inasistenciaFonoAnual','inasistenciaFonoMensual','porcentajePrest','nombrePrest'));
    }

    public function showResultPsico(Request $request){
        //Psico
        $user_rut=$request->psicologos;
        $psicologo = Funcionario::where('rut',$request->psicologos)->first();
        $atencionAnualPsico=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=', date('Y'))
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();
        $atencionMensualPsico=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=', date('Y'))
            ->whereMonth('prestacion_realizadas.fecha', '=', date('m'))
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();
        $asistenciaPsicoAnual =HoraAgendada::where('hora_agendadas.asist_sn','=','si')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->join('funcionarios','hora_agendadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();
        $asistenciaPsicoMensual=HoraAgendada::where('hora_agendadas.asist_sn','=','si')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->join('funcionarios','hora_agendadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();

        $inasistenciaPsicoAnual =HoraAgendada::where('hora_agendadas.asist_sn','=','no')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->join('funcionarios','hora_agendadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();
        $inasistenciaPsicoMensual =HoraAgendada::where('hora_agendadas.asist_sn','=','no')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->join('funcionarios','hora_agendadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();


        $prestaciones = Prestacion::all();
        $porcentajePrest=null;
        $nombrePrest=null;
        $i=0;
        foreach ($prestaciones as $p){
            $nombrePrest[$i]=$p->nombre;
            $porcentajePrest[$i]=Prestacion::where('prestacions.id','=',$p->id)
                ->join('prestacion_realizadas','prestacions.id','=','prestacion_realizadas.prestacions_id')
                ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
                ->where('funcionarios.rut','=',$user_rut)
                ->count();
            $i++;
        }

        if(isset($_GET['visualSico'])) {
            return view('reportabilidad.reportabilidadPsico', compact('psicologo','atencionAnualPsico','atencionMensualPsico','asistenciaPsicoAnual','asistenciaPsicoMensual','inasistenciaPsicoAnual','inasistenciaPsicoMensual','porcentajePrest','nombrePrest'));
        }/*else {
            if (isset($_GET['imprimirReporSico'])) {

                $view =  \View::make('pdf.invoice2', compact('psicologo','atencionAnualPsico','atencionMensualPsico','asistenciaPsico','inasistenciaPsico'))->render();
                $pdf = \App::make('dompdf.wrapper');
                $pdf->loadHTML($view);
                return $pdf->stream('invoice2');

            }
        }*/

        $nombres = $_GET["nombres"];
        $apellidos = $_GET["apellidos"];
        $rut = $_GET["rut"];
        $telefono = $_GET["telefono"];
        $direccion = $_GET["direccion"];
        $atencionAnualPsico = $_GET["atencionAnualPsico"];
        $atencionMensualPsico = $_GET["atencionMensualPsico"];
        $asistenciaPsico = $_GET["asistenciaPsico"];
        $inasistenciaPsico = $_GET["inasistenciaPsico"];
        $view =  \View::make('pdf.invoice2', compact('nombres','apellidos','direccion','rut','telefono','atencionAnualPsico','atencionMensualPsico','asistenciaPsico','inasistenciaPsico'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice2');
    }

    public function showResultTer(Request $request){

        //terapiaocupacional
        $user_rut=$request->terapeutas;
        $terapeuta = Funcionario::where('rut',$request->terapeutas)->first();
        $atencionAnualTer=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=', date('Y'))
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();
        $atencionMensualTer=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=', date('Y'))
            ->whereMonth('prestacion_realizadas.fecha', '=', date('m'))
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();

        $asistenciaTerAnual =HoraAgendada::where('hora_agendadas.asist_sn','=','si')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->join('funcionarios','hora_agendadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();
        $asistenciaTerMensual=HoraAgendada::where('hora_agendadas.asist_sn','=','si')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->join('funcionarios','hora_agendadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();
        $inasistenciaTerAnual =HoraAgendada::where('hora_agendadas.asist_sn','=','no')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->join('funcionarios','hora_agendadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();
        $inasistenciaTerMensual =HoraAgendada::where('hora_agendadas.asist_sn','=','no')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->join('funcionarios','hora_agendadas.user_id','=','funcionarios.id')
            ->where('funcionarios.rut','=',$user_rut)
            ->count();

        $prestaciones = Prestacion::all();
        $porcentajePrest=null;
        $nombrePrest=null;
        $i=0;
        foreach ($prestaciones as $p){
            $nombrePrest[$i]=$p->nombre;
            $porcentajePrest[$i]=Prestacion::where('prestacions.id','=',$p->id)
                ->join('prestacion_realizadas','prestacions.id','=','prestacion_realizadas.prestacions_id')
                ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
                ->where('funcionarios.rut','=',$user_rut)
                ->count();
            $i++;
        }

        //return view('reportabilidad.reportabilidadTer', compact('terapeuta','atencionAnualTer','atencionMensualTer','asistenciaTer','inasistenciaTer'));

        if(isset($_GET['visualTerap'])) {
            return view('reportabilidad.reportabilidadTer', compact('terapeuta','atencionAnualTer','atencionMensualTer','asistenciaTerAnual','asistenciaTerMensual','inasistenciaTerAnual','inasistenciaTerMensual','porcentajePrest','nombrePrest'));
        }else {
            if (isset($_GET['imprimirReporTerap'])) {

                $view =  \View::make('pdf.invoice3', compact('terapeuta','atencionAnualTer','atencionMensualTer','asistenciaTer','inasistenciaTer'))->render();
                $pdf = \App::make('dompdf.wrapper');
                $pdf->loadHTML($view);
                return $pdf->stream('invoice3');

            }
        }
        $nombres = $_GET["nombres"];
        $apellidos = $_GET["apellidos"];
        $rut = $_GET["rut"];
        $telefono = $_GET["telefono"];
        $direccion = $_GET["direccion"];
        $atencionAnualTer = $_GET["atencionAnualTer"];
        $atencionMensualTer = $_GET["atencionMensualTer"];
        $asistenciaTer = $_GET["asistenciaTer"];
        $inasistenciaTer = $_GET["inasistenciaTer"];
        $view =  \View::make('pdf.invoice3', compact('nombres','apellidos','direccion','rut','telefono','atencionAnualTer','atencionMensualTer','asistenciaTer','inasistenciaTer'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice3');

    }

    public function showResultSoc(Request $request)
    {
        //SOcial
        $atencionAnualSocial = FichaAtencionSocial::whereYear('created_at', '=', date('Y'))
            ->count();
        $atencionMensualSocial = FichaAtencionSocial::whereYear('created_at', '=', date('Y'))
            ->whereMonth('created_at', '=', date('m'))
            ->count();

        if(isset($_GET['visualSoc'])) {
            return view('reportabilidad.reportabilidadSoc', compact('atencionAnualSocial','atencionMensualSocial'));

        }
        $view =  \View::make('pdf.invoice4', compact('atencionAnualSocial','atencionMensualSocial'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice4');

    }

    public function showResultGrupal(Request $request){

       // area mas trabajadora

        $atencionAnualKines=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=', date('Y'))
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',2)
            ->count();

        $atencionMensualKines=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=', date('Y'))
            ->whereMonth('prestacion_realizadas.fecha', '=', date('m'))
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',2)
            ->count();
        $atencionAnualFonos=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=', date('Y'))
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',5)
            ->count();
        $atencionMensualFonos=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=', date('Y'))
            ->whereMonth('prestacion_realizadas.fecha', '=', date('m'))
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',5)
            ->count();
        $atencionAnualPsicos=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=', date('Y'))
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',1)
            ->count();
        $atencionMensualPsicos=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=', date('Y'))
            ->whereMonth('prestacion_realizadas.fecha', '=', date('m'))
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',1)
            ->count();
        $atencionAnualTers=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=', date('Y'))
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',4)
            ->count();
        $atencionMensualTers=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=', date('Y'))
            ->whereMonth('prestacion_realizadas.fecha', '=', date('m'))
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',4)
            ->count();

        return view('reportabilidad.reportabilidadGrupal', compact('atencionAnualKines','atencionMensualKines','atencionAnualFonos','atencionMensualFonos',
            'atencionAnualPsicos','atencionMensualPsicos','atencionAnualTers','atencionMensualTers'));

    }
    public function showResultHistoricaEntreMes(Request $request)
    {    
         $aniouno = $request->aniouno;
          $aniodos = $request->aniodos;
          $mesuno = $request->mesuno;
          $mesdos = $request->mesdos;
          $cantIngresadosAño2 =FichaBeneficiario::whereYear('fecha_ingreso', '>=', $aniouno)
                ->whereYear('fecha_ingreso', '<=', $aniodos)
                ->whereMonth('fecha_ingreso', '>=', $mesuno)
                ->whereMonth('fecha_ingreso', '<=', $mesdos)
                ->count();
        
            $cantAtencionAño2=PrestacionRealizada::whereYear('fecha', '>=',$aniouno)
                ->whereYear('fecha', '<=',$aniodos)
                ->whereMonth('fecha', '>=', $mesuno)
                ->whereMonth('fecha', '<=',$mesdos)
                ->count();
        //atenciones realizadas por los funcionarios en tal periodo
        $atencionKines=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '>=',$aniouno)
            ->whereYear('prestacion_realizadas.fecha', '<=',$aniodos)
            ->whereMonth('prestacion_realizadas.fecha', '>=', $mesuno)
            ->whereMonth('prestacion_realizadas.fecha', '<=', $mesdos)
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',2)
            ->count();
        $atencionFono=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '>=',$aniouno)
            ->whereYear('prestacion_realizadas.fecha', '<=',$aniodos)
            ->whereMonth('prestacion_realizadas.fecha', '>=', $mesuno)
            ->whereMonth('prestacion_realizadas.fecha', '<=', $mesdos)
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',5)
            ->count();
        $atencionPsico=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '>=',$aniouno)
            ->whereYear('prestacion_realizadas.fecha', '<=',$aniodos)
            ->whereMonth('prestacion_realizadas.fecha', '>=', $mesuno)
            ->whereMonth('prestacion_realizadas.fecha', '<=', $mesdos)
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',1)
            ->count();
        $atencionTers=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '>=',$aniouno)
            ->whereYear('prestacion_realizadas.fecha', '<=',$aniodos)
            ->whereMonth('prestacion_realizadas.fecha', '>=', $mesuno)
            ->whereMonth('prestacion_realizadas.fecha', '<=', $mesdos)
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',4)
            ->count();

             return view('reportabilidad.reportabilidadHistEntreMes', compact('cantIngresadosAño2','cantAtencionAño2','aniouno','aniodos','mesuno','mesdos','atencionKines','atencionPsico','atencionFono','atencionTers'));
    }
    public function showResultHistorica(Request $request)
    {
        $anio = $request->anio;
        $mes = $request->mes;
        $cantIngresadosAño = FichaBeneficiario::whereYear('fecha_ingreso', '=', $anio)->wheremonth('fecha_ingreso', '<=', $mes)->count();
        $cantIngresadosMes = FichaBeneficiario::whereYear('fecha_ingreso', '=', $anio)->wheremonth('fecha_ingreso', '=', $mes)->count();
        $atencionAnual = PrestacionRealizada::whereYear('fecha', '=', $anio)->wheremonth('fecha', '<=', $mes)->count();
        $atencionMensual = PrestacionRealizada::whereYear('fecha', '=',$anio)->whereMonth('fecha', '=', $mes)->count();

        //atenciones realizadas por los funcionarios en tal periodo
        $atencionKines=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=',$anio)
            ->whereMonth('prestacion_realizadas.fecha', '<=', $mes)
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',2)
            ->count();
        $atencionKinesMes=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=',$anio)
            ->whereMonth('prestacion_realizadas.fecha', '=', $mes)
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',2)
            ->count();

        $atencionFono=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=',$anio)
            ->whereMonth('prestacion_realizadas.fecha', '<=', $mes)
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',5)
            ->count();
        $atencionFonoMes=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=',$anio)
            ->whereMonth('prestacion_realizadas.fecha', '=', $mes)
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',5)
            ->count();

        $atencionPsico=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=',$anio)
            ->whereMonth('prestacion_realizadas.fecha', '<=', $mes)
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',1)
            ->count();
        $atencionPsicoMes=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=',$anio)
            ->whereMonth('prestacion_realizadas.fecha', '=', $mes)
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',1)
            ->count();

        $atencionTers=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=',$anio)
            ->whereMonth('prestacion_realizadas.fecha', '<=', $mes)
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',4)
            ->count();
        $atencionTersMes=PrestacionRealizada::whereYear('prestacion_realizadas.fecha', '=',$anio)
            ->whereMonth('prestacion_realizadas.fecha', '=', $mes)
            ->join('funcionarios','prestacion_realizadas.user_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',4)
            ->count();

        if(isset($_GET['visualHistMes'])) {
            return view('reportabilidad.reportabilidadHistorica', compact('anio','mes','cantUsuarioTotal','cantIngresadosAño','cantIngresadosMes','atencionAnual','atencionMensual','atencionKines','atencionPsico','atencionFono','atencionTers','atencionKinesMes','atencionPsicoMes','atencionFonoMes','atencionTersMes'));
        }else {
            if (isset($_GET['imprimirReporHist'])) {
                $view =  \View::make('pdf.invoiceHistoricReport', compact('anio','mes','cantUsuarioTotal','cantIngresadosAño','cantIngresadosMes','atencionAnual','atencionMensual'))->render();
                $pdf = \App::make('dompdf.wrapper');
                $pdf->loadHTML($view);
                return $pdf->stream('invoiceHistoricReport');

            }
        }
        $anio = $request->anio;
        $mes = $request->mes;
        $cantUsuarioTotal = $request->cantUsuarioTotal;
        $cantIngresadosAño = $request->cantIngresadosAño;
        $cantIngresadosMes = $request->cantIngresadosMes;
        $atencionAnual = $request->atencionAnual;
        $atencionMensual = $request->atencionMensual;
        $view =  \View::make('pdf.invoiceHistoricReport', compact('anio','mes','cantUsuarioTotal','cantIngresadosAño','cantIngresadosMes','atencionAnual','atencionMensual'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoiceHistoricReport');

    }



}