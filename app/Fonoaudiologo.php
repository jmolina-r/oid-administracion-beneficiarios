<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fonoaudiologo extends Model
{
    protected $fillable = ['rut', 'nombres', 'apellidos', 'telefono', 'fecha_nacimiento', 'direccion'];

    public function ingresoFonoaudiologia()
    {
        return $this->hasMany(FichaFonoaudiologia::class);
    }
}
