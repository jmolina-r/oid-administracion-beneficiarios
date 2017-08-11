<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaFonoaudiologia extends Model
{
    protected $fillable = ['motivo_de_consulta','habitos_si_no_id','desarrollo_le_ed_id','antecedentes_peri_fono_id','antecedentes_pre_fono_id','desarrollo_psi_ed_id','antecedentes_mor_fono_id','antecedentes_mor_fa_fono_id','parientes_hogar_fono_id','antecedentes_pos_fono_id'];


    public function habitos_si_no()
    {
        return $this->hasOne(HabitosSiNoFono::class);
    }

    public function desarrollo_le_ed()
    {
        return $this->hasOne(DesarrolloLenguajeEdades::class);
    }

    public function antecedentes_peri_fono()
    {
        return $this->hasOne(AntecedentesPerinatalesFono::class);
    }

    public function antecedentes_pre_fono()
    {
        return $this->hasOne(AntecedentesPrenatalesFono::class);
    }

    public function antecedentes_pos_fono()
    {
        return $this->hasOne(AntecedentesPostnatalesFono::class);
    }

    public function desarrollo_psi_ed()
    {
        return $this->hasOne(DesarrolloPsicomotorEdades::class);
    }

    public function desarrollo_so_fono()
    {
        return $this->hasOne(DesarrolloSocialFono::class);
    }

    public function antecedentes_mor_fono()
    {
        return $this->hasOne(AntecedentesMorbidosSiNoFono::class);
    }

    public function antecedentes_mor_fa_fono()
    {
        return $this->hasOne(AntecedentesMorbidosFamiliaresSiNoFono::class);
    }

    public function parientes_hogar_fono()
    {
        return $this->hasOne(ParienteHogarFono::class);
    }
}
