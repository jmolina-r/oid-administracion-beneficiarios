<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesarrolloLenguajeEdades extends Model
{
    protected $fillable = ['balbuceo', 'sonrio', 'primeras_palabras', 'frases_dos_palabras', 'oraciones', 'hablo_espo',
        'siguio_inst','mira_ojos', 'mira_labios', 'comunica_palabras', 'comunica_jerga', 'comunica_palabras_sueltas',
        'comunica_gestos', 'entiende_dice', 'desconocidos_entienden'];

    public function ingresoFonoaudiologia()
    {
        return $this->hasOne(FichaFonoaudiologia::class);
    }
}
