<?php

namespace App\Http\Controllers\API;
use \Validator;
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
use App\Area;
use App\NEstudio;
use Mail;

class apiController extends Controller
{   
    /*
    public function __construct(){
        $this->middleware('auth:api', ['except' => ['registro']]);
    }
    */

    /********Ver todas las ofertas  -> formato para json********/
    function ofertas(Request $request){

        $search = $request->get('search');

        if ($search == '' or $search == null) {
            $ofertas = Oferta::all();
        }else{
            $ofertas = Oferta::where('titulo','LIKE', '%'.$search.'%')->get();
        }
        $relT = RelacionTag::where('id_usuario', '=', null)->get();

        if ($ofertas->isEmpty()) {
            return response()->json(array(
                'code' => 204,
                'message' => 'No se encontraron ofertas.'
            )    
            ,204);
        }

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
    /********Ver detalles de oferta********/
    function detalles($id, Request $request){
        $oferta = Oferta::findOrFail($id);
        $estado = 0;
        $relT = RelacionTag::where('id_usuario', '=', null)->get();
        $postulado = Solicitud::where('id_oferta','=',$id)
        ->where('id_usuario','=',$request['id_user'],)->first();
        if(isset($postulado)){
            $estado=1;
        }
        if (!isset($oferta)) {
            return response()->json(array(
                'code' => 204,
                'message' => 'No se encontraron ofertas.'
            )    
            ,204);
        }
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
            } 
        }
        //dar formato a json, copiarlo de ofertas
        $data = [
            'id' => $oferta->id,
            'logo' =>$oferta->empresa->logo,
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
            'estado' => $estado
        ];
        return response()->json($data);
    }
    function logo($file){
        return \Storage::disk('public')->response("/logos/$file");
    }

    /********Ver ofertas de usuario********/
    function misOfertas(Request $request, $id){
        $search = $request->get('search');

        if ($search == '' or $search == null) {
            $ofertas = Oferta::join('solicitudes','ofertas.id','solicitudes.id_oferta')
            ->where('solicitudes.id_usuario','=', $id)//->where('ofertas.titulo','LIKE', '%'.$search.'%')
            ->select('ofertas.*')->get();
        }else{
            $ofertas = Oferta::join('solicitudes','ofertas.id','solicitudes.id_oferta')
            ->where('solicitudes.id_usuario','=', $id)->where('ofertas.titulo','LIKE', '%'.$search.'%')
            ->select('ofertas.*')->get();
        }
        $relT = RelacionTag::where('id_usuario', '=', null)->get();

        if ($ofertas->isEmpty()) {
            return response()->json(array(
                'code' => 204,
                'message' => 'No se encontraron ofertas.'
            )    
            ,204);
        }

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
    /********Postularce en una oferta********/
    function postular($id, Request $request){
        $oferta = Oferta::findOrFail($id);
        $user = User::findOrFail($request->id_user);
        $empresa= Empresa::findOrFail($oferta->id_emp);
        Solicitud::create([
            'id_oferta' => $id,
            'id_usuario' => $user->id,
        ]);
     $subject = "Solicitud para el empleo: " . $oferta->titulo;
        $for = $empresa->email;
        $mensaje['url']= route('empresas.perfilusuario',['alias'=>$user->alias]);
        $mensaje['oferta']=$oferta->titulo;
        if(isset($user->curriculum)){
            $mensaje['curriculum'] = route('empresas.usuariosCv',['alias' => $user->alias]);
            }
        $mensaje['home'] =route('home');
        Mail::send('email',$mensaje, function($msj) use($subject,$for){
            $msj->from("administracion@pvwork.com.mx","Administración de PV WORK");
            $msj->subject($subject);
            $msj->to($for);
        });
        return 'true';

    }
    /********Cancelar postulacion********/
    function cancelarPost($id, Request $request){
        $solicitud = Solicitud::where('id_oferta', $id)->where('id_usuario', $request->id_user)->firstOrFail();
        $solicitud->delete();
        return 'solicitud eliminada';
    }
    function registrar(){
        $areas=Area::all();
        $nestudios=NEstudio::all();
        return response()->json(['areas'=>$areas,'nestudios' =>$nestudios]);
    }
    /********Registrar usuario********/
    function registro(request $request){
        $data = json_decode($request->getContent(), true);
            $email=User::where('email','=',$data['email']);
            if(isset($email)){
                return 0;
            }else{
            $date1 = Carbon::createFromDate($data['born_date']);
            $ahora = Carbon::now();
            $edad = $date1->diffInYears($ahora);
            $alias = substr($data['email'], 0, strpos($data['email'], "@"));
            User::create([
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'nombre' => $data['nombre'],
                'apellido' => $data['apellido'],
                'nacimiento' => $data['born_date'],
                'genero' => $data['sexo'],
                'id_estudios' => $data['estudios'],
                'id_area' => $data['area'],
                'edad' => $edad,
                'alias' => $alias,
            ]);
            return 1;
        }
    }
    /********Mostrar datos de perfil********/
    function perfil($id){
        $user = User::findOrFail($id);
        $relT = RelacionTag::where('id_oferta', '=', null)->get();
        //return $user->estudios->id;
        $jtag = [];
        foreach($relT as $t){
            $in = [];
            if ($t->id_usuario == $user->id) {
                $in = [
                'id' => $t->id,
                'id_us' => $t->id_usuario,
                'id_t' => $t->id_tag,
                'tag' => $t->tag->nombre,
                ];
                array_push($jtag, $in);
                //return gettype($in);
            }  
        }
        $data = [
            'email' => $user->email,
            'nombre' => $user->nombre,
            'apellido' => $user->apellido,
            'edad' => $user->edad,
            'nacimiento' => \Carbon\Carbon::parse($user->nacimiento)->format('Y-m-d'),
            'genero' => $user->genero,
            'id_estudios' => [
                'id' => $user->estudios->id,
                'estudios' => $user->estudios->nivel,
            ],
            'id_area' => [
                'id' => $user->area->id,
                'area' => $user->area->area,
            ],
            'id_pais' => $user->pais,
            'id_estado' => $user->estado,
            'id_ciudad' => $user->ciudad,
            'telefono' => $user->telefono,
            'conocimientos' => $user->conocimientos,
            'tags' => $jtag,
        ];
                    
        return response()->json($data);
    }
    /********Obtener localidades********/
    function Localidades(){
        $paises = Pais::all();
        $ciudades = Municipio::all();
        $estados = Estado::all();
        $nivel = NEstudio::all();
        $area = Area::all();
        $tags = Tag::all();

        $localidades = [
            'pais' => $paises,
            'ciudad' => $ciudades,
            'estado' => $estados,
            'nivel' => $nivel,
            'area' => $area,
            'tags' => $tags,
        ];

        return response()->json($localidades);

    }
    /********Editar datos de perfil********/
    function editarPersonal(Request $request, $id){

        $user = User::findOrFail($id);
        $data = json_decode($request->getContent(), true);
        
        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $telefono = $data['telefono'];
        $genero = $data['genero'];
        $fecha = $data['fecha'];

        $date1 = Carbon::createFromDate($fecha);
        $ahora = Carbon::now();
        $edad = $date1->diffInYears($ahora);

        $user->nombre = $nombre;
        $user->apellido = $apellido;
        $user->telefono = $telefono;
        $user->genero = $genero;
        $user->nacimiento = $fecha;
        $user->edad = $edad;
        $user->save();
        
        return response()->json(array('code' => 200,'message' => 'Cambios realizados con exito.'),200);
    }
    function editarLocalidad(Request $request, $id){
        $user = User::findOrFail($id);
        $data = json_decode($request->getContent(), true);
        
        $pais = $data['pais'];
        $estado = $data['estado'];
        $ciudad = $data['ciudad'];

        $user->id_pais = $pais;
        $user->id_estado = $estado;
        $user->id_ciudad = $ciudad;

        $user->save();
        
        return response()->json(array('code' => 200,'message' => 'Cambios realizados con exito.'),200);
    }
    function editarAcademica(Request $request, $id){
        $user = User::findOrFail($id);
        $data = json_decode($request->getContent(), true);
        
        $estudios = $data['estudios'];
        $area = $data['area'];

        $user->id_estudios = $estudios;
        $user->id_area = $area;

        $user->save();

        return response()->json(array('code' => 200,'message' => 'Cambios realizados con exito.'),200);
    }
    function editarLaboral(Request $request, $id){
        $user = User::findOrFail($id);
        $data = json_decode($request->getContent(), true);
        
        $add = $data['add'];
        $del = $data['delete'];
        $conos = $data['conoc'];

        for( $i = 0; $i < count($add); $i++ ){

            $data = request()->all();
            $idTag =Tag::where('nombre',$add[$i])->value('id');
            if( $idTag ==null){
                Tag::create(['nombre' =>$add[$i],]);
                $idTag =Tag::where('nombre',$add[$i])->value('id');
            }
            $rtags = RelacionTag::where([['id_usuario', $id], ['id_tag',$idTag],])->value('id');
            if($rtags==null){
                RelacionTag::create(['id_usuario' => $id,'id_tag' => $idTag,]);
            }

        }

        for ($j = 0; $j < count($del); $j++){
            $tag = RelacionTag::where('id', $del[$j]);
            $tag->delete();
        }   

        $user->conocimientos = $conos;

        $user->save();

        return response()->json(array('code' => 200,'message' => 'Cambios realizados con exito.'),200);
    }
    

}
