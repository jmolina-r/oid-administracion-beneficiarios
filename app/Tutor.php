<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $fillable = ['nombre', 'apellido', 'beneficiario_id'];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }

}
