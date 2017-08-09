<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    protected $fillable = ['rut', 'nombres', 'apellidos', 'telefono', 'fecha_nacimiento', 'direccion','profesion'];

    public function ingresoKinesiologia()
    {
        return $this->hasMany(FichaKinesiologia::class);
    }

    public function ingresoTerapiaOcupacional()
    {
        return $this->hasMany(FichaTerapiaOcupacional::class);
    }

    public function ingresoPsicologia()
    {
        return $this->hasMany(FichaPsicologia::class);
    }

    public function ingresoFonoaudiologia()
    {
        return $this->hasMany(FichaFonoaudiologia::class);
    }
}
