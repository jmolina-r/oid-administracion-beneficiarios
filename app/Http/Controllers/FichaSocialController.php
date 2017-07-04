<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use App\MotivoAtencionSocial;
use App\SubMotivoAtencionSocial;
use App\TipoAyudaTecnicoSocial;
use App\TipoSubmotivoSocial;
use App\TipoMotivoSocial;
use Illuminate\Http\Request;

class FichaSocialController extends Controller
{
    public function index() {
        return view('social.asistenteSocial');
    }

    public function show(Request $request){

        $this->validate($request, ['rut' => 'required|exists:beneficiarios,rut']);
        $beneficiario = Beneficiario::where('rut',$request->input('rut'))->first();
                         
        $tipoMotivoSocial = TipoMotivoSocial::get();
        $tipoSubmotivoSocial = TipoSubmotivoSocial::get();
        $tipoAyudaTecnicoSocial = TipoAyudaTecnicoSocial::get();
        return view('social.asistenteSocialVisitaDomiciliaria', compact('tipoMotivoSocial','tipoSubmotivoSocial','tipoAyudaTecnicoSocial','beneficiario'));   
    }

 
    public function post(Request $request){
        
        /*
            Buscar que panel esta activo para poder rescatar los datos de este, depues se hace un switch por cada tab para generar 
            el envio de datos a la base de datos por cada uno.
         */
        $now = new \DateTime();
        $obsIt = 'N/A';

        if (isset($_POST["visita_domiciliaria_btn"])) {

            $motivoVisita = $request -> input('vd');
            $obsVisita = $request -> input('vdText');
            $this->validate($request, [
            'vd' => 'required',]);

            for($i=0;$i<count($motivoVisita);$i++){

                $textPos = $motivoVisita[$i]-7;
                // "Observacion: ". $obsVisita[$textPos] . "<br>";
                if($obsVisita[$textPos]!=NULL){
                    $obsIt = $obsVisita[$textPos];
                }
                $motivoSocial = new \App\MotivoAtencionSocial([

                    'observación' => $obsIt,
                    'fecha_visita' => $now->format('Y-m-d H:i:s'),
                    'ficha_atencion_social_id' => '1',
                    'tipo_motivo_social_id' => '3',
                    'tipo_submotivo_id' => $motivoVisita[$i],
                    'tipo_ayuda_id' => NULL
                ]);
                $motivoSocial->save();
                $obsIt = 'N/A';
            }
            return back()->with('info','Se ha ingresado con éxito la visita');

        } elseif(isset($_POST["ayudas_btn"])) {

            $motivoAyudaTecnica = $request -> input('tipoAyudaTecnica');
            $motivoAyudaSocial = $request -> input('tipoAyudaSocial');
            if($request -> input('observacionAyuda') != ''){
                $obsIt = $request -> input('observacionAyuda');
            }

            for($i=0;$i<count($motivoAyudaTecnica);$i++){

                    $motivoSocial = new \App\MotivoAtencionSocial([

                        'observación' => $obsIt,
                        'fecha_visita' => $now->format('Y-m-d H:i:s'),
                        'ficha_atencion_social_id' => '1',
                        'tipo_motivo_social_id' => '1',
                        'tipo_submotivo_id' => NULL,
                        'tipo_ayuda_id' => $motivoAyudaTecnica[0]
                    ]);
                    $motivoSocial->save();

            }

            for($i=0;$i<count($motivoAyudaSocial);$i++){

                $motivoSocial = new \App\MotivoAtencionSocial([

                    'observación' => $obsIt,
                    'fecha_visita' => $now->format('Y-m-d H:i:s'),
                    'ficha_atencion_social_id' => '1',
                    'tipo_motivo_social_id' => '1',
                    'tipo_submotivo_id' => NULL,
                    'tipo_ayuda_id' => $motivoAyudaSocial[0]
                ]);
                $motivoSocial->save();

            }

            return back()->with('info','Se ha ingresado con éxito la visita');

        } elseif(isset($_POST["becas_btn"])){
            echo "Esta sección aún no se encuentra habilitada";
        } else{

            //Orientacion
            $subMotivos = $request -> input('inputSubMotivo');
            for($i=0;$i<count($subMotivos);$i++){

                $motivoSocial = new \App\MotivoAtencionSocial([

                    'observación' => $obsIt,
                    'fecha_visita' => $now->format('Y-m-d H:i:s'),
                    'ficha_atencion_social_id' => '1',
                    'tipo_motivo_social_id' => '2',
                    'tipo_submotivo_id' => $subMotivos[$i],
                    'tipo_ayuda_id' => NULL
                ]);
                $motivoSocial->save();
            }
            return back()->with('info','Se ha ingresado con éxito la visita');
        }

        //return $request->all();
        /* $subMotivos = $request -> input('inputSubMotivo');

        if(isset($subMotivos)){

            $motivoSocial = new \App\MotivoAtencionSocial([
                'ficha_atencion_social_id' => '1',
                'tipo_motivo_social_id' => '1'
            ]);
            $idMotivo = $motivoSocial->id;
            $motivoSocial->save();

            for($i=0;$i<count($subMotivos);$i++){

                $submotivoSocial = new \App\SubMotivoAtencionSocial([

                    'tipo_motivo_social_id' => '1',
                    'fecha' => '2017-05-23',
                    'observacion' => 'sin observación',
                    'motivo_atencion_social_id' => $motivoSocial->id,
                    'tipo_submotivo_social_id' => $subMotivos[$i]

                ]);
                $submotivoSocial->save();

            }
            return view('social.asistenteSocial');
        }*/

    }

}