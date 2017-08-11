<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParienteHogarFono extends Model
{
    protected $fillable = ['observaciones','nombre1', 'parentesco1', 'edad1', 'escolaridad1', 'ocupacion1','nombre2', 'parentesco2', 'edad2', 'escolaridad2', 'ocupacion2','nombre3', 'parentesco3', 'edad3', 'escolaridad3', 'ocupacion3'];


    public function fichaFonoaudiologia()
    {
        return $this->hasOne(FichaFonoaudiologia::class);
    }
}
