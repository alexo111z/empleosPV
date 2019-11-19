<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'email', 'password',
        'apellido',
        'nacimiento',
        'genero',
        'id_estudios',
        'id_area',
        'edad',
    ];
    public function getFullnameAttribute(){
        return $this->nombre .' '. $this->apellido;
    }
    public function estudios(){
        return $this->belongsTo(NEstudio::class, 'id_estudios');
    }
    public function area(){
        return $this->belongsTo(Area::class, 'id_area');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
