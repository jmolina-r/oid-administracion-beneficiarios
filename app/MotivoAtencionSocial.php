<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotivoAtencionSocial extends Model
{
    protected $fillable=['ficha_atencion_social_id','tipo_motivo_social_id','tipo_submotivo_id',
    'tipo_ayuda_id','fecha_visita', 'observación', 'documento'];

    public function ficha_atencion_social()
    {
        return $this->hasOne(FichaAtencionSocial::class);
    }

    public function tipo_motivo_social()
    {
        return $this->hasOne(TipoMotivoSocial::class);
    }

    public function tipo_submotivo()
    {
        return $this->belongTo(TipoSubMotivoSocial::class);
    }

    public function tipo_ayuda()
    {
        return $this->belongTo(TipoAyudaTecnicoSocial::class);
    }
}
