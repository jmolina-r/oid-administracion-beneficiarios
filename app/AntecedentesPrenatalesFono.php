<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedentesPrenatalesFono extends Model
{
    protected $fillable = ['plan_embarazo', 'acept_embarazo', 'control_embarazo', 'ingesta_med', 'ingesta_oh_drogas',
        'consumo_cigarrillo', 'estado_emocional', 'enfermedades_embarazo', 'otros_prenatales'];

    public function ingresoFonoaudiologia()
    {
        return $this->hasOne(FichaFonoaudiologia::class);
    }
}
