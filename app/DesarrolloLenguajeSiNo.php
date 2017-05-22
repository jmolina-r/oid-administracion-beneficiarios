<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesarrolloLenguajeSiNo extends Model
{
    protected $fillable = ['mira_ojos', 'mira_labios', 'comunica_palabras', 'comunica_jerga', 'comunica_palabras_sueltas',
        'comunica_gestos', 'entiende_dice', 'desconocidos_entienden'];

    public function ingresoFonoaudiologia()
    {
        return $this->hasOne(DesarrolloLenguajeEdades::class);
    }
}
