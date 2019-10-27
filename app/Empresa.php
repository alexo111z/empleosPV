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

    protected $hidden = [
        'password',// 'remember_token',
    ];

}
