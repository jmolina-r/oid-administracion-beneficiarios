<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedentesPostnatalesFono extends Model
{
    protected $fillable = ['trat_post_parto', 'tipo_alimenta', 'limite_edad_alimenta', 'observaciones', 'operaciones_edad',
        'hospitalizaciones_edad'];

    public function ingresoFonoaudiologia()
    {
        return $this->hasOne(FichaFonoaudiologia::class);
    }
}
