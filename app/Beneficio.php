<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficio extends Model
{
    protected $fillable = ['nombre'];

    public function datos_sociales()
    {
        return $this->belongsToMany(DatoSocial::class);
    }
}
