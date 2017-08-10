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

class PdfController extends Controller
{
    //
    /*public function invoice()
    {
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $variable = "probando pdf";


        $view =  \View::make('pdf.invoice', compact('data', 'date', 'invoice','variable'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }*/
    public function invoice()
    {
        $cant = Beneficiario::count();
        $masculino = Beneficiario::where('sexo', 'masculino')->count();
        $fem = Beneficiario::where('sexo', 'femenino')->count();
        $ingresoAnual = FichaBeneficiario::whereYear('fecha_ingreso', '=', date('Y'))->count();
        $ingresoMensual = FichaBeneficiario::whereYear('fecha_ingreso', '=', date('Y'))
            ->whereMonth('fecha_ingreso', '=', date('m'))
            ->count();
        $credencial = CredencialDiscapacidad::count();

        $atencionAnual = PrestacionRealizada::whereYear('fecha', '=', date('Y'))->count();
        $atencionMensual = PrestacionRealizada::whereYear('fecha', '=', date('Y'))
            ->whereMonth('fecha', '=', date('m'))
            ->count();

        $porcentajeJoven = 0;
        $porcentajeAdulto = 0;
        $porcentajeAdultoMayor = 0;

        //SALUD FONASA O ISAPRE
        $fonasa = DatoSocial::where('fonasa_id', '!=', null)->count();
        $fonasaTramoA = DatoSocial::where('fonasa_id', '=', 1)->count();
        $fonasaTramoB = DatoSocial::where('fonasa_id', '=', 2)->count();
        $fonasaTramoC = DatoSocial::where('fonasa_id', '=', 3)->count();
        $fonasaTramoD = DatoSocial::where('fonasa_id', '=', 4)->count();
        $isapre = DatoSocial::where('isapre_id', '!=', null)->count();

        if ($fonasa != 0) {
            $porcentajeFonasa = $fonasa * 100 / $cant;
            $porcentajeFonasaTramoA = $fonasaTramoA * 100 / $fonasa;
            $porcentajeFonasaTramoB = $fonasaTramoB * 100 / $fonasa;
            $porcentajeFonasaTramoC = $fonasaTramoC * 100 / $fonasa;
            $porcentajeFonasaTramoD = $fonasaTramoD * 100 / $fonasa;
        } else {
            $porcentajeFonasa = 0;
            $porcentajeFonasaTramoA = 0;
            $porcentajeFonasaTramoB = 0;
            $porcentajeFonasaTramoC = 0;
            $porcentajeFonasaTramoD = 0;
        }

        //EDUCACION id 1-9
        $preBasico = Beneficiario::where('educacion_id', '=', 1)->count();
        $basicoIncompleto = Beneficiario::where('educacion_id', '=', 2)->count();
        $basicoCompleto = Beneficiario::where('educacion_id', '=', 3)->count();
        $medioIncompleto = Beneficiario::where('educacion_id', '=', 4)->count();
        $medioCompleto = Beneficiario::where('educacion_id', '=', 5)->count();
        $tecnicoIncompleto = Beneficiario::where('educacion_id', '=', 6)->count();
        $tecnicoCompleto = Beneficiario::where('educacion_id', '=', 7)->count();
        $universitarioIncompleto = Beneficiario::where('educacion_id', '=', 8)->count();
        $universitarioCompleto = Beneficiario::where('educacion_id', '=', 9)->count();

        //SITUACION LABORAL id 1-5
        $trabajador = Beneficiario::where('ocupacion_id', '=', 1)->count();
        $estudiante = Beneficiario::where('ocupacion_id', '=', 2)->count();
        $duenoCasa = Beneficiario::where('ocupacion_id', '=', 3)->count();
        $pensionado = Beneficiario::where('ocupacion_id', '=', 4)->count();
        $cesante = Beneficiario::where('ocupacion_id', '=', 5)->count();

        if ($cant != 0) {
            $porcentajeMasculino = $masculino * 100 / $cant;
            $porcentajeFemenino = $fem * 100 / $cant;
            $porcentajeCredencial = $credencial * 100 / $cant;
            $porcentajeIsapre = $isapre * 100 / $cant;
        } else {
            $porcentajeMasculino = 0;
            $porcentajeFemenino = 0;
            $porcentajeCredencial = 0;
            $porcentajeIsapre = 0;
        }

        $view =  \View::make('pdf.invoice', compact('cant', 'porcentajeFemenino', 'porcentajeMasculino', 'ingresoAnual', 'ingresoMensual', 'porcentajeCredencial', 'atencionAnual' , 'atencionMensual','porcentajeAdulto', 'porcentajeJoven', 'porcentajeAdultoMayor', 'porcentajeFonasa',
            'porcentajeFonasaTramoA','porcentajeFonasaTramoB', 'porcentajeFonasaTramoC','porcentajeFonasaTramoD', 'porcentajeIsapre', 'preBasico','basicoIncompleto', 'basicoCompleto',
            'medioIncompleto', 'medioCompleto', 'tecnicoIncompleto', 'tecnicoCompleto', 'universitarioIncompleto' ,
            'universitarioCompleto', 'trabajador','estudiante','duenoCasa','pensionado','cesante'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }
    /*
    public function getData()
    {
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        return $data;
    }*/
    public function invoice1()
    {
        $view =  \View::make('pdf.invoice1', compact('invoice1'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice1');
    }

    public function invoice2()
    {
        $view =  \View::make('pdf.invoice2', compact('invoice2'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice2');
    }

    public function invoice3()
    {
        $view =  \View::make('pdf.invoice3', compact('invoice3'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice3');
    }

    public function invoice4()
    {
        $view =  \View::make('pdf.invoice4', compact('invoice4'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice4');
    }

    public function invoice5()
    {
        $view =  \View::make('pdf.invoice5', compact('invoice5'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice5');
    }
}
