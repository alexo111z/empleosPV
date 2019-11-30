<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Oferta;
use App\RelacionTag;
use App\Solicitud;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $ufer = null;
        if (Auth::check()){
            $user = User::findOrFail(auth()->user()->id);
            $ufer = Solicitud::where('id_usuario', $user->id)->where('id_oferta', $id)->where('estado', 1)->get();
        }
        $oferta = Oferta::findOrFail($id);
        $tags = RelacionTag::where('id_oferta', '=', $id)->get();
        return view('ofertas.veroferta', compact('oferta','tags', 'ufer'));
    }
    function solicitar($id){
        $user = User::findOrFail(auth()->user()->id);

        Solicitud::create([
            'id_oferta' => $id,
            'id_usuario' => $user->id,
        ]);
        return back();
    }

    function Postulaciones(){
        $user = User::findOrFail(auth()->user()->id);

        $ofertas = Solicitud::where('id_usuario', $user->id)->where('estado', 1)->get();
        $rTags = RelacionTag::where('id_oferta', '>', 0)->get();

        return view('ofertas.postulaciones', compact('ofertas', 'rTags'));
    }
    function cancelarPostulacion($id){
        $user = User::findOrFail(auth()->user()->id);

        $solicitud = Solicitud::where('id_oferta', $id)->where('id_usuario', $user->id)->firstOrFail();
        $solicitud->delete();

        return back();
    }
}
