<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesarrolloPsicomotorEdades extends Model
{
    protected $fillable = ['control_cabeza', 'sento', 'paro', 'camino', 'control_esf_diurno', 'control_esf_nocturno'];

    public function ingresoFonoaudiologia()
    {
        return $this->hasOne(FichaFonoaudiologia::class);
    }
}
