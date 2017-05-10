<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValEvaluacion extends Model
{
    protected $fillable = ['conexion_medio', 'nivel_cognitivo_apar'];

    public function ingresoKinesiologia()
    {
        return $this->hasOne(FichaKinesiologia::class);
    }
}
