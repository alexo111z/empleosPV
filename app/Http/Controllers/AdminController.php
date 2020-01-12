<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Validator;
use Carbon\Carbon;
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
        $title = Empresa::select('Nombre')->find($empresa);
        return view('admins.lista.ofertasE', compact('ofertas','title'));
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
            "firstName" => ['required', 'string'],
            "lastName" => ['required', 'string'],
        ],[]);

        Admin::create([
            "email" => $data['email'],
            "password" =>  bcrypt($data['password']),
            "nombre" => $data['firstName'],
            "apellido" => $data['lastName'],
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

    //Detalles
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

        return view('admins.detalles.users', compact('user','paises','estados','municipios','userest','userarea','rtags','tags','estudios', 'areas'));
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
    function detOferta($oferta){
        $oferta = Oferta::findOrFail($oferta);
        $tags = RelacionTag::where('id_oferta', '=', $oferta)->get();
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

    function detEmpresa2($empresa, Request $request){

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
