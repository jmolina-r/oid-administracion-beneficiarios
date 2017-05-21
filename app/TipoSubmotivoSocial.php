<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSubmotivoSocial extends Model
{
    protected $fillable = ['nombre'];

    public function submotivo_atencion_social()
    {
        return $this->hasMany(MotivoAtencionSocial::class);
    }
}
