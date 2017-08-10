<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadesVidaDiaria extends Model
{
    //pueden tomar los valores P,E y D
    protected $fillable = ['alimentacion','comentario_alimen','arreglo_personal','comentario_arreglo','banio','comentario_banio','vestuario_superior','comentario_superior','vestuario_inferior','comentario_inferior','ponerse_zapatos','comentario_zapatos','aseo_perianal','comentario_aseo','lavado_dental','comentario_dental','manejo_vesical','comentario_vesical','manejo_anal','comentario_anal','preparar_comida','comentario_comida','poner_mesa','comentario_mesa','limpieza_ligera','comentario_ligera','espacio_ordenado','comentario_orden','manejo_dinero','comentario_dinero','ir_compras','comentario_compras','locomocion','comentario_locomocion','resolver_problemas','comentario_problemas','adecuacion_social','comentario_adecuacion','seguir_instrucciones','comentario_instrucciones','expresar_necesidades','comentario_necesidades'];

    public function ingresoTerapiaOcupacional()
    {
        return $this->hasOne(FichaTerapiaOcupacional::class);
    }
}
