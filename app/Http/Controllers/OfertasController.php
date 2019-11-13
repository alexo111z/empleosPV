<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Oferta;
use App\RelacionTag;
use Illuminate\Http\Request;

class OfertasController extends Controller
{
    function ListaOfertas(){
//        $ofertas = Oferta::where('id_usuario', );
        $tags = RelacionTag::
        return view('ofertas.ofertas', compact('ofertas'));
    }
    function BusquedaAvanzada(){
        return view('ofertas.busqueda');
    }
    function VerOferta(){
        return view('ofertas.veroferta');
    }
    function Postulaciones(){
        return view('ofertas.postulaciones');
    }
}
