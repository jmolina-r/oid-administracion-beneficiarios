<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Prestacion extends Model
{
    use SoftDeletes;

    protected $fillable=['nombre','area'];

    protected $dates = ['deleted_at'];

}
