<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestCoordinacion extends Model
{
    protected $fillable = ['traslada', 'construye_puente', 'construye_torre', 'desabotona', 'abotona', 'enhebra', 'desata', 'copia_recta', 'copia_circulo', 'copia_cruz', 'copia_triang', 'copia_cuadra', 'dibuja_9', 'dibuja_6', 'dibuja_3', 'ordena'];


    public function ingresoEducacion()
    {
        return $this->hasOne(FichaEducacion::class);
    }
}