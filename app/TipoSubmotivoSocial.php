<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSubmotivoSocial extends Model
{
    protected $fillable = ['nombre','descripcion','tipo_motivo_social_id'];

    public function submotivo_atencion_social()
    {
        return $this->hasOne(SubMotivoAtencionSocial::class);
    }

    public function tipo_motivo_social()
    {
        return $this->belongsTo(TipoMotivoSocial::class);
    }
}
