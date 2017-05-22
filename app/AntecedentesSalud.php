<?php
/**
 * Created by PhpStorm.
 * User: Claudio Gonzalez
 * Date: 21-05-2017
 * Time: 16:35
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
class AntecedentesSalud extends Model
{
    //sn=si/no
    protected $fillable = ['tiempo_gestacional', 'tipo_parto', 'enfermedades_natal_sn', 'observaciones_enfermedades'];

    public function ingresoKinesiologia()
    {
        return $this->hasOne(FichaTerapiaOcupacional::class);
    }

}