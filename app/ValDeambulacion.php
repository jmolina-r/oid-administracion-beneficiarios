<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValDeambulacion extends Model
{
    protected $fillable = ['puntaje_desp_caminando', 'coment_desp_caminando', 'puntae_escaleras', 'coment_escaleras'];

    public function ingresoKinesiologia()
    {
        return $this->hasOne(FichaKinesiologia::class);
    }
}
