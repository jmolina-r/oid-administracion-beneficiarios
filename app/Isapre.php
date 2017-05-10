<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Isapre extends Model
{
    protected $fillable = ['organizacion'];

    public function datos_sociales()
    {
        return $this->hasMany(DatoSocial::class);
    }
}
