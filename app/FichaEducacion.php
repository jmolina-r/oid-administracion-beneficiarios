<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaEducacion extends Model
{
    protected $fillable = ['estado','edad','meses','dias','categ','categ_coordinacion','categ_lenguaje', 'categ_motricidad' , 'total_coordinacion','total_lenguaje','total_motricidad','total','funcionario_id','beneficiario_id','test_coordinacion_id','test_lenguaje_id','test_motricidad_id','pt_coordinacion','pt_lenguaje','pt_motricidad','pt','observacion'];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }

    public function testCoordinacion()
    {
        return $this->belongsTo(TestCoordinacion::class);
    }

    public function testLenguaje()
    {
        return $this->belongsTo(TestLenguaje::class);
    }

    public function testMotricidad()
    {
        return $this->belongsTo(TestMotricidad::class);
    }
}
