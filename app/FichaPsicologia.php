<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaPsicologia extends Model
{
    protected $fillable = ['motivo_consulta','antecedentes_medicos_id','antecedentes_familiares_id','profesional_id','beneficiario_id','genograma'];

    public function antecedentes_medicos()
    {
        return $this->belongsTo(AntecedentesMedicos::class);
    }

    public function antecedentes_familiares()
    {
        return $this->belongsTo(AntecedentesFamiliares::class);
    }

    public function profesional()
    {
        return $this->belongsTo(Profesional::class);
    }

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }

}
