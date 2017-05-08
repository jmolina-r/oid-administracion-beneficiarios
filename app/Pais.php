<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $fillable = ['nombre'];

    public function beneficiarios()
    {
        return $this->hasMany(Beneficiario::class);
    }
}
