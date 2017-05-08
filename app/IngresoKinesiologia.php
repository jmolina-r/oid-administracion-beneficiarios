<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngresoKinesiologia extends Model
{
    protected $fillable = ['diagnostico', 'motivo_consulta', 'situacion_laboral', 'situacion_familiar', 'asiste_centro_rhb', 'id_antecedentes_morbidos' , 'id_val_motora' , 'id_val_deambulacion' , 'id_val_movilidad' , 'id_val_social' , 'id_val_autocuidado' , 'id_val_sensorial' , 'id_val_com_cog' , 'id_val_evaluacion' , 'id_val_control_esfinter' , 'id_kinesiologo' , 'id_beneficiario'];

    public function antecedentesMorbidos()
    {
        return $this->belongsTo(AntecedentesMorbidos::class);
    }

    public function val_motoras()
    {
        return $this->belongsTo(ValMotora::class);
    }

    public function val_deambulacions()
    {
        return $this->belongsTo(ValDeambulacion::class);
    }

    public function val_movilidads()
    {
        return $this->belongsTo(ValMovilidad::class);
    }

    public function val_socials()
    {
        return $this->belongsTo(ValSocial::class);
    }

    public function val_autocuidados()
    {
        return $this->belongsTo(ValAutocuidado::class);
    }

    public function val_sensorials()
    {
        return $this->belongsTo(ValSensorial::class);
    }

    public function val_com_cogs()
    {
        return $this->belongsTo(ValComCog::class);
    }

    public function val_evaluacions()
    {
        return $this->belongsTo(ValEvaluacion::class);
    }

    public function val_control_esfinters()
    {
        return $this->belongsTo(ValControlEsfinter::class);
    }

    public function kinesiologos()
    {
        return $this->belongsTo(Kinesiologo::class);
    }

    public function beneficiarios()
    {
        return $this->belongsTo(Beneficiario::class);
    }
}
