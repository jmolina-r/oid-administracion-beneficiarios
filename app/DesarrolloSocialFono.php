<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesarrolloSocialFono extends Model
{
    protected $fillable = ['respeta_normas', 'comparte_juguetes', 'juega_otros', 'carinoso', 'berrinches', 'frustra_facil',
        'irritable', 'agresivo', 'peleador', 'intereses', 'observaciones_social'];

    public function ingresoFonoaudiologia()
    {
        return $this->hasOne(FichaFonoaudiologia::class);
    }
}
