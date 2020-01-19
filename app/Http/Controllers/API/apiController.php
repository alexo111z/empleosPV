<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Oferta;
use App\RelacionTag;
use App\Solicitud;
use App\User;
use App\Empresa;
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
    function misOfertas(){
        $search = $request->get('search');

        if ($search == '' or $search == null) {
            $ofertas = Oferta::join('solicitudes','ofertas.id','solicitudes.id_oferta')
            ->where('solicitudes.id_usuario','=',auth('api')->user()->id)//->where('ofertas.titulo','LIKE', '%'.$search.'%')
            ->select('ofertas.*')->get();
        }else{
            $ofertas = Oferta::join('solicitudes','ofertas.id','solicitudes.id_oferta')
            ->where('solicitudes.id_usuario','=',auth('api')->user()->id)->where('ofertas.titulo','LIKE', '%'.$search.'%')
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

        //dar formato a json, copiarlo de ofertas

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
     /*   $subject = "Solicitud para el empleo: " . $oferta->titulo;
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
        });*/
        
        return 'solicitud realizada.json';
    }
    /********Cancelar postulacion********/
    function cancelarPost($id, Request $request){
        $solicitud = Solicitud::where('id_oferta', $id)->where('id_usuario', $request->id_user)->firstOrFail();
        $solicitud->delete();
        return 'solicitud eliminada';
    }
    /********Registrar usuario********/
    function registro(){
        $validator = Validator::make($request->all(),[
            "email" => 'unique:users,email'
        ]);
        if ($validator->fails()) {
            return 'Ya existe una cuenta registrada con este correo.';
        }else{
            $data= $request->all();
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
            return 'registrado';
        }
    }
    /********Editar datos de perfil********/
    function editarPerfil(){

    }

}
