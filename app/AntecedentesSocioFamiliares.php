<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedentesSocioFamiliares extends Model
{
    //FALTA GENOGRAMA
    protected $fillable = ['nombre_madre','edad_madre','ocupacion_madre','escolaridad_madre','horario_trabajo_madre','nombre_padre','edad_padre', 'ocupacion_padre','escolaridad_padre','horario_trabajo_padre'];

    public function ingresoTerapiaOcupacional()
    {
        return $this->hasOne(FichaTerapiaOcupacional::class);
    }
}
