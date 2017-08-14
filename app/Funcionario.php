<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    //

    protected $fillable = ['rut', 'nombre', 'apellido', 'telefono', 'fecha_nacimiento', 'direccion', 'email', 'tipo_funcionario_id'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function tipo_funcionario()
    {
        return $this->belongsTo(TipoFuncionario::class);
    }

}