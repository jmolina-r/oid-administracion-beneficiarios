<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatoSocial extends Model
{
    protected $fillable = ['observacion', 'ficha_beneficiario_id', 'isapre_id', 'fonasa_id', 'organizacion_social_id'];

    public function ficha_beneficiario()
    {
        return $this->belongsTo(FichaBeneficiario::class);
    }

    public function isapre()
    {
        return $this->belongsTo(Isapre::class);
    }
    public function fonasa()
    {
        return $this->belongsTo(Fonasa::class);
    }

    public function organizacion_social()
    {
        return $this->belongsTo(OrganizacionSocial::class);
    }
}
