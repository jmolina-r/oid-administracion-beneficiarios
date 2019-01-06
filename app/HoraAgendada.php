<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HoraAgendada extends Model
{

    protected $fillable = ['tipo','asist_sn', 'hora', 'fecha', 'razon_inasis', 'user_id'];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    //public function beneficiario()
    //{
    //    return $this->hasOne(Beneficiario::class);
    //}

    public function setAsisteSNAttribute($valor)
    {
        $this->attributes['asist_sn'] = $valor;
    }

    public function setRazonInasistenciaAttribute($valor)
    {
        $this->attributes['razon_inasis'] = $valor;
    }
}
