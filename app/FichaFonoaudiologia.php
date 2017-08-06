<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaFonoaudiologia extends Model
{
    protected $fillable = ['motivo_de_consulta'];

    public function parienteHogar()
    {
        return $this->hasMany(ParienteHogarFono::class);
    }

    public function habitosSiNo()
    {
        return $this->belongsTo(HabitosSiNoFono::class);
    }

    public function desarrolloLenguajeEdad()
    {
        return $this->belongsTo(DesarrolloLenguajeEdades::class);
    }

    public function antecedentesPerinatales()
    {
        return $this->belongsTo(AntecedentesPerinatalesFono::class);
    }

    public function antecedentesPrenatales()
    {
        return $this->belongsTo(AntecedentesPrenatalesFono::class);
    }

    public function desarrolloPsicomotor()
    {
        return $this->belongsTo(DesarrolloPsicomotorEdades::class);
    }

    public function desarrolloSocial()
    {
        return $this->belongsTo(DesarrolloSocial::class);
    }

    public function antecedentesMorbidos()
    {
        return $this->belongsTo(AntecedentesMorbidosSiNoFono::class);
    }

    public function antecedentesMorbidosFamiliares()
    {
        return $this->belongsTo(AntecedentesMorbidosFamiliaresSiNoFono::class);
    }

    public function parientesHogarFono()
    {
        return $this->hasMany(ParienteHogarFono::class);
    }
}
