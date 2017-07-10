<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesarrolloLenguajeEdades extends Model
{
    protected $fillable = ['balbuceo', 'sonrio', 'primeras_palabras', 'frases_dos_palabras', 'oraciones', 'hablo_espo',
        'siguio_inst'];

    public function ingresoFonoaudiologia()
    {
        return $this->hasOne(FichaFonoaudiologia::class);
    }
}
