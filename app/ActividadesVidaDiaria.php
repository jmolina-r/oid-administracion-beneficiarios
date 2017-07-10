<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadesVidaDiaria extends Model
{
    //pueden tomar los valores P,E y D
    protected $fillable = ['alimentacion','arreglo_personal','banio','vestuario_superior','vestuario_inferior','ponerse_zapatos','aseo_perianal','lavado_dental','manejo_vesical','manejo_anal','preparar_comida','poner_mesa','limpieza_ligera','espacio_ordenado','manejo_dinero','ir_compras','locomocion','resolver_problemas','adecuacion_social','seguir_instrucciones','expresar_necesidades'];

    public function ingresoTerapiaOcupacional()
    {
        return $this->hasOne(FichaTerapiaOcupacional::class);
    }
}
