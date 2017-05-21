<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotivoAtencionSocial extends Model
{
    protected $fillable=['ficha_atencion_social_id','tipo_motivo_social_id'];

    public function ficha_atencion_social()
    {
        return $this->belongsTo(FichaAtencionSocial::class);
    }

    public function tipo_motivo_social()
    {
        return $this->hasOne(TipoMotivoSocial::class);
    }

    public function submotivo_atencion_social()
    {
        return $this->hasMany(SubMotivoAtencionSocial::class);
    }

    public function ayuda_tecnico_social()
    {
        return $this->hasMany(AyudaTecnicoSocial::class);
    }
}
