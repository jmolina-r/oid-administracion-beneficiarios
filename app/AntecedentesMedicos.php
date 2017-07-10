<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedentesMedicos extends Model
{
    protected $fillable = ['enfermedades_familiares', 'tratamientos_neurologo_nombre', 'tratamientos_neurologo_sesiones', 'tratamientos_psiquiatra_nombre', 'tratamientos_psiquiatra_sesiones', 'tratamientos_fonoaudiologo_nombre', 'tratamientos_fonoaudiologo_sesiones', 'tratamientos_ocupacional_nombre', 'tratamientos_ocupacional_sesiones', 'tratamientos_kinesiologo_nombre', 'tratamientos_kinesiologo_sesiones', 'tratamientos_psicologo_nombre', 'tratamientos_psicologo_sesiones', 'medicamentos'];

    public function ingresoPsicologia()
    {
        return $this->hasOne(FichaPsicologia::class);
    }
}
