<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedentesMorbidosSiNoFono extends Model
{
    //

    protected $fillable = ['alergias_sn', 'alergias_desc', 'obesidad_sn', 'obesidad_desc', 'otitis_sn', 'otitis_desc',
        'diabetes_sn', 'diabetes_desc', 'cirugias_sn', 'cirugias_desc', 'traumatis_sn', 'traumatis_desc', 'epilepsia_sn',
        'epilepsia_desc', 'deficit_visual_sn', 'deficit_visual_desc', 'deficit_auditivo_sn', 'deficit_auditivo_desc',
        'paralisis_cerebral_sn', 'paralisis_cerebral_desc', 'otros_morbidos'];

    public function ingresoFonoaudiologia()
    {
        return $this->hasOne(FichaFonoaudiologia::class);
    }
}
