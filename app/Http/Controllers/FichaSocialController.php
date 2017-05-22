<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use App\MotivoAtencionSocial;
use App\SubMotivoAtencionSocial;
use App\TipoAyudaTecnicoSocial;
use App\TipoSubmotivoSocial;
use Illuminate\Http\Request;

class FichaSocialController extends Controller
{
    public function index() {
        return view('social.asistenteSocial');
    }

    public function store(Request $request){
        $rut = $request -> input('rut');
        $beneficiario = Beneficiario::where('rut',$rut)->first();
        if(isset($beneficiario)){
            return view('social.asistenteSocialMenu', compact('beneficiario'));
        }else{
            echo "Usuario invalido";
            return view('social.asistenteSocial');
        }

    }

    public function index2(){

        return view('social.asistenteSocialVisitaDomiciliaria');
    }

    public function index3(){

        return view('social.asistenteSocialBeca');
    }

    public function index4(){

        $tipoSubmotivoSocial = TipoSubmotivoSocial::get();
        return view('social.asistenteSocialOrientacion')
            ->with(compact('tipoSubmotivoSocial'));
    }

    public function index5(){

        $tipoAyudaTecnicoSocial = TipoAyudaTecnicoSocial::get();
        return view('social.asistenteSocialAyudaTecnica')
            ->with(compact('tipoAyudaTecnicoSocial'));
    }

    public function postMotivo(Request $request){

        $subMotivos = $request -> input('inputSubMotivo');

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
        }
    }
}