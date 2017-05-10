<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CredencialDiscapacidad extends Model
{
    protected $fillable = ['fecha_vencimiento', 'beneficiario_id'];


    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }
}
