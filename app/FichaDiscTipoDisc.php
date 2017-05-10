<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaDiscTipoDisc extends Model
{
    protected $fillable = ['porcentaje_discapacidad', 'ficha_discapacidad_id', 'tipo_discapacidad_id'];

    public function ficha_discapacidad()
    {
        return $this->belongsTo(FichaDiscapacidad::class);
    }

    public function tipo_discapacidad()
    {
        return $this->belongsTo(TipoDiscapacidad::class);
    }
}
