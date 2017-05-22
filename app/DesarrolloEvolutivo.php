<?php
/**
 * Created by PhpStorm.
 * User: Claudio Gonzalez
 * Date: 21-05-2017
 * Time: 19:38
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
class DesarrolloEvolutivo extends Model
{
    //sn=si/no
    //sna=si/no/aveces
    protected $fillable = ['edad_sento','edad_camino','edad_palabra','control_vesical_sn','edad_control_vesical','control_anal_sn','edad_control_anal','vesical_diurno','vesical_nocturno','anal_diurno','anal_nocturno','observaciones','estabilidad_caminar_sna','caidas_frecuentes_sna','dominancia_lateral_sna','garra_sna','pinza_sna','como_pinza','dibuja_sna','escribe_sna','corta_sna','estimulos_visuales','estimulos_auditivos','estimulos_gustativos','estimulos_tactiles','estimulos_olfativos','come_solo_sn','acepta_solido_sn','acepta_semisolido_sn','acepta_liquidos_sn','temperatura_preferida','sabores_preferidos','colores_preferidos','ejemplo_comida'];

    public function ingresoKinesiologia()
    {
        return $this->hasOne(FichaTerapiaOcupacional::class);
    }
}