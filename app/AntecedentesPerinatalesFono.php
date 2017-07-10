<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedentesPerinatalesFono extends Model
{
    protected $fillable = ['tipo_parto', 'suf_fetal', 'edad_gest', 'lugar_naci', 'peso', 'talla', 'apgar', 'comp_parto',
        'hospitalizaciones', 'otros'];

    public function ingresoFonoaudiologia()
    {
        return $this->hasOne(FichaFonoaudiologia::class);
    }
}
