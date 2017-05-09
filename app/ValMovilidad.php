<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValMovilidad extends Model
{
    protected $fillable = ['puntaje_trans_cama_silla', 'coment_trans_cama_silla', 'puntaje_traslado_bano', 'coment_traslado_bano', 'puntaje_traslado_ducha', 'coment_traslado_ducha'];

    public function ingresoKinesiologia()
    {
        return $this->hasOne(FichaKinesiologia::class);
    }
}
