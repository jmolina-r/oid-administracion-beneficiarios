<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Psicologo extends Model
{
    protected $fillable = ['rut', 'nombres', 'apellidos', 'telefono', 'fecha_nacimiento', 'direccion'];

    public function ingresoPsicologia()
    {
        return $this->hasMany(FichaPsicologia::class);
    }
}
