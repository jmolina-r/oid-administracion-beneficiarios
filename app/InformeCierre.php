<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformeCierre extends Model
{
    protected $fillable = ['cant_sesiones', 'fecha_inicio', 'fecha_termino', 'motivo_atencion', 'objetivos_trabajados',  'desercion', 'culmino_proceso', 'observacion'];

    public function beneficiario()
    {
        return $this->hasOne(Beneficiario::class);
    }

    public function prestacionRealizada()
    {
        return $this->hasOne(PrestacionRealizada::class);
    }

}
