<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfertasController extends Controller
{
    function ListaOfertas(){
        return view('ofertas.ofertas');
    }
    function BusquedaAvanzada(){
        return view('ofertas.busqueda');
    }
    function VerOferta(){
        return view('ofertas.veroferta');
    }
}
