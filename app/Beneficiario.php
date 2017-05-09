<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    protected $fillable = ['nombre', 'apellido', 'rut', 'sexo', 'pais_id', 'estado_civil_id'];

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function telefonos()
    {
        return $this->hasMany(Telefono::class);
    }

    public function estado_civil()
    {
        return $this->belongsTo(EstadoCivil::class);
    }
}
