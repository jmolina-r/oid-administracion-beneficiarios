<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaFonoaudiologia extends Model
{
    protected $fillable = ['motivo_de_consulta'];


    public function habitos_si_no()
    {
        return $this->hasOne(HabitosSiNoFono::class);
    }

    public function desarrollo_lenguaje_edad()
    {
        return $this->hasOne(DesarrolloLenguajeEdades::class);
    }

    public function antecedentes_perinatales()
    {
        return $this->hasOne(AntecedentesPerinatalesFono::class);
    }

    public function antecedentes_prenatales()
    {
        return $this->hasOne(AntecedentesPrenatalesFono::class);
    }

    public function desarrollo_psicomotor()
    {
        return $this->hasOne(DesarrolloPsicomotorEdades::class);
    }

    public function desarrollo_social()
    {
        return $this->hasOne(DesarrolloSocial::class);
    }

    public function antecedentes_morbidos()
    {
        return $this->hasOne(AntecedentesMorbidosSiNoFono::class);
    }

    public function antecedentes_morbidos_familiares()
    {
        return $this->hasOne(AntecedentesMorbidosFamiliaresSiNoFono::class);
    }

    public function parientes_hogar_fono()
    {
        return $this->hasOne(ParienteHogarFono::class);
    }
}
