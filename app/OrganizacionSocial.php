<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizacionSocial extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    public function datos_sociales()
    {
        return $this->hasMany(DatoSocial::class);
    }
}
