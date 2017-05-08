<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    protected $fillable = ['nombre', 'apellido', 'rut', 'sexo', 'pais_id'];

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }
}
