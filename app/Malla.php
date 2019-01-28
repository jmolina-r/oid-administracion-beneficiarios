<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Malla extends Model
{
    use SoftDeletes;

    protected $fillable = ['hora_agendada_id','beneficiario_id'];

    public function beneficiario()
    {
        return $this->hasOne(Beneficiario::class);
    }

    public function hora_agendada()
    {
        return $this->hasOne(HoraAgendada::class);
    }
}
