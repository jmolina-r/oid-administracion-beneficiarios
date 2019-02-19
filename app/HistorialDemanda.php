<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialDemanda extends Model
{
    protected $fillable = ['demanda_beneficiario_id','descripcion_id','estado_id'];

    public function descripcion()
    {
        return $this->belongsTo(Descripcion::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
    public function demanda_beneficiario()
    {
        return $this->belongsTo(DemandaBeneficiario::class);
    }
}
