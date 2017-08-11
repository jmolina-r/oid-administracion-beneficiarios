<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParienteHogarFono extends Model
{
    protected $fillable = ['observaciones_parientes','nombre1', 'parentesco1', 'edad1', 'escolaridad1', 'ocupacion1','nombre2', 'parentesco2', 'edad2', 'escolaridad2', 'ocupacion2','nombre3', 'parentesco3', 'edad3', 'escolaridad3', 'ocupacion3','nombre4', 'parentesco4', 'edad4', 'escolaridad4', 'ocupacion4','nombre5', 'parentesco5', 'edad5', 'escolaridad5', 'ocupacion5','nombre6', 'parentesco6', 'edad6', 'escolaridad6', 'ocupacion6'];


    public function fichaFonoaudiologia()
    {
        return $this->hasOne(FichaFonoaudiologia::class);
    }
}
