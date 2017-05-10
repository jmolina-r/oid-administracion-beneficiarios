<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaBeneficiario extends Model
{
    protected $fillable = ['numero', 'fecha_ingreso', 'beneficiario_id'];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }

}
