<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SistemaProteccion extends Model
{
    protected $fillable = ['nombre'];

    public function datos_sociales()
    {
        return $this->hasMany(DatoSocial::class);
    }

}
