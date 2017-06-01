<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedentesMedicos extends Model
{
    protected $fillable = ['diagnostico','enfermedades_familiares', 'tratamientos_psiquiatra', 'tratamientos_fonoaudiologo', 'tratamientos_ocupacional', 'tratamientos_kinesiologo', 'tratamientos_psicologo', 'tratamientos_neurologo', 'medicamentos'];

    public function ingresoPsicologia()
    {
        return $this->hasOne(FichaPsicologia::class);
    }
}
