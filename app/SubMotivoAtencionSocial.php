<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMotivoAtencionSocial extends Model
{
    protected $fillable=['nombre','fecha','descripcion'];

    public function motivoAtencionSocial(){
        return $this->belongsTo(MotivoAtencionSocial::class);
    }
}
