<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //
    protected $fillable = ['nombre'];

    public function historial_demanda()
    {
        return $this->hasMany(HistorialDemanda::class);
    }
}
