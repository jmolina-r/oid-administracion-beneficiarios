<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformeCierre extends Model
{
    protected $fillable = ['desercion', 'culmino_proceso', 'observacion', 'area', 'ficha', 'beneficiario_id'];

    public function beneficiario()
    {
        return $this->hasOne(Beneficiario::class);
    }

}
