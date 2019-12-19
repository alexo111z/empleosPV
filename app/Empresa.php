<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';

    protected $fillable = [
        'nombre',
        'rfc',
        'd_fiscal',
        'pais',
        'estado',
        'ciudad',
        'telefono',
        'contacto',
        'id_social',
        'id_giro',
        'email',
        'password',
    ];

    public function rsocial(){
        return $this->belongsTo(RSocial::class, 'id_social');
    }
    public function giro(){
        return $this->belongsTo(Giro::class, 'id_giro');
    }
    public function idpais(){
        return $this->belongsTo(Pais::class, 'id_pais');
    }
    public function idestado(){
        return $this->belongsTo(Estado::class, 'id_estado');
    }
    public function idciudad(){
        return $this->belongsTo(Municipio::class, 'id_ciudad');
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
