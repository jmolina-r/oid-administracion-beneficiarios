<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Demanda extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['nombre'];

    public function demanda_beneficiario()
    {
        return $this->hasMany(DemandaBeneficiario::class);
    }
}
