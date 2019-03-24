<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestMotricidad extends Model
{
    protected $fillable = ['salta', 'camina', 'lanza', 'para_10', 'para_5', 'para_1', 'camina_punta', 'salta_20', 'salta_3', 'coge', 'camina_adelante', 'camina_atras' ];

    public function ingresoEducacion()
    {
        return $this->hasOne(FichaEducacion::class);
    }
}
