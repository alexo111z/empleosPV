<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = 'ofertas';

    protected $fillable = [
        'id_emp',
        'titulo',
        'd_corta',
        'd_larga',
        'salario',
        't_contrato',
        'vigencia',
        'id_pais',
        'id_estado',
        'id_ciudad',
    ];

    public function empresa(){
        return $this->belongsTo(Empresa::class, 'id_emp');
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

}
