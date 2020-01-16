<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\UserResetPasswordNotification;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
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
        'id_pais', 'id_estado', 'id_ciudad',
        'coment', 'telefono', 'conocimientos', 'alias',
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
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPasswordNotification($token)); //php artisan make:notification AdminResetPasswordNotification
    }

     /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

}
