<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedentesMorbidosFamiliaresSiNoFono extends Model
{
    protected $fillable = ['diabetes_sn_mor_fa', 'hipertension_sn', 'epilepsia_sn_mor_fa', 'deficiencia_mental_sn', 'autismo_sn',
        'trast_lenguaje_sn', 'trast_aprendizaje_sn', 'trast_visuales_sn', 'trast_auditivos_sn', 'trast_psiquiatricos_sn'];

    public function ingresoFonoaudiologia()
    {
        return $this->hasOne(FichaFonoaudiologia::class);
    }
}
