<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValSensorial extends Model
{
    protected $fillable = ['visual', 'auditivo', 'tactil', 'propioceptivo', 'vestibular'];

    public function ingresoKinesiologia()
    {
        return $this->hasOne(IngresoKinesiologia::class);
    }
}
