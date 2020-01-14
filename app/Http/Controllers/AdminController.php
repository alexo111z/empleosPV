<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Validator;
use Carbon\Carbon;
use Hash;
use Auth;
use App\Empresa;
use App\Oferta;
use App\User;
use App\Admin;
use App\Estado;
use App\Pais;
use App\Municipio;
use App\Area;
use App\NEstudio;
use App\Giro;
use App\RSocial;
use App\RelacionTag;
use App\Tag;
use App\Calificacion;
use App\Comentario;



class AdminController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth:admin');  //comentar para ver admin sin logear
    }

    function index(){
        return view('admins.index');
    }
    function empresas(Request $request){
        $search = $request->get('search');
        if ($search == '' or $search == null) {
            $empresas = Empresa::paginate(10);
        }else{
            $empresas = Empresa::where('nombre','LIKE', '%'.$search.'%')->paginate(10);
        }
        return view('admins.lista.empresas', compact('empresas'));
    }

    function usuarios(Request $request){
        $search = $request->get('search');
        if ($search == '' or $search == null) {
            $users = User::paginate(10);
        }else{
            $users = User::where('nombre', 'LIKE', '%'.$search.'%')->orWhere('apellido', 'LIKE', '%'.$search.'%')->orWhere('email', 'LIKE', '%'.$search.'%')->paginate(10);
        }
        return view('admins.lista.users', compact('users'));
    }

    function empOfertas($empresa, Request $request){
        $search = $request->get('search');
        if ($search == '' or $search == null or !$search) {
            $ofertas = Oferta::where('id_emp',$empresa)->paginate(10);
        }else{
            $ofertas = Oferta::where('id_emp',$empresa)->where('titulo','LIKE', '%'.$search.'%')->paginate(10);
        }
        $emp = Empresa::findOrFail($empresa);
        return view('admins.lista.ofertasE', compact('ofertas','emp'));
    }

    function administradores(Request $request){
        $search = $request->get('search');
        if ($search == '' or $search == null or !$search) {
            $admins = Admin::paginate(10);
        }else{
            $admins = Admin::where('nombre', 'LIKE', '%'.$search.'%')->orWhere('apellido', 'LIKE', '%'.$search.'%')->orWhere('email', 'LIKE', '%'.$search.'%')->paginate(10);
        }
        return view('admins.lista.administradores', compact('admins'));
    }

    //Registro administradores
    function regAdministrador(){
        return view('admins.registrar.administrador');
    }
    function createAdmin(Request $request){ //admin.c.admin
        $data = $request->validate([
            "email" => ['required', 'email', 'unique:users,email'],
            "password" => ['required', 'same:password2'],
            "password2" => 'required',
            "tipo"=> 'required',
            "firstName" => ['required', 'string'],
            "lastName" => ['required', 'string'],
        ],[]);

        Admin::create([
            "email" => $data['email'],
            "password" =>  bcrypt($data['password']),
            "nombre" => $data['firstName'],
            "apellido" => $data['lastName'],
            "tipo" => $data['tipo'],
        ]);

        return redirect()->route('admin.admins');
    }
    //Registro usuarios
    function regUser(){
        $areas = Area::all();
        $estudios = NEstudio::all();
        return view('admins.registrar.user', compact('areas', 'estudios'));
    }
    function createUser(Request $request){
        $data = $request->validate([
            "email" => ['required', 'email', 'unique:users,email'],
            "password" => ['required', 'same:password2'],
            "password2" => 'required',
            "firstName" => ['required', 'string'],
            "lastName" => ['required', 'string'],
            "trip-start" => ['required'],
            "sexo" => ['required'],
            "estudios" => ['required', 'numeric'],
            "area" => ['required', 'numeric'],
        ],[]);

        $date1 = Carbon::createFromDate($data['trip-start']);
        $ahora = Carbon::now();
        $edad = $date1->diffInYears($ahora);
        $alias = substr($data['email'], 0, strpos($data['email'], "@"));
        
        User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'nombre' => $data['firstName'],
            'apellido' => $data['lastName'],
            'nacimiento' => $data['trip-start'],
            'genero' => $data['sexo'],
            'id_estudios' => $data['estudios'],
            'id_area' => $data['area'],
            'edad' => $edad,
            'alias' => $alias,
        ]);

        return redirect()->route('admin.users');
    }

    //Registro empresas
    function regEmpresa(){
        $giros = Giro::all();
        $razones = RSocial::all();
        $estados = Estado::all();
        $paices = Pais::all();
        $municipios = Municipio::all();
        return view('admins.registrar.empresa', compact('estados', 'paices', 'municipios', 'giros', 'razones'));
    }
    function createEmpresa(Request $request){
        $data = $request->validate([
            'email' => ['required', 'email', 'unique:empresas,email'],
            'password' => ['required', 'same:password2'],
            'password2' => 'required',
            'nombre' => ['required', 'string'],
            'RFC' => ['required'],
            'dfiscal' => 'required',
            'pais' => ['required', 'numeric'],
            'estado' => ['required', 'numeric'],
            'ciudad' => ['required', 'numeric'],
            'telefono' => 'required',
            'otro' => 'required',
            'giro' => ['required', 'numeric'],
            'razon' => ['required', 'numeric'],
        ],[]);
        
        Empresa::create([
            'email' => $data['email'],
            'password' =>  bcrypt($data['password']),
            'nombre' => $data['nombre'],
            'rfc' => $data['RFC'],
            'd_fiscal' => $data['dfiscal'],
            'id_pais' => $data['pais'],
            'id_estado' => $data['estado'],
            'id_ciudad' => $data['ciudad'],
            'telefono' => $data['telefono'],
            'contacto' => $data['otro'],
            'id_social' => $data['razon'],
            'id_giro' => $data['giro'],
        ]);

        return redirect()->route('admin.emp');
    }

    //Registro ofertas
    function regOferta($empresa){
        $emp = Empresa::findOrFail($empresa);
        $estados = Estado::all();
        $paises = Pais::all();
        $municipios = Municipio::all();
        return view('admins.registrar.oferta', compact('emp', 'estados', 'paises', 'municipios'));
    }
    function createOferta($empresa, Request $request){
        $data = $request->validate([
            'titulo' => ['required'],
            'desc_corta' => ['required'],
            'inputtag' => ['nullable'],
            'pais' => ['required','numeric'],
            'estado' => ['required','numeric'],
            'ciudad' => ['required','numeric'],
            'vigencia' => ['required','date'],
            'desc_det' => ['required'],
            'salario' => ['nullable'],
            'tContrato' => ['nullable'],
        ]);

        $oferta = Oferta::create([
            'id_emp' => $empresa,
            'titulo' => $data['titulo'],
            'd_corta' => $data['desc_corta'],
            'id_pais' => $data['pais'],
            'id_estado' => $data['estado'],
            'id_ciudad' => $data['ciudad'],
            'vigencia' => $data['vigencia'],
            'd_larga' => $data['desc_det'],
            'salario' => $data['salario'],
            't_contrato' => $data['tContrato'],
        ]);
        //$oferta->id  
        
        return redirect()->route('admin.emp.ofr', $empresa);
    }

    /****  Detalles ****/
    //Usuarios
    function detUser($usuario){
        $user = User::findOrFail($usuario);
        $paises = Pais::all();
        $estados = Estado::all();
        $municipios = municipio::all();
        $rtags = RelacionTag::where('id_usuario', '=', $user->id)->get();
        $tags = Tag::all();
        $estudios = NEstudio::all();
        $areas = Area::all();
        $userest=NEstudio::findOrFail($user->id_estudios);
        $userarea=Area::findOrFail($user->id_area);
        $cal=Calificacion::where('id_usuario', '=', $user->id)->avg('califi');
        $comentarios= Comentario::join('empresas','empresas.id','=','comentarios.id_emp')
        ->join('calificaciones','calificaciones.id_emp','=','empresas.id')
        ->where('comentarios.id_usuario', '=', $user->id)
        ->where('calificaciones.id_usuario', '=', $user->id)
        ->get();

        return view('admins.detalles.users', compact('user','comentarios','cal','paises','estados','municipios','userest','userarea','rtags','tags','estudios', 'areas'));
    }
    function editUPersonal($id, Request $request){
        $data = $this->validate(request(), [
            'nombre' => 'required', 
            'apellido' => 'required',
        ],[
            'nombre.required' => 'El campo nombre esta vacio, favor de llenarlo correctamente',
            'apellido.required' => 'El campo apellido esta vacio, favor de llenarlo correctamente',
        ]);
        $data = $request->all();
        $user = User::findOrFail($id);
        $date1 = Carbon::createFromDate($data['nacimiento']);
        $ahora = Carbon::now();
        $edad = $date1->diffInYears($ahora);
        $user->nombre = $data['nombre'];
        $user->apellido = $data['apellido'];
        $user->nacimiento = $data['nacimiento'];
        $user->genero = $data['sexo'];
        $user->edad = $edad;
        if($data['pais']!=null && $data['estado']!=null && $data['ciudad']!='null'){
            $user->id_pais= $data['pais'];
            $user->id_estado= $data['estado'];
            $user->id_ciudad= $data['ciudad'];
        }
        $user->save();
        return back()
        ->withErrors(['error' => 'Por favor introduce tu información correctamente.'])
        ->withInput(request(['error']));
    }
    function editUContacto($id, Request $request){
        $data = request()->all();
        $user = User::findOrFail($id);
        $user->telefono=$data['telefono'];
        $user->save();
    }
    function editUNyA($id, Request $request){
        $data = request()->all();
        $user = User::findOrFail($id);
        $user->id_estudios=$data['nivel'];
        $user->id_area=$data['area'];
        $user->save();
    }
    function editUConoc($id, Request $request){
        $data = request()->all();
        $user = User::findOrFail($id);
        $user->conocimientos=$data['conocimientos'];
        $user->save();
    }
    function addUTag($id, Request $request){
        if((RelacionTag::where('id_usuario',$id)->count())<10){
            $data = $request->all();
            $idTag =Tag::where('nombre', $data['nombre'])->value('id');
            if( $idTag ==null){
                Tag::create(['nombre' => $data['nombre'],]);
                $idTag =Tag::where('nombre', $data['nombre'])->value('id');
            }
            $rtags = RelacionTag::where([['id_usuario', $id], ['id_tag',$idTag],])->value('id');
            if($rtags==null){
                RelacionTag::create(['id_usuario' => $id,'id_tag' => $idTag,]);
            }
            return 1;
        }else{
            return 0;
        }  
    }
    function delUTag($id, Request $request){
        $data = $request->all();
        $tag = RelacionTag::where('id', $data['id']);
        $tag->delete();
    }
    function fotoPerfil($id, Request $request){
        $validator = Validator::make($request->all(),[
            "foto" => " required|mimes:jpg,jpeg,png"
        ]);
        if ($validator->fails()) {
            return back()
            ->withErrors(['errorfoto' => 'La foto de perfil debe ser imagen jpg,jpeg o png.'])
            ->withInput(request(['errorfoto']));
        }else{
            //obtenemos el campo file definido en el formulario
            $file =  $request->file('foto');
            $user = User::findOrFail($id);
            //obtenemos el nombre del archivo
            $nombre = "FotoPerfil_".$id.".jpg";
            $url="fotos/".$nombre;
            \Storage::disk('public')->delete("fotos/".$user->foto);
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('public')->put($url,\File::get($file));
            $user->foto= $nombre;
            $user->save();
            return redirect()->route('admin.det.user', $id);
        }
    }
    function borrarFoto($id){
        $user = User::findOrFail($id);
        \Storage::disk('public')->delete("fotos/".$user->foto);
         $user->foto=null;
         $user->save();
         return redirect()->route('admin.det.user', $id);
    }
    function borrarCV($id){
        $user = User::findOrFail($id);
        \Storage::disk('public')->delete($user->curriculum);
         $user->curriculum=null;
         $user->save();
         return redirect()->route('admin.det.user', $id);
    }
    function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users');
    }

    //Empresas
    function detEmpresa($empresa){
        $emp = Empresa::findOrFail($empresa);
        $giros = Giro::all();
        $razones = RSocial::all();
        $estados = Estado::all();
        $paices = Pais::all();
        $municipios = Municipio::all();

        return view('admins.detalles.empresas', compact('emp' ,'estados', 'paices', 'municipios', 'giros', 'razones'));
    }
    function deleteEmpresa($empresa){
        $empresa = Empresa::findOrFail($empresa);
        $ofertas= Oferta::where('id_emp','=', $empresa);
        $ofertas->delete();
        $empresa->delete();
        return redirect()->route('admin.emp');
    }
    function editDatos($empresa, Request $request){
        $data = $request->all();
        $empresa = Empresa::findOrFail($empresa);
        $empresa->nombre = $data['nombre'];
        $empresa->rfc = $data['rfc'];
        $empresa->d_fiscal = $data['d_fiscal'];
        $empresa->id_pais = $data['pais'];
        $empresa->id_estado = $data['estado'];
        $empresa->id_ciudad = $data['ciudad'];
        $empresa->id_social = $data['rsocial'];
        $empresa->id_giro = $data['giro'];
        $empresa->save();
        return redirect()->route('admin.det.emp', $empresa);
    }
    function editContacto($empresa, Request $request){
        $data = $request->all();
        $empresa = Empresa::findOrFail($empresa);
        $empresa->contacto = $data['contacto'];
        $empresa->telefono = $data['telefono'];
        $empresa->save();
        return redirect()->route('admin.det.emp', $empresa);
    }
    function logoEmpresa($id, Request $request){
        $validator = Validator::make($request->all(),[
            "foto" => " required|mimes:jpg,jpeg,png"
        ]);
        if ($validator->fails()) {
            return back()
            ->withErrors(['errorfoto' => 'El logo debe ser imagen jpg,jpeg o png.'])
            ->withInput(request(['errorfoto']));
        }else{
            //obtenemos el campo file definido en el formulario
            $file =  $request->file('foto');
            $empresa = Empresa::findOrFail($id);
            //obtenemos el nombre del archivo
            $nombre = "Logo_".$id.".jpg";
            $url="logos/".$nombre;
            \Storage::disk('public')->delete("logos/".$empresa->logo);
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('public')->put($url,\File::get($file));
            $empresa->logo= $nombre;
            $empresa->save();
            return redirect()->route('admin.det.emp', $id);
        }
    }
    public function borrarLogo($id){
        $empresa = Empresa::findOrFail($id);
        \Storage::disk('public')->delete("logos/".$empresa->logo);
         $empresa->logo=null;
         $empresa->save();
        return redirect()->route('admin.det.emp', $id);
    }

    //Ofertas
    function detOferta($id){
        $oferta = Oferta::findOrFail($id);
        $tags = RelacionTag::where('id_oferta', '=', $oferta->id)->get();
        $paises = Pais::all();
        $estados =Estado::all();
        $ciudades = Municipio::all();

        return view('admins.detalles.ofertas', compact('paises','estados','ciudades','oferta','tags'));
    }
    function editOferta($oferta, Request $request){
        $data = $request->all();

        $ofer = Oferta::findOrFail($oferta);
        $ofer->titulo = $data['titulo'];
        $ofer->d_corta = $data['desCorta'];
        $ofer->d_larga = $data['desc'];
        $ofer->salario = $data['salario'];
        //$ofer->t_contrato;
        //$ofer->vigencia;
        $ofer->id_pais = $data['pais'];
        $ofer->id_estado = $data['estado'];
        $ofer->id_ciudad = $data['ciudad'];
        $ofer->save();
        return redirect()->route('admin.det.ofr', compact('oferta') );
    }
    function deleteOferta($oferta){
        $oferta=Oferta::findOrFail($oferta);
        $oferta->existe = false;
        $oferta->save();

        return redirect()->route('admin.emp.ofr', ['empresa'=>$oferta->id_emp] );
    }   
    function addOfTag($id, Request $request){
        if((RelacionTag::where('id_oferta',$id)->count())<10){
            $data = $request->all();
            $idTag =Tag::where('nombre', $data['nombre'])->value('id');
            if( $idTag ==null){
                Tag::create(['nombre' => $data['nombre'],]);
                $idTag =Tag::where('nombre', $data['nombre'])->value('id');
            }
            $rtags = RelacionTag::where([['id_oferta', $id], ['id_tag',$idTag],])->value('id');
            if($rtags==null){
                RelacionTag::create(['id_oferta' => $id,'id_tag' => $idTag,]);
            }
            return 1;
        }else{
            return 0;
        }  
    }
    function delOfTag($id, Request $request){
        $data = $request->all();
        $tag = RelacionTag::where('id', $data['id']);
        $tag->delete();
    }
    

    //Administradores
    function detAdmin($id){
        $admin = Admin::findOrFail($id);
        return view('admins.detalles.admin', compact('admin'));
    }
    function editAdmin($id, Request $request){
        $data = $request->all();
        $admin = Admin::findOrFail($id);
        $admin->nombre = $data['name'];
        $admin->apellido = $data['apellido'];
       // $admin->tipo = $data['tipo'];
        $admin->save();
        return redirect()->route('admin.det.admin', $id);
    }
    function deleteAdmin($id){
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->route('admin.admins');
    }
    function adminPassword(Request $request){
        $data = $request->all();

        $v = Validator::make($data,
        [
            "password" => ['required'],
            "nueva" => ['required', 'min:5', 'max:8', 'same:nueva2'],
            "nueva2" => 'required',
        ],[
            'password.required' => 'Existe un campo vacio.',
            'nueva.required' => 'Existe un campo vacio.',
            'nueva2.required' => 'Existe un campo vacio.',
            'nueva.min' => 'La nueva contrseña debe tener un mínimo de 5 caracteres.',
            'nueva.max' => 'La nueva contrseña debe tener un máximo de 8 caracteres.',
            'nueva.same' => 'Las contraseñas no coinciden.',
        ]);
        
        if($v->fails()){
            return back()->withErrors($v);
        }

        if(Hash::check($data['nueva'], Auth::guard('admin')->user()->password)){
            return back()->with('message', 'La nueva contraseña debe ser distinta a tu contraseña actual.');
        }

        if (Hash::check($data['password'], Auth::guard('admin')->user()->password)){
            $adm = Admin::findOrFail(Auth::guard('admin')->user()->id);
            $adm->password = Hash::make($data['nueva']);
            $adm->save();
            Auth::guard('admin')->logout();
            return redirect()->route('admin.v.login');
        }else{
            return back()->with('message', 'La contraseña introducida no es correcta.');
        }

    }

    function detEmpresa2($empresa, Request $request){  //eliminar

        $search = $request->get('search');
        if ($search == '' or $search == null or !$search) {
            $ofertas = Oferta::where('id_emp',$empresa)->paginate(2);
        }else{
            $ofertas = Oferta::where('id_emp',$empresa)->where('titulo','LIKE', '%'.$search.'%')->paginate(2);
        }
        $rTags = RelacionTag::where('id_oferta', '>', 0)->get();
        $paises = Pais::all();
        $estados =Estado::all();
        $ciudades = Municipio::all();
        $empresa = Empresa::findOrFail($empresa);

        return view('admins.lista._empresa', compact('empresa','paises','estados','ciudades','ofertas', 'rTags'));
    }
    

}
