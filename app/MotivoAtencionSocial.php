<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotivoAtencionSocial extends Model
{
    protected $fillable=['nombre','descripcion'];

    public function fichaAtencionSocial(){
        return $this->belongsTo(FichaAtencionSocial::class);
    }
}
