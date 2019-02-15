<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemandaBeneficiario extends Model
{
    protected $fillable = ['demanda_id', 'beneficiario_id'];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }

    public function demanda()
    {
        return $this->belongsTo(Demanda::class);
    }

    public function historial_demanda()
    {
        return $this->hasMany(HistorialDemanda::class);
    }
}
