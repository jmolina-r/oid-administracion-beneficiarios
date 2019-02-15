<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demanda extends Model
{
    protected $fillable = ['nombre'];

    public function demanda_beneficiario()
    {
        return $this->hasMany(DemandaBeneficiario::class);
    }
}
