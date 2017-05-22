<?php
/**
 * Created by PhpStorm.
 * User: Claudio Gonzalez
 * Date: 21-05-2017
 * Time: 19:59
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
class TerapeutaOcupacional extends Model
{
    protected $fillable = ['rut', 'nombres', 'apellidos', 'telefono', 'fecha_nacimiento', 'direccion'];

    public function ingreso_terapia_ocupacional()
    {
        return $this->hasOne(FichaTerapiaOcupacional::class);
    }
}