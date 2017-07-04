<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use App\CredencialDiscapacidad;
use App\DatoSocial;
use App\FichaBeneficiario;
use App\Fonasa;
use App\MotivoAtencionSocial;
use App\PrestacionRealizada;
use App\SubMotivoAtencionSocial;
use App\TipoAyudaTecnicoSocial;
use App\TipoSubmotivoSocial;
use App\TipoMotivoSocial;
use Illuminate\Http\Request;

class ReportabilidadController extends Controller
{
    public function index() {
        return view('social.asistenteSocial');
    }


    public function showResults(Request $request){
        
        $cant = Beneficiario::count();
        $masculino = Beneficiario::where('sexo','masculino')->count();
        $porcentajeMasculino = $masculino*100/$cant;
        $fem = Beneficiario::where('sexo','femenino')->count();
        $porcentajeFemenino=$fem*100/$cant;
        $ingresoAnual=FichaBeneficiario::whereYear('fecha_ingreso', '=', date('Y'))->count();
        $ingresoMensual = FichaBeneficiario::whereYear('fecha_ingreso', '=', date('Y'))
            ->whereMonth('fecha_ingreso', '=', date('m'))
            ->count();
        $credencial = CredencialDiscapacidad::count();
        $porcentajeCredencial=$credencial*100/$cant;
        $atencionAnual=PrestacionRealizada::whereYear('fecha', '=', date('Y'))->count();
        $atencionMensual=PrestacionRealizada::whereYear('fecha', '=', date('Y'))
            ->whereMonth('fecha', '=', date('m'))
            ->count();
        //$joven = Beneficiario::where('edad',''<='',18)->count(); 0-18
        //adulto 19-65    adulto mayor   65-100
        $porcentajeJoven=0;
        $porcentajeAdulto=0;
        $porcentajeAdultoMayor=0;

        //SALUD FONASA O ISAPRE
        $fonasa=DatoSocial::where('fonasa_id','!=', null)->count();
        $porcentajeFonasa = $fonasa*100/$cant;
        $fonasaTramoA= DatoSocial::where('fonasa_id','=',1)->count();
        $porcentajeFonasaTramoA=$fonasaTramoA;
        $fonasaTramoB= DatoSocial::where('fonasa_id','=',2)->count();
        $porcentajeFonasaTramoB=$fonasaTramoB;
        $fonasaTramoC= DatoSocial::where('fonasa_id','=',3)->count();
        $porcentajeFonasaTramoC=$fonasaTramoC;
        $fonasaTramoD= DatoSocial::where('fonasa_id','=',4)->count();
        $porcentajeFonasaTramoD=$fonasaTramoD;
        $isapre=DatoSocial::where('isapre_id','!=', null)->count();
        $porcentajeIsapre=$isapre*100/$cant;

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
        $porcentajeTrabajador=$trabajador*100/$cant;
        $estudiante=Beneficiario::where('ocupacion_id','=',2)->count();
        $porcentajeEstudiante=$estudiante*100/$cant;
        $duenoCasa=Beneficiario::where('ocupacion_id','=',3)->count();
        $porcentajeDuenoCasa=$duenoCasa*100/$cant;
        $pensionado=Beneficiario::where('ocupacion_id','=',4)->count();
        $porcentajePensionado=$pensionado*100/$cant;
        $cesante=Beneficiario::where('ocupacion_id','=',5)->count();
        $porcentajeCesante=$cesante*100/$cant;



        return view('reportabilidad.createFichaPaciente', compact('cant', 'porcentajeFemenino', 'porcentajeMasculino', 'ingresoAnual', 'ingresoMensual', 'porcentajeCredencial', 'atencionAnual' , 'atencionMensual','porcentajeAdulto', 'porcentajeJoven', 'porcentajeAdultoMayor', 'porcentajeFonasa',
            'porcentajeFonasaTramoA','porcentajeFonasaTramoB', 'porcentajeFonasaTramoC','porcentajeFonasaTramoD', 'porcentajeIsapre', 'preBasico','basicoIncompleto', 'basicoCompleto',
            'medioIncompleto', 'medioCompleto', 'tecnicoIncompleto', 'tecnicoCompleto', 'universitarioIncompleto' ,
            'universitarioCompleto', 'trabajador','estudiante','duenoCasa','pensionado','cesante'));

    }
 
    
}
