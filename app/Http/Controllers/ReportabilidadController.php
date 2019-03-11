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
use App\Malla;
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
        $kines = Funcionario::where('tipo_funcionario_id','=',1)->get();
        $psicologos = Funcionario::where('tipo_funcionario_id','=',2)->get();
        $terapeutas = Funcionario::where('tipo_funcionario_id','=',4)->get();
        $fonoaudiologos = Funcionario::where('tipo_funcionario_id','=',3)->get();
        return view('reportabilidad.menuReportabilidad', compact('kines','terapeutas','psicologos', 'fonoaudiologos'));

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
            ->whereYear('created_at','=',(date('Y')))
            ->count();

        $pacientesReahabMensual=InformeCierre::where('culmino_proceso','=','si')
            ->whereYear('created_at','=',(date('Y')))
            ->whereMonth('created_at', '=', date('m'))
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
            'isapreDipreca', 'isapreCapredena', 'isapreFerroSalud', 'isapreOtro','porcentajeParticipaOrgSocial',
            'estimulacionTemprana','edad3_5','edad6_10','edad11_20','edad21_30','edad31_40','edad41_50','edad51_60','edad61_70','edad71_80','edad81_90','edad91_100','edad101_110','edad111_120',
            'porcentajeParticipaOrgSocial',
            'porcentajeReahbMensual','porcentajeReahbAnual'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');

    }

    public function showResultKine(Request $request){
        //KINE
        $user_rut=$request->kinesiologos;
        $kinesiologo = Funcionario::where('rut',$request->kinesiologos)->first();


        $atencionAnualKine=HoraAgendada::whereYear('hora_agendadas.fecha', '=', date('Y'))
            ->where('hora_agendadas.user_id', $kinesiologo->user()->first()->id)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();

        $atencionMensualKine=HoraAgendada::whereYear('hora_agendadas.fecha', '=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->where('hora_agendadas.user_id', $kinesiologo->user()->first()->id)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id') //join malla
            ->whereNotNull('mallas.prestacion_id')
            ->count();

        $asistenciaKineAnual =Malla::where('mallas.asist_sn','=','Presente')
            ->join('hora_agendadas', 'mallas.hora_agendada_id', '=', 'hora_agendadas.id')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->where('hora_agendadas.user_id', $kinesiologo->user()->first()->id)
            ->count();

        $asistenciaKineMensual=Malla::where('mallas.asist_sn','=','Presente')
            ->join('hora_agendadas', 'mallas.hora_agendada_id', '=', 'hora_agendadas.id')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->where('hora_agendadas.user_id', $kinesiologo->user()->first()->id)
            ->count();

        $inasistenciaKineAnual =Malla::where('mallas.asist_sn','=','No Justifica')
            ->join('hora_agendadas', 'mallas.hora_agendada_id', '=', 'hora_agendadas.id')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->where('hora_agendadas.user_id', $kinesiologo->user()->first()->id)
            ->count();
        $inasistenciaKineMensual=Malla::where('mallas.asist_sn','=','No Justifica')
            ->join('hora_agendadas', 'mallas.hora_agendada_id', '=', 'hora_agendadas.id')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->where('hora_agendadas.user_id', $kinesiologo->user()->first()->id)
            ->count();

        $prestaciones = Prestacion::where('prestacions.area','=','Kinesiologo')->get();
        $porcentajePrest=null;
        $nombrePrest=null;
        $i=0;
        foreach ($prestaciones as $p){
            $nombrePrest[$i]=$p->nombre;
            $porcentajePrest[$i]=Prestacion::where('prestacions.id','=',$p->id)
            ->where('prestacions.area','=','Kinesiologo')
            ->join('mallas','prestacions.id','=','mallas.prestacion_id')
            ->join('hora_agendadas','mallas.hora_agendada_id','hora_agendadas.id')
            ->where('hora_agendadas.user_id', $kinesiologo->user()->first()->id)
            ->whereYear('hora_agendadas.fecha','=',date('Y'))
            ->whereMonth('hora_agendadas.fecha','=',date('m'))
            ->count();
            $i++;
        }

        if(isset($_GET['visualKine'])) {

            return view('reportabilidad.reportabilidadKine', compact('kinesiologo','atencionAnualKine','atencionMensualKine','asistenciaKineAnual','inasistenciaKineAnual','asistenciaKineMensual','inasistenciaKineMensual','porcentajePrest','nombrePrest'));

        }


        $nombres = $_GET["nombres"];
        $apellidos = $_GET["apellidos"];
        $rut = $_GET["rut"];
        $telefono = $_GET["telefono"];
        $direccion = $_GET["direccion"];
        $atencionAnualKine = $_GET["atencionAnualKine"];
        $atencionMensualKine = $_GET["atencionMensualKine"];
        $asistenciaKineAnual = $_GET["asistenciaKineAnual"];
        $inasistenciaKineAnual = $_GET["inasistenciaKineAnual"];
        $asistenciaKineMensual = $_GET["asistenciaKineMensual"];
        $inasistenciaKineMensual = $_GET["inasistenciaKineMensual"];
        $porcentajePrest = $_GET["porcentajePrest"];
        $nombrePrest = $_GET["nombrePrest"];

        $view =  \View::make('pdf.invoice1', compact('nombres','apellidos','direccion','rut','telefono','atencionAnualKine','atencionMensualKine','asistenciaKineAnual','inasistenciaKineAnual','asistenciaKineMensual','inasistenciaKineMensual','porcentajePrest','nombrePrest'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice1');

    }

    public function showResultFono(Request $request){
        //FONO
        $user_rut=$request->fonoaudiologo;
        $fonoaudiologo = Funcionario::where('rut',$request->fonoaudiologo)->first();

        $atencionAnualFono=HoraAgendada::whereYear('hora_agendadas.fecha', '=', date('Y'))
            ->where('hora_agendadas.user_id', $fonoaudiologo->user()->first()->id)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();

        $atencionMensualFono=HoraAgendada::whereYear('hora_agendadas.fecha', '=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->where('hora_agendadas.user_id', $fonoaudiologo->user()->first()->id)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id') //join malla
            ->whereNotNull('mallas.prestacion_id')
            ->count();

        $asistenciaFonoAnual =Malla::where('mallas.asist_sn','=','Presente')
            ->join('hora_agendadas', 'mallas.hora_agendada_id', '=', 'hora_agendadas.id')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->where('hora_agendadas.user_id', $fonoaudiologo->user()->first()->id)
            ->count();
        $asistenciaFonoMensual =Malla::where('mallas.asist_sn','=','Presente')
            ->join('hora_agendadas', 'mallas.hora_agendada_id', '=', 'hora_agendadas.id')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->where('hora_agendadas.user_id', $fonoaudiologo->user()->first()->id)
            ->count();
        $inasistenciaFonoAnual =Malla::where('mallas.asist_sn','=','No Justifica')
            ->join('hora_agendadas', 'mallas.hora_agendada_id', '=', 'hora_agendadas.id')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->where('hora_agendadas.user_id', $fonoaudiologo->user()->first()->id)
            ->count();
        $inasistenciaFonoMensual =Malla::where('mallas.asist_sn','=','No Justifica')
            ->join('hora_agendadas', 'mallas.hora_agendada_id', '=', 'hora_agendadas.id')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->where('hora_agendadas.user_id', $fonoaudiologo->user()->first()->id)
            ->count();

        $prestaciones = Prestacion::where('prestacions.area','=','Fonoaudiologo')->get();
        $porcentajePrest=null;
        $nombrePrest=null;
        $i=0;
        foreach ($prestaciones as $p){
            $nombrePrest[$i]=$p->nombre;
            $porcentajePrest[$i]=Prestacion::where('prestacions.id','=',$p->id)
                ->where('prestacions.area','=','Kinesiologo')
                ->join('mallas','prestacions.id','=','mallas.prestacion_id')
                ->join('hora_agendadas','mallas.hora_agendada_id','hora_agendadas.id')
                ->where('hora_agendadas.user_id', $fonoaudiologo->user()->first()->id)
                ->whereYear('hora_agendadas.fecha','=',date('Y'))
                ->whereMonth('hora_agendadas.fecha','=',date('m'))
                ->count();
                $i++;
        }
     if(isset($_GET['visualFono'])) {
            return view('reportabilidad.reportabilidadFono', compact('fonoaudiologo', 'atencionAnualFono', 'atencionMensualFono', 'asistenciaFonoAnual', 'asistenciaFonoMensual', 'inasistenciaFonoAnual', 'inasistenciaFonoMensual', 'porcentajePrest', 'nombrePrest'));
     }
        $nombres = $_GET["nombres"];
        $apellidos = $_GET["apellidos"];
        $rut = $_GET["rut"];
        $telefono = $_GET["telefono"];
        $direccion = $_GET["direccion"];
        $atencionAnualFono = $_GET["atencionAnualFono"];
        $atencionMensualFono = $_GET["atencionMensualFono"];
        $asistenciaFonoAnual = $_GET["asistenciaFonoAnual"];
        $asistenciaFonoMensual = $_GET["asistenciaFonoMensual"];
        $inasistenciaFonoAnual = $_GET["inasistenciaFonoAnual"];
        $inasistenciaFonoMensual = $_GET["inasistenciaFonoMensual"];
        $porcentajePrest = $_GET["porcentajePrest"];
        $nombrePrest = $_GET["nombrePrest"];

        $view =  \View::make('pdf.invoiceFono', compact('nombres','apellidos','direccion','rut','telefono','atencionAnualFono','atencionMensualFono','asistenciaFonoAnual','asistenciaFonoMensual','inasistenciaFonoAnual','inasistenciaFonoMensual','porcentajePrest','nombrePrest'))->render();        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoiceFono');

    }

    public function showResultPsico(Request $request){
        //Psico
        $user_rut=$request->psicologos;
        $psicologo = Funcionario::where('rut',$request->psicologos)->first();
        $atencionAnualPsico=HoraAgendada::whereYear('hora_agendadas.fecha', '=', date('Y'))
            ->where('hora_agendadas.user_id', $psicologo->user()->first()->id)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();
        $atencionMensualPsico=HoraAgendada::whereYear('hora_agendadas.fecha', '=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->where('hora_agendadas.user_id', $psicologo->user()->first()->id)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id') //join malla
            ->whereNotNull('mallas.prestacion_id')
            ->count();
        $asistenciaPsicoAnual =Malla::where('mallas.asist_sn','=','Presente')
            ->join('hora_agendadas', 'mallas.hora_agendada_id', '=', 'hora_agendadas.id')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->where('hora_agendadas.user_id', $psicologo->user()->first()->id)
            ->count();
        $asistenciaPsicoMensual=Malla::where('mallas.asist_sn','=','Presente')
            ->join('hora_agendadas', 'mallas.hora_agendada_id', '=', 'hora_agendadas.id')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->where('hora_agendadas.user_id', $psicologo->user()->first()->id)
            ->count();
        $inasistenciaPsicoAnual =Malla::where('mallas.asist_sn','=','No Justifica')
            ->join('hora_agendadas', 'mallas.hora_agendada_id', '=', 'hora_agendadas.id')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->where('hora_agendadas.user_id', $psicologo->user()->first()->id)
            ->count();
        $inasistenciaPsicoMensual =Malla::where('mallas.asist_sn','=','No Justifica')
            ->join('hora_agendadas', 'mallas.hora_agendada_id', '=', 'hora_agendadas.id')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->where('hora_agendadas.user_id', $psicologo->user()->first()->id)
            ->count();


        $prestaciones = Prestacion::where('prestacions.area','=','Psicologo')->get();
        $porcentajePrest=null;
        $nombrePrest=null;
        $i=0;
        foreach ($prestaciones as $p){
            $nombrePrest[$i]=$p->nombre;
            $porcentajePrest[$i]=Prestacion::where('prestacions.id','=',$p->id)
                ->where('prestacions.area','=','Kinesiologo')
                ->join('mallas','prestacions.id','=','mallas.prestacion_id')
                ->join('hora_agendadas','mallas.hora_agendada_id','hora_agendadas.id')
                ->where('hora_agendadas.user_id',  $psicologo->user()->first()->id)
                ->whereYear('hora_agendadas.fecha','=',date('Y'))
                ->whereMonth('hora_agendadas.fecha','=',date('m'))
                ->count();
                $i++;
        }

        if(isset($_GET['visualSico'])) {
            return view('reportabilidad.reportabilidadPsico', compact('psicologo','atencionAnualPsico','atencionMensualPsico','asistenciaPsicoAnual','asistenciaPsicoMensual','inasistenciaPsicoAnual','inasistenciaPsicoMensual','porcentajePrest','nombrePrest'));
        }

        $nombres = $_GET["nombres"];
        $apellidos = $_GET["apellidos"];
        $rut = $_GET["rut"];
        $telefono = $_GET["telefono"];
        $direccion = $_GET["direccion"];
        $atencionAnualPsico = $_GET["atencionAnualPsico"];
        $atencionMensualPsico = $_GET["atencionMensualPsico"];
        $asistenciaPsicoAnual = $_GET["asistenciaPsicoAnual"];
        $inasistenciaPsicoAnual = $_GET["inasistenciaPsicoAnual"];
        $asistenciaPsicoMensual = $_GET["asistenciaPsicoMensual"];
        $inasistenciaPsicoMensual = $_GET["inasistenciaPsicoMensual"];
        $porcentajePrest = $_GET["porcentajePrest"];
        $nombrePrest = $_GET["nombrePrest"];

        $view =  \View::make('pdf.invoice2', compact('nombres','apellidos','direccion','rut','telefono','atencionAnualPsico','atencionMensualPsico','asistenciaPsicoAnual','inasistenciaPsicoAnual','asistenciaPsicoMensual','inasistenciaPsicoMensual','porcentajePrest','nombrePrest'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice2');
    }

    public function showResultTer(Request $request){

        //terapiaocupacional
        $user_rut=$request->terapeutas;
        $terapeuta = Funcionario::where('rut',$request->terapeutas)->first();
        $atencionAnualTer=HoraAgendada::whereYear('hora_agendadas.fecha', '=', date('Y'))
            ->where('hora_agendadas.user_id', $terapeuta->user()->first()->id)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();
        $atencionMensualTer=HoraAgendada::whereYear('hora_agendadas.fecha', '=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->where('hora_agendadas.user_id', $terapeuta->user()->first()->id)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id') //join malla
            ->whereNotNull('mallas.prestacion_id')
            ->count();

        $asistenciaTerAnual =Malla::where('mallas.asist_sn','=','Presente')
            ->join('hora_agendadas', 'mallas.hora_agendada_id', '=', 'hora_agendadas.id')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->where('hora_agendadas.user_id', $terapeuta->user()->first()->id)
            ->count();
        $asistenciaTerMensual=Malla::where('mallas.asist_sn','=','Presente')
            ->join('hora_agendadas', 'mallas.hora_agendada_id', '=', 'hora_agendadas.id')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->where('hora_agendadas.user_id', $terapeuta->user()->first()->id)
            ->count();
        $inasistenciaTerAnual =Malla::where('mallas.asist_sn','=','No Justifica')
            ->join('hora_agendadas', 'mallas.hora_agendada_id', '=', 'hora_agendadas.id')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->where('hora_agendadas.user_id', $terapeuta->user()->first()->id)
            ->count();
        $inasistenciaTerMensual =Malla::where('mallas.asist_sn','=','No Justifica')
            ->join('hora_agendadas', 'mallas.hora_agendada_id', '=', 'hora_agendadas.id')
            ->whereYear('hora_agendadas.fecha','=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->where('hora_agendadas.user_id', $terapeuta->user()->first()->id)
            ->count();

        $prestaciones = Prestacion::where('prestacions.area','=','Terapeuta ocupacional')->get();
        $porcentajePrest=null;
        $nombrePrest=null;
        $i=0;
        foreach ($prestaciones as $p){
            $nombrePrest[$i]=$p->nombre;
            $porcentajePrest[$i]=Prestacion::where('prestacions.id','=',$p->id)
                ->where('prestacions.area','=','Kinesiologo')
                ->join('mallas','prestacions.id','=','mallas.prestacion_id')
                ->join('hora_agendadas','mallas.hora_agendada_id','hora_agendadas.id')
                ->where('hora_agendadas.user_id',  $terapeuta->user()->first()->id)
                ->whereYear('hora_agendadas.fecha','=',date('Y'))
                ->whereMonth('hora_agendadas.fecha','=',date('m'))
                ->count();
                $i++;
        }


        if(isset($_GET['visualTerap'])) {
            return view('reportabilidad.reportabilidadTer', compact('terapeuta','atencionAnualTer','atencionMensualTer','asistenciaTerAnual','asistenciaTerMensual','inasistenciaTerAnual','inasistenciaTerMensual','porcentajePrest','nombrePrest'));
        }
        $nombres = $_GET["nombres"];
        $apellidos = $_GET["apellidos"];
        $rut = $_GET["rut"];
        $telefono = $_GET["telefono"];
        $direccion = $_GET["direccion"];
        $atencionAnualTer = $_GET["atencionAnualTer"];
        $atencionMensualTer = $_GET["atencionMensualTer"];
        $asistenciaTerAnual = $_GET["asistenciaTerAnual"];
        $asistenciaTerMensual = $_GET["asistenciaTerMensual"];
        $inasistenciaTerAnual = $_GET["inasistenciaTerAnual"];
        $inasistenciaTerMensual = $_GET["inasistenciaTerMensual"];

        $view =  \View::make('pdf.invoice3', compact('nombres','apellidos','direccion','rut','telefono','atencionAnualTer','atencionMensualTer','asistenciaTerAnual','asistenciaTerMensual','inasistenciaTerAnual','inasistenciaTerMensual','porcentajePrest','nombrePrest'))->render();
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

        $atencionAnualKines=HoraAgendada::whereYear('hora_agendadas.fecha', '=', date('Y'))
            ->join('users','hora_agendadas.user_id','=','users.id')
            ->join('funcionarios','users.funcionario_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',1)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();

        $atencionMensualKines=HoraAgendada::whereYear('hora_agendadas.fecha', '=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->join('users','hora_agendadas.user_id','=','users.id')
            ->join('funcionarios','users.funcionario_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',1)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();

        $atencionAnualFonos=HoraAgendada::whereYear('hora_agendadas.fecha', '=', date('Y'))
            ->join('users','hora_agendadas.user_id','=','users.id')
            ->join('funcionarios','users.funcionario_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',3)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();
        $atencionMensualFonos=HoraAgendada::whereYear('hora_agendadas.fecha', '=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->join('users','hora_agendadas.user_id','=','users.id')
            ->join('funcionarios','users.funcionario_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',3)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();
        $atencionAnualPsicos=HoraAgendada::whereYear('hora_agendadas.fecha', '=', date('Y'))
            ->join('users','hora_agendadas.user_id','=','users.id')
            ->join('funcionarios','users.funcionario_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',2)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();
        $atencionMensualPsicos=HoraAgendada::whereYear('hora_agendadas.fecha', '=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->join('users','hora_agendadas.user_id','=','users.id')
            ->join('funcionarios','users.funcionario_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',2)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();
        $atencionAnualTers=HoraAgendada::whereYear('hora_agendadas.fecha', '=', date('Y'))
            ->join('users','hora_agendadas.user_id','=','users.id')
            ->join('funcionarios','users.funcionario_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',4)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();
        $atencionMensualTers=HoraAgendada::whereYear('hora_agendadas.fecha', '=', date('Y'))
            ->whereMonth('hora_agendadas.fecha', '=', date('m'))
            ->join('users','hora_agendadas.user_id','=','users.id')
            ->join('funcionarios','users.funcionario_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',4)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();

        $totalAnual = $atencionAnualKines +  $atencionAnualFonos + $atencionAnualPsicos + $atencionAnualTers;
        $totalMensual = $atencionMensualKines +  $atencionMensualFonos + $atencionMensualPsicos + $atencionMensualTers;

        return view('reportabilidad.reportabilidadGrupal', compact('atencionAnualKines','atencionMensualKines','atencionAnualFonos','atencionMensualFonos',
            'atencionAnualPsicos','atencionMensualPsicos','atencionAnualTers','atencionMensualTers','totalAnual','totalMensual'));


    }

    public function showResultHistoricaEntreMes(Request $request)
    {

        $aniouno = $request->aniouno;

          $aniodos = $request->aniodos;
          $mesuno = $request->mesuno;
          $mesdos = $request->mesdos;

          if($aniodos < $aniouno){

              return view('reportabilidad.error');

          }

        if($aniodos == $aniouno){

              if($mesuno >= $mesdos){

                  return view('reportabilidad.error');

              }
        }


        $cantIngresadosAño2 =FichaBeneficiario::whereYear('fecha_ingreso', '>=', $aniouno)
                ->whereYear('fecha_ingreso', '<=', $aniodos)
                ->whereMonth('fecha_ingreso', '>=', $mesuno)
                ->whereMonth('fecha_ingreso', '<=', $mesdos)
                ->count();

        $cantAtencionAño2=HoraAgendada::whereYear('hora_agendadas.fecha', '>=',$aniouno)
            ->whereYear('hora_agendadas.fecha', '<=',$aniodos)
            ->whereMonth('hora_agendadas.fecha', '>=', $mesuno)
            ->whereMonth('hora_agendadas.fecha', '<=',$mesdos)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();

        //atenciones realizadas por los funcionarios en tal periodo
        $atencionKines=HoraAgendada::whereYear('hora_agendadas.fecha', '>=',$aniouno)
            ->whereYear('hora_agendadas.fecha', '<=',$aniodos)
            ->whereMonth('hora_agendadas.fecha', '>=', $mesuno)
            ->whereMonth('hora_agendadas.fecha', '<=', $mesdos)
            ->join('users','hora_agendadas.user_id','=','users.id')
            ->join('funcionarios','users.funcionario_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',1)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();
        $atencionFono=HoraAgendada::whereYear('hora_agendadas.fecha', '>=',$aniouno)
            ->whereYear('hora_agendadas.fecha', '<=',$aniodos)
            ->whereMonth('hora_agendadas.fecha', '>=', $mesuno)
            ->whereMonth('hora_agendadas.fecha', '<=', $mesdos)
            ->join('users','hora_agendadas.user_id','=','users.id')
            ->join('funcionarios','users.funcionario_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',3)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();
        $atencionPsico=HoraAgendada::whereYear('hora_agendadas.fecha', '>=',$aniouno)
            ->whereYear('hora_agendadas.fecha', '<=',$aniodos)
            ->whereMonth('hora_agendadas.fecha', '>=', $mesuno)
            ->whereMonth('hora_agendadas.fecha', '<=', $mesdos)
            ->join('users','hora_agendadas.user_id','=','users.id')
            ->join('funcionarios','users.funcionario_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',2)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();
        $atencionTers=HoraAgendada::whereYear('hora_agendadas.fecha', '>=',$aniouno)
            ->whereYear('hora_agendadas.fecha', '<=',$aniodos)
            ->whereMonth('hora_agendadas.fecha', '>=', $mesuno)
            ->whereMonth('hora_agendadas.fecha', '<=', $mesdos)
            ->join('users','hora_agendadas.user_id','=','users.id')
            ->join('funcionarios','users.funcionario_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',4)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();

        if(isset($_GET['visualHistEntreMes'])) {
            return view('reportabilidad.reportabilidadHistEntreMes', compact('cantIngresadosAño2','cantAtencionAño2','aniouno','aniodos','mesuno','mesdos','atencionKines','atencionPsico','atencionFono','atencionTers'));

        }

        $aniouno = $request->aniouno;
        $aniodos = $request->aniodos;
        $mesuno = $request->mesuno;
        $mesdos = $request->mesdos;
        $cantIngresadosAño2 = $request->cantIngresadosAño2;
        $cantAtencionAño2 = $request->cantAtencionAño2;
        $atencionKines = $request->atencionKines;
        $atencionFono = $request->atencionFono;
        $atencionPsico = $request->atencionPsico;
        $atencionTers=$request->atencionTers;

        $view =  \View::make('pdf.invoiceHistoricoPorMeses', compact('cantIngresadosAño2','cantAtencionAño2','aniouno','aniodos','mesuno','mesdos','atencionKines','atencionPsico','atencionFono','atencionTers'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoiceHistoricoPorMeses');


    }

    public function showResultHistorica(Request $request)
    {
        $anio = $request->anio;
        $mes = $request->mes;
        $cantIngresadosAño = FichaBeneficiario::whereYear('fecha_ingreso', '=', $anio)->wheremonth('fecha_ingreso', '<=', $mes)->count();
        $cantIngresadosMes = FichaBeneficiario::whereYear('fecha_ingreso', '=', $anio)->wheremonth('fecha_ingreso', '=', $mes)->count();
        $atencionAnual = HoraAgendada::whereYear('hora_agendadas.fecha', '=', $anio)
            ->whereMonth('hora_agendadas.fecha', '<=', $mes)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();
        $atencionMensual =HoraAgendada::whereYear('hora_agendadas.fecha', '=', $anio)
            ->whereMonth('hora_agendadas.fecha', '=', $mes)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();





        //atenciones realizadas por los funcionarios en tal periodo
        $atencionKines=HoraAgendada::whereYear('hora_agendadas.fecha', '=',$anio)
            ->whereMonth('hora_agendadas.fecha', '<=', $mes)
            ->join('users','hora_agendadas.user_id','=','users.id')
            ->join('funcionarios','users.funcionario_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',1)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();
        $atencionKinesMes=HoraAgendada::whereYear('hora_agendadas.fecha', '=',$anio)
            ->whereMonth('hora_agendadas.fecha', '=', $mes)
            ->join('users','hora_agendadas.user_id','=','users.id')
            ->join('funcionarios','users.funcionario_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',1)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();

        $atencionFono=HoraAgendada::whereYear('hora_agendadas.fecha', '=',$anio)
            ->whereMonth('hora_agendadas.fecha', '<=', $mes)
            ->join('users','hora_agendadas.user_id','=','users.id')
            ->join('funcionarios','users.funcionario_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',3)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();;

        $atencionFonoMes=HoraAgendada::whereYear('hora_agendadas.fecha', '=',$anio)
            ->whereMonth('hora_agendadas.fecha', '=', $mes)
            ->join('users','hora_agendadas.user_id','=','users.id')
            ->join('funcionarios','users.funcionario_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',3)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();

        $atencionPsico=HoraAgendada::whereYear('hora_agendadas.fecha', '=',$anio)
            ->whereMonth('hora_agendadas.fecha', '<=', $mes)
            ->join('users','hora_agendadas.user_id','=','users.id')
            ->join('funcionarios','users.funcionario_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',2)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();

        $atencionPsicoMes=HoraAgendada::whereYear('hora_agendadas.fecha', '=',$anio)
            ->whereMonth('hora_agendadas.fecha', '=', $mes)
            ->join('users','hora_agendadas.user_id','=','users.id')
            ->join('funcionarios','users.funcionario_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',2)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();

        $atencionTers=HoraAgendada::whereYear('hora_agendadas.fecha', '=',$anio)
            ->whereMonth('hora_agendadas.fecha', '<=', $mes)
            ->join('users','hora_agendadas.user_id','=','users.id')
            ->join('funcionarios','users.funcionario_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',4)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();

        $atencionTersMes=HoraAgendada::whereYear('hora_agendadas.fecha', '=',$anio)
            ->whereMonth('hora_agendadas.fecha', '=', $mes)
            ->join('users','hora_agendadas.user_id','=','users.id')
            ->join('funcionarios','users.funcionario_id','=','funcionarios.id')
            ->where('funcionarios.tipo_funcionario_id','=',4)
            ->join('mallas','hora_agendadas.id','=','mallas.hora_agendada_id')
            ->whereNotNull('mallas.prestacion_id')
            ->count();

        if(isset($_GET['visualHistMes'])) {
            return view('reportabilidad.reportabilidadHistorica', compact('anio','mes','cantIngresadosAño','cantIngresadosMes','atencionAnual','atencionMensual','atencionKines','atencionPsico','atencionFono','atencionTers','atencionKinesMes','atencionPsicoMes','atencionFonoMes','atencionTersMes'));
        }
        $anio = $request->anio;
        $mes = $request->mes;
        $cantIngresadosAño = $request->cantIngresadosAño;
        $cantIngresadosMes = $request->cantIngresadosMes;
        $atencionAnual = $request->atencionAnual;
        $atencionMensual = $request->atencionMensual;
        $atencionPsico = $request->atencionPsico;
        $atencionKine = $request->atencionKines;
        $atencionTers=$request->atencionTers;
        $atencionFono=$request->atencionFono;
        $atencionKinesMes=$request->atencionKinesMes;
        $atencionPsicoMes=$request->atencionPsicoMes;
        $atencionFonoMes=$request->atencionFonoMes;
        $atencionTersMes=$request->atencionTersMes;

        $view =  \View::make('pdf.invoiceHistoricReport', compact('anio','mes','cantIngresadosAño','cantIngresadosMes','atencionAnual','atencionMensual','atencionKine','atencionPsico','atencionFono','atencionTers','atencionKinesMes','atencionPsicoMes','atencionFonoMes','atencionTersMes'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoiceHistoricReport');

    }



}