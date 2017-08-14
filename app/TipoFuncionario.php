<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoFuncionario extends Model
{

    protected $fillable = ['nombre'];


    public function funcionario()
    {
        return $this->hasMany(Funcionario::class);
    }
}
