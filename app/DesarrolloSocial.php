<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesarrolloSocial extends Model
{
    protected $fillable = ['respeta_normas', 'comparte_juguetes', 'juega_otros', 'carinoso', 'berinches', 'frustra_facil',
        'irritable', 'agresivo', 'peleador', 'intereses', 'observaciones'];

    public function ingresoFonoaudiologia()
    {
        return $this->hasOne(FichaFonoaudiologia::class);
    }
}
