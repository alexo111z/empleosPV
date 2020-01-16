<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Oferta;
use App\RelacionTag;

class apiController extends Controller
{
    function ofertas(){
        $ofertas = Oferta::all();
        $relT = RelacionTag::where('id_usuario', '=', null)->get();

        foreach($ofertas as $id => $oferta){
        $jtag = [];
            foreach($relT as $t){
                $in = [];
                if ($t->id_oferta == $oferta->id) {
                    $in = [
                    'id' => $t->id,
                    'id_of' => $t->id_oferta,
                    'id_t' => $t->id_tag,
                    'tag' => $t->tag->nombre,
                    ];
                    array_push($jtag, $in);
                    //return gettype($in);
                }  
            }
            //return $jtag;
            $data[$id] = [
                'id' => $oferta->id,
                'id_emp' => $oferta->empresa->nombre,
                'titulo' => $oferta->titulo,
                'd_corta' => $oferta->d_corta,
                'd_larga' => $oferta->d_larga,
                'salario' => $oferta->salario,
                't_contrato' => $oferta->t_contrato,
                'vigencia' => $oferta->vigencia,
                'existe' => $oferta->existe,
                'id_pais' => $oferta->idpais->pais,
                'id_estado' => $oferta->idestado->estado,
                'id_ciudad' => $oferta->idciudad->municipio,
                'tags' => $jtag,
            ];
        }
        return response()->json($data);
    }
}
