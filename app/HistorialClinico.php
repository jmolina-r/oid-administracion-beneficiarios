<?php
/**
 * Created by PhpStorm.
 * User: Claudio Gonzalez
 * Date: 21-05-2017
 * Time: 17:16
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
class HistorialClinico extends Model
{
    //sn=si/no
    protected $fillable = ['enfermedades_familiares', 'evaluacion_psiquiatra', 'evaluacion_fonoaudiologo', 'evaluacion_ocupacional', 'evaluacion_kinesiologo', 'evaluacion_psicologo', 'otra_evaluacion', 'tratamientos_recibidos', 'medicamentos_sn', 'medicamentos', 'efectos_medicamentos', 'diagnosticos_previos'];

    public function ingresoKinesiologia()
    {
        return $this->hasOne(FichaTerapiaOcupacional::class);
    }
}