<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    protected $fillable = ['pobl_vill', 'calle', 'numero', 'bloque', 'numero_depto', 'beneficiario_id'];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }
}
