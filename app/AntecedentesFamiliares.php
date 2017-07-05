<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedentesFamiliares extends Model
{
    //FALTA GENOGRAMA
    protected $fillable = ['nombre_madre','edad_madre','ocupacion_madre','escolaridad_madre','telefono_madre','observaciones_madre','fecha_nacimiento_madre','rut_madre','nombre_padre','edad_padre', 'ocupacion_padre','escolaridad_padre','telefono_padre','observaciones_padre','fecha_nacimiento_padre','rut_padre'];

    public function ingresoPsicologia()
    {
        return $this->hasOne(FichaPsicologia::class);
    }
}
