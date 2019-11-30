<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitudes';

    protected $fillable = [
        'id_oferta',
        'id_usuario'
    ];

    public function oferta(){
        return $this->belongsTo(Oferta::class, 'id_oferta');
    }
    public function user(){
        return $this->belongsTo(User::class, 'id_usuario');
    }

}
