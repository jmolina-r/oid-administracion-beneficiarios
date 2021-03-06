<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaTerapiaOcupacional extends Model
{
    protected $fillable = ['motivo_consulta','observaciones','estado','derivado_por','relacion_paciente', 'observaciones_generales', 'actividades_vida_diaria_id','antecedentes_salud_id','antecedentes_so_fa_id','desarrollo_evolutivo_id','habilidades_sociales_id' ,'historial_clinico_id' ,'funcionario_id','beneficiario_id'];

    public function actividades_vida_diaria()
    {
        return $this->belongsTo(ActividadesVidaDiaria::class);
    }

    public function antecedentes_salud()
    {
        return $this->belongsTo(AntecedentesSalud::class);
    }

    public function antecedentes_so_fa()
    {
        return $this->belongsTo(AntecedentesSocioFamiliares::class);
    }

    public function desarrollo_evolutivo()
    {
        return $this->belongsTo(DesarrolloEvolutivo::class);
    }

    public function habilidades_sociales()
    {
        return $this->belongsTo(HabilidadesSociales::class);
    }

    public function historial_clinico()
    {
        return $this->belongsTo(HistorialClinico::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }


    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }
}
