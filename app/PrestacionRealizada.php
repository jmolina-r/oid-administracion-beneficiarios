<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrestacionRealizada extends Model
{
    protected $fillable=['numero','fecha'];

    public function beneficiario(){

        return $this->belongsTo(Beneficiario::class);

    }

    public function informe_cierre(){

        return $this->hasOne(InformeCierre::class);

    }

}
