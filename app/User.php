<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        /*'name',*/'username', 'email', 'password', 'status', 'funcionario_id', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        //if ($this->roles()->where('nombre', $role)->first()) {
        if ($this->role->nombre == $role) {
            return true;
        }
        return false;
    }

    public function getNombreFuncionario()
    {
        return $this->funcionario()->first()->getNombreCompleto();
    }

    public function getTipoFuncionario()
    {
        return $this->funcionario()->first()->tipo_funcionario()->first()->nombre;
    }
}
