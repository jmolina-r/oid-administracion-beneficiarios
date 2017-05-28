<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HabitosSiNoFono extends Model
{
    protected $fillable = ['mamadera', 'chupete', 'chupa_dedo', 'come_solo_tipo', 'viste_solo', 'boca_abierta_dia',
        'boca_abierta_noche'];


    public function ingresoFonoaudiologia()
    {
        return $this->hasOne(FichaFonoaudiologia::class);
    }
}
