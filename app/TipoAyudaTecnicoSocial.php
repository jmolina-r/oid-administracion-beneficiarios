<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAyudaTecnicoSocial extends Model
{
    protected $fillable = ['tipo','nombre','tipo_motivo_social_id'];

    public function tipo_motivo_social()
    {
        return $this->hasOne(TipoMotivoSocial::class);
    }

    public function motivo_atencion_social()
    {
        return $this->hasOne(MotivoAtencionSocial::class);
    }
}