<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $fillable = ['nombres', 'apellidos', 'beneficiario_id'];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }

    public function telefonos()
    {
        return $this->hasMany(TelefonoTutor::class);
    }

}
