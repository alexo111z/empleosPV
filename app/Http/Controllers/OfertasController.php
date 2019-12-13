<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;
use App\Oferta;
use App\RelacionTag;
use App\Solicitud;
use App\User;
use Illuminate\Http\Request;
use App\Pais;
use App\Estado;
use App\Municipio;
use App\Tag;
use App\Empresa;

class OfertasController extends Controller
{
    function ListaOfertas(){
        $ofertas = Oferta::paginate(10);
        $empleo="";
        $rTags = RelacionTag::where('id_oferta', '>', 0)->get();
        $paises = Pais::all();
        $estados =Estado::all();
        $ciudades = Municipio::all();
        return view('ofertas.ofertas', compact('empleo','paises','estados','ciudades','ofertas', 'rTags'));
    }
    function BusquedaAvanzada(){
        $tags =Tag::all();
        return view('ofertas.busqueda',compact('tags'));
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
        if(isset($data['empleo'])){
            $empleo=$data['empleo'];
            $ofertas = Oferta::where('titulo','like','%'.$data['empleo'].'%')->paginate(10);
            $rTags = RelacionTag::where('id_oferta', '>', 0)->get();
            $paises = Pais::all();
            $estados =Estado::all();
            $ciudades = Municipio::all();
            return view('ofertas.ofertas', compact('empleo','paises','estados','ciudades','ofertas', 'rTags'));
        }else{
            return redirect('/ofertas');
        }
       
    }
    
    function BuscarAvanzado(){
        $data = request()->all();
        $empleo=(string)$data['empleo'];
        $etiquetas= json_decode($data['etiquetas']);
        $ofertas=Oferta::where('titulo','like','%'.$empleo.'%')->get();
        if($etiquetas==null or $etiquetas=="" or $etiquetas==" "){
            $ofertas=Oferta::where('titulo','like','%'.$empleo.'%')->paginate(10); 
        }else{
            foreach($ofertas as $oferta){
                foreach($etiquetas as $etiqueta){
                    $relacion=Tag::where('nombre','=',$etiqueta)
                    ->join('relacion_tags','tags.id','relacion_tags.id_tag')
                    ->where('relacion_tags.id_oferta','=',$oferta->id)
                    ->get();
                    if($relacion!= "[]"){
                        if(isset($relaciones)){$relaciones->add($relacion[0]);}
                        else{$relaciones=$relacion;}
                        break;
                    }
                }
            }
            $ofertas=[];
            foreach($relaciones as $relacion){
                $oferta=Oferta::where('id','=',$relacion['id_oferta'])->get();
                if($ofertas==[]){$ofertas=$oferta;}
                else{$ofertas->add($oferta[0]);}
            }
            
        }
        if(isset($data['page'])){ $page=$data['page'];}
        else{ $page=1;}
        $ofertas = new LengthAwarePaginator($ofertas->forPage($page,10), $ofertas->count(), 10, $page, ['path'=>url('/ofertas/busqueda-de'),'pageName' => 'page']);
        $rTags = RelacionTag::where('id_oferta', '>', 0)->get();
        $paises = Pais::all();
        $estados =Estado::all();
        $ciudades = Municipio::all();
        return view('ofertas.ofertas', compact('data','empleo','paises','estados','ciudades','ofertas', 'rTags')); 
    }
}
