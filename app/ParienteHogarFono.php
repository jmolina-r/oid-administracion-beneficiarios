<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParienteHogarFono extends Model
{
    protected $fillable = ['nombre', 'parentesco', 'edad', 'escolaridad', 'ocupacion'];

    public function ingresoFonoaudiologia()
    {
        return $this->belongsTo(FichaFonoaudiologia::class);
    }
}
