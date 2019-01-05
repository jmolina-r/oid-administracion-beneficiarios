<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatoSocial extends Model
{
    protected $fillable = ['observacion', 'ficha_beneficiario_id', 'isapre_id', 'fonasa_id', 'sistema_proteccion_id', 'prevision_id'];

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

    public function organizaciones_sociales()
    {
        return $this->belongsToMany(OrganizacionSocial::class);
    }

    public function sistema_proteccion()
    {
        return $this->belongsTo(SistemaProteccion::class);
    }

    public function beneficios()
    {
        return $this->belongsToMany(Beneficio::class);
    }

    public function prevision()
    {
        return $this->belongsTo(Prevision::class);
    }


    public function is_fonasa()
    {
        if($this->isapre_id == null & $this->fonasa_id!=null ){
            return true;
        }else{
            return false;
        }
    }

}
