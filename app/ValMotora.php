<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValMotora extends Model
{
    protected $fillable = ['rom', 'fm', 'tono', 'dolor', 'hab_motrices', 'equilibrio', 'coordinacion'];

    public function ingresoKinesiologia()
    {
        return $this->hasOne(IngresoKinesiologia::class);
    }
}
