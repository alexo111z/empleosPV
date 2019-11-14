<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Oferta;
use App\RelacionTag;
use Illuminate\Http\Request;

class OfertasController extends Controller
{
    function ListaOfertas(){
        $ofertas = Oferta::all();
        $rTags = RelacionTag::where('id_oferta', '>', 0)->get();
        return view('ofertas.ofertas', compact('ofertas', 'rTags'));
    }
    function BusquedaAvanzada(){
        return view('ofertas.busqueda');
    }
    function VerOferta($id){
        $oferta = Oferta::findOrFail($id);
        $tags = RelacionTag::where('id_oferta', '=', $id)->get();
        return view('ofertas.veroferta', compact('oferta','tags'));
    }
    function Postulaciones(){
        return view('ofertas.postulaciones');
    }
}
