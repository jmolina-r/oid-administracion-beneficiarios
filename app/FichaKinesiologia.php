<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaKinesiologia extends Model
{
    protected $fillable = ['motivo_consulta', 'situacion_laboral', 'situacion_familiar', 'asiste_centro_rhb', 'antecedentes_morbidos_id' , 'val_motora_id' , 'val_deambulacion_id' , 'val_movilidad_id' , 'val_social_id' , 'val_autocuidado_id' , 'val_sensorial_id' , 'val_com_cog_id' , 'val_evaluacion_id' , 'val_control_esfinter_id' , 'user_id' , 'beneficiario_id'];

    public function antecedentesMorbidos()
    {
        return $this->belongsTo(AntecedentesMorbidos::class);
    }

    public function val_motora()
    {
        return $this->belongsTo(ValMotora::class);
    }

    public function val_deambulacion()
    {
        return $this->belongsTo(ValDeambulacion::class);
    }

    public function val_movilidad()
    {
        return $this->belongsTo(ValMovilidad::class);
    }

    public function val_social()
    {
        return $this->belongsTo(ValSocial::class);
    }

    public function val_autocuidado()
    {
        return $this->belongsTo(ValAutocuidado::class);
    }

    public function val_sensorial()
    {
        return $this->belongsTo(ValSensorial::class);
    }

    public function val_com_cog()
    {
        return $this->belongsTo(ValComCog::class);
    }

    public function val_evaluacion()
    {
        return $this->belongsTo(ValEvaluacion::class);
    }

    public function val_control_esfinter()
    {
        return $this->belongsTo(ValControlEsfinter::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }
}
