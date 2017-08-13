<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaPsicologia extends Model
{
    protected $fillable = ['motivo_consulta','estado','antecedentes_medicos_id','antecedentes_familiares_id','user_id','beneficiario_id','genograma'];

    public function antecedentes_medicos()
    {
        return $this->belongsTo(AntecedentesMedicos::class);
    }

    public function antecedentes_familiares()
    {
        return $this->belongsTo(AntecedentesFamiliares::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function psicologo()
    {
        return $this->belongsTo(Psicologo::class);
    }

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }

}
