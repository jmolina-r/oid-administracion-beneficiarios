<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroSocialHogar extends Model
{
    protected $fillable = ['porcentaje', 'en_tramite', 'beneficiario_id'];


    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }

}
