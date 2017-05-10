<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValSocial extends Model
{
    protected $fillable = ['puntaje_int_social', 'coment_int_social', 'puntaje_sol_problemas', 'coment_sol_problemas', 'puntaje_memoria', 'coment_memoria'];

    public function ingresoKinesiologia()
    {
        return $this->hasOne(FichaKinesiologia::class);
    }
}
