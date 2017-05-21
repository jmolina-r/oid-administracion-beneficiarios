<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMotivoSocial extends Model
{
    protected $fillable = ['nombre','descripcion'];

    public function motivo_atencion_social()
    {
        return $this->hasOne(MotivoAtencionSocial::class);
    }

    public function tipo_submotivo_social()
    {
        return $this->hasMany(TipoSubmotivoSocial::class);
    }
}