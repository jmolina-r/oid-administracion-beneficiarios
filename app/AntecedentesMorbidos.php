<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedentesMorbidos extends Model
{
    protected $fillable = ['pat_concom', 'alergias', 'medicamentos', 'ant_quir', 'aparatos', 'fuma_sn', 'alcohol_sn', 'act_fisica_sn'];

    public function ingresoKinesiologia()
    {
        return $this->hasOne(IngresoKinesiologia::class);
    }

}
