<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaTaller extends Model
{
    protected $fillable = ['nombre_taller','objetivo','estado', 'funcionario_id' , 'beneficiario_id'];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }
}
