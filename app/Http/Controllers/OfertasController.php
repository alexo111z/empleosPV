<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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
use Mail; //Importante incluir la clase Mail, que será la encargada del envío

class OfertasController extends Controller
{
    function ListaOfertas(){
        //@if((Date::createFromFormat('Y-m-d H:i:s', $oferta->vigencia)->greaterThan(Carbon\Carbon::now())))
        $ofertas = Oferta::where('existe','=',true)
        ->whereDate('vigencia','>',Carbon::now()->format('Y-m-d'))
        ->paginate(10);
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
        $empresa= Empresa::findOrFail($oferta->id_emp);
        Solicitud::create([
            'id_oferta' => $id,
            'id_usuario' =>  auth()->user()->id,
        ]);
        $subject = "Solicitud para el empleo: " . $oferta->titulo;
        $for = $empresa->email;
        $mensaje['url']= route('empresas.perfilusuario',['alias'=>auth()->user()->alias]);
        $mensaje['oferta']=$oferta->titulo;
        $mensaje['curriculum'] = route('empresas.usuariosCv',['alias' => auth()->user()->alias]);
        $mensaje['home'] =route('home');
        Mail::send('email',$mensaje, function($msj) use($subject,$for){
            $msj->from("administracion@pvwork.com.mx","Administración de PV WORK");
            $msj->subject($subject);
            $msj->to($for);
        });
        return redirect()->back();
    }

    function Postulaciones(){    
       if(auth()->user()!=null){
        //$ofertas = Oferta::where('id','=',0)->paginate(10);
        $ofertas = Oferta::join('solicitudes','ofertas.id','solicitudes.id_oferta')
        ->where('solicitudes.id_usuario','=',auth()->user()->id)
        ->select('ofertas.*')
        ->paginate(10);
        $rTags = RelacionTag::where('id_oferta', '>', 0)->get();
        $paises = Pais::all();
        $estados =Estado::all();
        $ciudades = Municipio::all();
        return view('ofertas.postulaciones', compact('paises','estados','ciudades','ofertas', 'rTags'));
       }else{
        return redirect()->route('home');
       }
    }
    function cancelarPostulacion($id){
        $solicitud = Solicitud::where('id_oferta', $id)->where('id_usuario', auth()->user()->id)->firstOrFail();
        $solicitud->delete();
        return redirect()->back();
    }
    function Buscar(){
        $data = request()->all();
        if(isset($data['empleo'])){
            $empleo=$data['empleo'];
            $ofertas = Oferta::where('titulo','like','%'.$data['empleo'].'%')
            ->where('existe','=',true)
            ->whereDate('vigencia','>',Carbon::now()->format('Y-m-d'))
            ->paginate(10);
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
        $data = request()->all();;
        $min=$data['min'];
        $max=$data['max'];
        $empleo=(string)$data['empleo'];
        $etiquetas= json_decode($data['etiquetas']);
        if($empleo=="null" || $empleo==null){$empleo="";}
        
        if($min=="null" && $max=="null" && $empleo==null && $etiquetas==null){
            return redirect('/ofertas');
        }
        else{
            if(isset($data['page'])){ $page=$data['page'];}
            else{ $page=1;}
            if($min!="null" && $max!="null"){
                $ofertas=Oferta::where('titulo','like','%'.$empleo.'%')
                ->where('existe','=',true)
                ->whereDate('vigencia','>',Carbon::now()->format('Y-m-d'))
                ->whereBetween('salario', [$min, $max])
                ->get();
            }elseif($min!="null"){
                $ofertas=Oferta::where('titulo','like','%'.$empleo.'%')
                ->where('existe','=',true)
                ->whereDate('vigencia','>',Carbon::now()->format('Y-m-d'))
                ->where('salario',">", $min)
                ->get();
            }elseif($max!="null"){
                $ofertas=Oferta::where('titulo','like','%'.$empleo.'%')
                ->where('existe','=',true)
                ->whereDate('vigencia','>',Carbon::now()->format('Y-m-d'))
                ->where('salario',"<", $max)
                ->get();
            }
            else{
                $ofertas=Oferta::where('titulo','like','%'.$empleo.'%')
                ->where('existe','=',true)
                ->whereDate('vigencia','>',Carbon::now()->format('Y-m-d'))
                ->get();
            }
            if($etiquetas!=null && $etiquetas!="" && $etiquetas!=" "){
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
                if(isset($relaciones)){
                    foreach($relaciones as $relacion){
                        $oferta=Oferta::where('id','=',$relacion['id_oferta'])->get();
                        if($ofertas==[]){$ofertas=$oferta;}
                        else{$ofertas->add($oferta[0]);}
                    }
                }
            }
            if($ofertas!="[]" && $ofertas!=[] &$ofertas!=null){
                $ofertas = new LengthAwarePaginator($ofertas->forPage($page,10), $ofertas->count(), 10, $page, ['path'=>url('/ofertas/busqueda-de'),'pageName' => 'page']);
            }else{
                $ofertas = new LengthAwarePaginator($ofertas, 0, 10, $page, ['path'=>url('/ofertas/busqueda-de'),'pageName' => 'page']);  
            }  
            
            $rTags = RelacionTag::where('id_oferta', '>', 0)->get();
            $paises = Pais::all();
            $estados =Estado::all();
            $ciudades = Municipio::all();
            if($empleo=="" or $empleo==null){$data["empleo"]="";}
            return view('ofertas.ofertas', compact('data','empleo','paises','estados','ciudades','ofertas', 'rTags')); 
        }
        
    }
}
