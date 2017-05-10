<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fonasa extends Model
{
    protected $fillable = ['tramo'];

    public function datos_sociales()
    {
        return $this->hasMany(DatoSocial::class);
    }
}
