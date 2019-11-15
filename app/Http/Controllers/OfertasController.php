<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Oferta;
use App\RelacionTag;
use App\Solicitud;
use App\User;
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
    function solicitar($id){
        $correo = 'puerba@correo.com';  //Obtener id o correo mediante la Autentificacion
        $user = User::where('email', $correo)->firstOrFail();

        Solicitud::create([
            'id_oferta' => $id,
            'id_usuario' => $user->id,
        ]);
        return back();
    }

    function Postulaciones(){
        $correo = 'puerba@correo.com';  //Obtener id o correo mediante la Autentificacion
        $user = User::where('email', $correo)->firstOrFail();

        $ofertas = Solicitud::where('id_usuario', $user->id)->where('estado', 1)->get();
        $rTags = RelacionTag::where('id_oferta', '>', 0)->get();

        return view('ofertas.postulaciones', compact('ofertas', 'rTags'));
    }
    function cancelarPostulacion($id){
        $correo = 'puerba@correo.com';  //Obtener id o correo mediante la Autentificacion
        $user = User::where('email', $correo)->firstOrFail();

        $solicitud = Solicitud::where('id_oferta', $id)->where('id_usuario', $user->id)->firstOrFail();
        $solicitud->delete();

        return back();
    }
}
