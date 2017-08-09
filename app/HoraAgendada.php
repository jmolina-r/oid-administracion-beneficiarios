<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HoraAgendada extends Model
{

    use SoftDeletes;

    protected $fillable = ['beneficiario_id', 'asist_sn', 'hora', 'fecha', 'razon_inasis', 'user_id'];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function beneficiario()
    {
        return $this->hasOne(Beneficiario::class);
    }
}
