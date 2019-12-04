<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Oferta;
use App\RelacionTag;
use App\Solicitud;
use App\User;
use Illuminate\Http\Request;
use App\Pais;
use App\Estado;
use App\Municipio;
class OfertasController extends Controller
{
    function ListaOfertas(){
        $ofertas = Oferta::paginate(10);
        $inputtitulo="";
        $rTags = RelacionTag::where('id_oferta', '>', 0)->get();
        $paises = Pais::all();
        $estados =Estado::all();
        $ciudades = Municipio::all();
        return view('ofertas.ofertas', compact('inputtitulo','paises','estados','ciudades','ofertas', 'rTags'));
    }
    function BusquedaAvanzada(){
        return view('ofertas.busqueda');
    }
    function VerOferta($id){
        $oferta = Oferta::findOrFail($id);
        $tags = RelacionTag::where('id_oferta', '=', $id)->get();
        $paises = Pais::all();
        $estados =Estado::all();
        $ciudades = Municipio::all();
        $solicitud="";
        if(isset(auth()->user()->id)){
            $solicitud = Solicitud::where('id_oferta', $id)
                ->where('id_usuario', auth()->user()->id)
                ->get();
        }
        return view('ofertas.veroferta', compact('solicitud','paises','estados','ciudades','oferta','tags'));   
    }
    function solicitar($id){
        $oferta = Oferta::findOrFail($id);
        Solicitud::create([
            'id_oferta' => $id,
            'id_usuario' =>  auth()->user()->id,
        ]);
        return \App::make('redirect')->back();
    }

    function Postulaciones(){
        $correo = 'puerba@correo.com';  //Obtener id o correo mediante la Autentificacion
        $user = User::where('email', $correo)->firstOrFail();

        $ofertas = Solicitud::where('id_usuario', $user->id)->where('estado', 1)->get();
        $rTags = RelacionTag::where('id_oferta', '>', 0)->get();

        return view('ofertas.postulaciones', compact('ofertas', 'rTags'));
    }
    function cancelarPostulacion($id){
        $solicitud = Solicitud::where('id_oferta', $id)->where('id_usuario', auth()->user()->id)->firstOrFail();
        $solicitud->delete();
        return \App::make('redirect')->back();
    }
    function Buscar(){
        $data = request()->all();
        $inputtitulo=$data['inputtitulo'];
        $ofertas = Oferta::where('titulo','like','%'.$data['inputtitulo'].'%')->paginate(10);
        $rTags = RelacionTag::where('id_oferta', '>', 0)->get();
        $paises = Pais::all();
        $estados =Estado::all();
        $ciudades = Municipio::all();
        return view('ofertas.ofertas', compact('inputtitulo','paises','estados','ciudades','ofertas', 'rTags'));
    }
}
