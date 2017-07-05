<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParienteHogarFono extends Model
{
    protected $fillable = ['nombre', 'parentesco', 'edad', 'escolaridad', 'ocupacion', 'ficha_fonoaudiologia_id'];

    public function ingresoFonoaudiologia()
    {
        return $this->belongsTo(FichaFonoaudiologia::class);
    }

    public function fichaFonoaudiologia()
    {
        return $this->hasOne(FichaFonoaudiologia::class);
    }
}
