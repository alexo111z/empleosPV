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
        'pais',
        'estado',
        'ciudad',
    ];

    public function estudios(){
        return $this->belongsTo(Empresa::class, 'id_emp');
    }

}
