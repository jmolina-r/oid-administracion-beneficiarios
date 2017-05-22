<?php
/**
 * Created by PhpStorm.
 * User: Claudio Gonzalez
 * Date: 21-05-2017
 * Time: 19:08
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
class HabilidadesSociales extends Model
{
    protected $fillable = ['contacto_visual','sonrisa_social','seguimiento_personas','seguimiento_objetos','investigacion_visual','investigacion_motora','atencion_conjunta','imitacion_gestual','imitacion_vocal','imitacion_motora','situaciones_repetidas','situaciones_nuevas','intencion_comunicacional','carinioso','juego_solitario','juego_paralelo','juego_interactivo','gestos_adecuados','inicia_conversacion','formula_peticiones','aclarar_dudas','emisor_receptor','ninios_edad','preferencia_tipo_persona','mayores_intereses','cosas_no_gustan','juegos'];

    public function ingresoKinesiologia()
    {
        return $this->hasOne(FichaTerapiaOcupacional::class);
    }
}