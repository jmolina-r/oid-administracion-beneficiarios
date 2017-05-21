<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AyudaTecnicoSocial extends Model
{
    protected $fillable=['nombre','tipo','descripcion'];

    public function motivoAtencionSocial(){
        return $this->belongsTo(MotivoAtencionSocial::class);
    }
}
