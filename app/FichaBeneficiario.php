<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaBeneficiario extends Model
{
    protected $fillable = ['fecha_ingreso', 'beneficiario_id'];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }

    public function dato_social()
    {
        return $this->hasOne(DatoSocial::class);
    }

    public function ficha_discapacidad()
    {
        return $this->hasOne(FichaDiscapacidad::class);
    }

}
