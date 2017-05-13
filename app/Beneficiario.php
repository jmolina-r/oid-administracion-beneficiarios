<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    protected $fillable = ['nombre', 'apellido', 'fecha_nacimiento', 'sexo', 'rut',  'pais_id', 'estado_civil_id', 'educacion_id', 'ocupacion_id'];

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function telefonos()
    {
        return $this->hasMany(Telefono::class);
    }

    public function domicilio()
    {
        return $this->hasOne(Domicilio::class);
    }

    public function estado_civil()
    {
        return $this->belongsTo(EstadoCivil::class);
    }

    public function educacion()
    {
        return $this->belongsTo(Educacion::class);
    }

    public function ocupacion()
    {
        return $this->belongsTo(Ocupacion::class);
    }

    public function tutor()
    {
        return $this->hasOne(Tutor::class);
    }

    public function registro_social_hogar()
    {
        return $this->hasOne(RegistroSocialHogar::class);
    }
    public function credencial_discapacidad()
    {
        return $this->hasOne(CredencialDiscapacidad::class);
    }
}
