<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoraAgendada extends Model
{
    protected $fillable = ['beneficiario_id', 'asist_sn', 'hora', 'fecha', 'razon_inasis', 'user_id'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function beneficiario()
    {
        return $this->hasOne(Beneficiario::class);
    }
}
