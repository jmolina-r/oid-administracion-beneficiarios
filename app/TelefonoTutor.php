<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TelefonoTutor extends Model
{
    protected $fillable = ['numero', 'tipo', 'tutor_id'];

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }
}
