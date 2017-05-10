<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDiscapacidad extends Model
{
    protected $fillable = ['nombre'];

    public function porcentaje_discapacidad_ficha_discapacidad()
    {
        return $this->hasMany(FichaDiscTipoDisc::class);
    }
}
