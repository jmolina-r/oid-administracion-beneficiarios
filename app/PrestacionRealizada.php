<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrestacionRealizada extends Model
{
    protected $fillable=['fecha', 'beneficiario_id', 'prestacions_id'];

    public function beneficiario(){
        return $this->hasOne(Beneficiario::class);
    }

    public function prestacion(){
        return $this->hasOne(Prestacion::class);
    }

}
