<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaAtencionSocial extends Model
{
    protected $fillable=['numero','descripcion'];

    public function prestacionRealizada(){
        return $this->belongsTo(PrestacionRealizada::class);
    }
}
