<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaDiscapacidad extends Model
{
    protected $fillable = ['requiere_cuidado', 'diagnostico', 'otras_enfermedades', 'ficha_beneficiario_id', 'tipo_dependencia_id'];


    public function ficha_beneficiario()
    {
        return $this->belongsTo(FichaBeneficiario::class);
    }

    public function tipo_dependencia()
    {
        return $this->belongsTo(TipoDependencia::class);
    }

    public function porcentaje_discapacidades()
    {
        return $this->hasMany(FichaDiscTipoDisc::class);
    }
}
