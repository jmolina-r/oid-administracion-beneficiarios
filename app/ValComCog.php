<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValComCog extends Model
{
    protected $fillable = ['puntaje_expresion', 'coment_expresion', 'puntaje_comprension', 'coment_comprension'];

    public function ingresoKinesiologia()
    {
        return $this->hasOne(FichaKinesiologia::class);
    }
}
