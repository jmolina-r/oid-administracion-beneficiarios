<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kinesiologo extends Model
{
    protected $fillable = ['rut', 'nombres', 'apellidos', 'telefono', 'fecha_nacimiento', 'direccion'];

    public function ingresoKinesiologia()
    {
        return $this->hasOne(IngresoKinesiologia::class);
    }
}
