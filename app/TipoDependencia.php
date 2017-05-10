<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDependencia extends Model
{
    protected $fillable = ['nombre'];

    public function fichas_discapacidades()
    {
        return $this->hasMany(FichaDiscapacidad::class);
    }
}
