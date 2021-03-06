<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaAtencionSocial extends Model
{
    protected $fillable=['numero','descripcion','beneficiario_id'];

    public function beneficiario(){

        return $this->belongsTo(Beneficiario::class);

    }
    /*
    public function prestacionRealizada(){
        return $this->belongsTo(PrestacionRealizada::class);
    }
*/
    public function motivo_atencion_social()
    {
        return $this->hasMany(MotivoAtencionSocial::class);
    }
}
