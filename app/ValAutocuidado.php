<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValAutocuidado extends Model
{
    protected $fillable = ['puntaje_alimentacion', 'coment_alimentacion', 'puntaje_arreglo_pers', 'coment_arreglo_pers', 'puntaje_bano', 'coment_bano', 'puntaje_vest_sup', 'coment_vest_sup', 'puntaje_vest_inf', 'coment_vest_inf', 'puntaje_aseo_pers', 'coment_aseo_pers'];

    public function ingresoKinesiologia()
    {
        return $this->hasOne(IngresoKinesiologia::class);
    }
}
