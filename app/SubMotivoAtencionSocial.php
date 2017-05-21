<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMotivoAtencionSocial extends Model
{
    protected $fillable=['nombre','fecha','observacion','motivo_atencion_social_id','tipo_submotivo_social_id'];

    public function motivo_atencion_social(){

        return $this->belongsTo(MotivoAtencionSocial::class);
    }

    public function tipo_submotivo_social()
    {
        return $this->hasOne(TipoSubmotivoSocial::class);
    }
}
