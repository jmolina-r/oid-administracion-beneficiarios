<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatoSocial extends Model
{
    protected $fillable = ['observacion', 'ficha_beneficiario_id'];

    public function ficha_beneficiario()
    {
        return $this->belongsTo(FichaBeneficiario::class);
    }
}
