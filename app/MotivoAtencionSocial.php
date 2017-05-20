<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotivoAtencionSocial extends Model
{
    protected $fillable=['nombre', 'descripcion', 'tipo_motivo_social_id'];

    public function fichaAtencionSocial(){
        return $this->belongsTo(FichaAtencionSocial::class);
    }

    public function tipo_motivo_social()
    {
        return $this->belongsTo(TipoMotivoSocial::class);
    }
}
