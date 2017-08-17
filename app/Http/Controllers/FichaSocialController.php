<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use App\FichaAtencionSocial;
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


        $ayudas=TipoAyudaTecnicoSocial::join('motivo_atencion_socials','tipo_ayuda_tecnico_socials.tipo_motivo_social_id','=','motivo_atencion_socials.tipo_motivo_social_id')
            ->where('motivo_atencion_socials.ficha_atencion_social_id','=',$IDFICHA)
            ->where('motivo_atencion_socials.tipo_motivo_social_id','=',1)
            ->where('motivo_atencion_socials.tipo_ayuda_id','=','tipo_ayuda_tecnico_socials.id')->get();

        $observacionAyuda=MotivoAtencionSocial::where('ficha_atencion_social_id','=',$IDFICHA)
            ->where('tipo_motivo_social_id','=',1)->get();


        $orientacion=TipoSubmotivoSocial::where('tipo_submotivo_socials.tipo_motivo_social_id','=',2)
            ->join('motivo_atencion_socials','tipo_submotivo_socials.tipo_motivo_social_id','=','motivo_atencion_socials.tipo_motivo_social_id')
            ->where('motivo_atencion_socials.ficha_atencion_social_id','=',$IDFICHA)
            ->get();

        $observacionOrientacion=MotivoAtencionSocial::where('ficha_atencion_social_id','=',$IDFICHA)
            ->where('tipo_motivo_social_id','=',2)->select('observacion')->first();

        $visitaDom=TipoSubmotivoSocial::where('tipo_submotivo_socials.tipo_motivo_social_id','=',3)
            ->join('motivo_atencion_socials','tipo_submotivo_socials.tipo_motivo_social_id','=','motivo_atencion_socials.tipo_motivo_social_id')
            ->where('motivo_atencion_socials.ficha_atencion_social_id','=',$IDFICHA)
            ->get();
        $observacionVisitaDom=MotivoAtencionSocial::where('ficha_atencion_social_id','=',$IDFICHA)
            ->where('tipo_motivo_social_id','=',3)->select('observacion')->first();

        $becas=TipoSubmotivoSocial::where('tipo_submotivo_socials.tipo_motivo_social_id','=',4)
            ->join('motivo_atencion_socials','tipo_submotivo_socials.tipo_motivo_social_id','=','motivo_atencion_socials.tipo_motivo_social_id')
            ->where('motivo_atencion_socials.ficha_atencion_social_id','=',$IDFICHA)
            ->get();
        $observacionBecas=MotivoAtencionSocial::where('ficha_atencion_social_id','=',$IDFICHA)
            ->where('tipo_motivo_social_id','=',4)->select('observacion')->first();

        $benefi=Beneficiario::join('ficha_atencion_socials','beneficiarios.id','=','ficha_atencion_socials.beneficiario_id')->get();

        /*
            Buscar que panel esta activo para poder rescatar los datos de este, depues se hace un switch por cada tab para generar 
            el envio de datos a la base de datos por cada uno.
         */

        $now = new \DateTime();
        $obsIt = 'N/A';

        if (isset($_POST["visita_domiciliaria_btn"])) {
            //En caso de que se ingrese una visita domiciliaria
      
            $this->validate($request, ['vd' => 'required']);
            $motivoVisita = $request -> input('vd');
            $obsVisita = $request -> input('observacion3');


           $ficha_atencion_socials = new \App\FichaAtencionSocial([

                'numero' => '0',
                'descripcion' => 'Ficha del tipo visita domiciliaria',
               'beneficiario_id' => $request -> input('ben_id')
            ]);
            $ficha_atencion_socials->save();

            for($i=0;$i<count($motivoVisita);$i++){

                //Se obtiene la posicion de la observacion del motivo de visita
                $textPos = $motivoVisita[$i]-7;
                //Se comprueba que no sea null
                if($obsVisita!=NULL){
                    //Si se lleno el campo, este sustituye el N/A
                    $obsIt = $obsVisita;
                }
                /*if($obsVisita[$textPos]!=NULL){
                    //Si se lleno el campo, este sustituye el N/A
                    $obsIt = $obsVisita[$textPos];
                }*/

/*Esto lo hizo el bryan
            if($request -> input('observacionVisita') != ''){
                    $obsIt = $request -> input('observacionVisita');
            }

            for($i=0;$i<count($motivoVisita);$i++){
Esto lo hizo el bryan
*/


                //Se valida que vd sea requerido
                $this->validate($request, ['vd' => 'required',]);
                $archivo = NULL;
                if($request->hasFile('document')) {
                    $archivo = $request->file('document')->store('public');
                }

                $motivoSocial = new \App\MotivoAtencionSocial([

                    'observación' => $obsIt,
                    'documento' => $archivo,
                    'fecha_visita' => $now->format('Y-m-d H:i:s'),
                    'ficha_atencion_social_id' => $ficha_atencion_socials->id,
                    'tipo_motivo_social_id' => '3',
                    'tipo_submotivo_id' => $motivoVisita[$i],
                    'tipo_ayuda_id' => NULL
                ]);
                $motivoSocial->save();
                $obsIt = 'N/A';

            }
            return back()->with('info','Se ha ingresado con éxito la visita');

        } elseif(isset($_POST["ayudas_btn"])) {
            //En caso de que se ingrese una ayuda
            
            $this->validate($request, ['tipoAyudaSocial' => 'required_without_all:tipoAyudaTecnica',
                                         'tipoAyudaTecnica' => 'required_without_all:tipoAyudaSocial',]);
            $motivoAyudaTecnica = $request -> input('tipoAyudaTecnica');
            $motivoAyudaSocial = $request -> input('tipoAyudaSocial');
            if($request -> input('observacionAyuda') != ''){
                $obsIt = $request -> input('observacionAyuda');
            }

            $ficha_atencion_socials = new \App\FichaAtencionSocial([

                'numero' => '0',
                'descripcion' => 'Ficha del tipo ayuda',
                'beneficiario_id' => $request -> input('ben_id')
            ]);
            $ficha_atencion_socials->save();

            for($i=0;$i<count($motivoAyudaTecnica);$i++){

                    $motivoSocial = new \App\MotivoAtencionSocial([

                        'observación' => $obsIt,
                        'fecha_visita' => $now->format('Y-m-d H:i:s'),
                        'ficha_atencion_social_id' => $ficha_atencion_socials->id,
                        'tipo_motivo_social_id' => '1',
                        'tipo_submotivo_id' => NULL,
                        'tipo_ayuda_id' => $motivoAyudaTecnica[$i]
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
                    'tipo_ayuda_id' => $motivoAyudaSocial[$i]
                ]);
                $motivoSocial->save();

            }

            return back()->with('info','Se ha ingresado con éxito la visita');

        } elseif(isset($_POST["becas_btn"])){
            //En caso de que se ingrese beca como motivo

            $subMotivos = $request -> input('inputSubMotivo');
            $obsVisita = $request -> input('observacion4');

            if($obsVisita!=NULL){
                //Si se lleno el campo, este sustituye el N/A
                $obsIt = $obsVisita;
            }

            if($subMotivos[0]==12){
                $postAT = $request -> input('postAT');
                $obsIt = $obsIt . $postAT[0] . ";";
                $obsIt = $obsIt . $postAT[1] . ";";;
                $resultado = $request -> input('resultado');

                if($resultado==0){
                    $obsIt = $obsIt . "reprobado" . ";";;
                    $reprobado = $request -> input('reprobado');
                    $obsIt = $obsIt . $reprobado[0] . ";";;
                    $obsIt = $obsIt . $reprobado[1] . ";";;
                    $obsIt = $obsIt . $reprobado[2];
                }else{
                    $obsIt = $obsIt . "aprobado";
                }

            }
            $ficha_atencion_socials = new \App\FichaAtencionSocial([

                'numero' => '0',
                'descripcion' => 'Ficha del tipo beca',
                'beneficiario_id' => $request -> input('ben_id')
            ]);
            $ficha_atencion_socials->save();

            $motivoSocial = new \App\MotivoAtencionSocial([

                'observación' => $obsIt,
                'fecha_visita' => $now->format('Y-m-d H:i:s'),
                'ficha_atencion_social_id' => $ficha_atencion_socials->id,
                'tipo_motivo_social_id' => '1',
                'tipo_submotivo_id' => $subMotivos[0],
                'tipo_ayuda_id' => NULL
            ]);
            $motivoSocial->save();
            return back()->with('info','Se ha ingresado con éxito la visita');
        } else{

            //Orientacion
            $this->validate($request, ['inputSubMotivo' => 'required']);
            $obsVisita = $request -> input('observacion2');
            $subMotivos = $request -> input('inputSubMotivo');

            if($obsVisita!=NULL){
                //Si se lleno el campo, este sustituye el N/A
                $obsIt = $obsVisita;
            }

            $ficha_atencion_socials = new \App\FichaAtencionSocial([

                'numero' => '0',
                'descripcion' => 'Ficha de tipo orientacion',
                'beneficiario_id' => $request -> input('ben_id')
            ]);
            $ficha_atencion_socials->save();

            for($i=0;$i<count($subMotivos);$i++){

                $motivoSocial = new \App\MotivoAtencionSocial([

                    'observación' => $obsIt,
                    'fecha_visita' => $now->format('Y-m-d H:i:s'),
                    'ficha_atencion_social_id' => $ficha_atencion_socials->id,
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