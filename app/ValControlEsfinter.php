<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValControlEsfinter extends Model
{
    protected $fillable = ['puntaje_control_vejiga', 'coment_control_vejiga', 'puntaje_control_intestino', 'coment_control_intestino'];

    public function ingresoKinesiologia()
    {
        return $this->hasOne(IngresoKinesiologia::class);
    }
}
