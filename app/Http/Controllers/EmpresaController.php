<?php

namespace App\Http\Controllers;
use \Validator;
use Illuminate\Support\Facades\Auth;
use App\Empresa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Oferta;
use App\Estado;
use App\Pais;
use App\Municipio;
use App\Area;
use App\NEstudio;
use App\Giro;
use App\RSocial;
use App\RelacionTag;
use App\Tag;
use Illuminate\Support\Facades\Hash;

class EmpresaController extends Controller
{
    public function __construct() {
       $this->middleware('auth:empresa',['except' => ['Registrar','createEmpresa','Index','login']]);  //comentar para ver admin sin logear
    }

    function list(){
        $empresas = Empresa::all();
        $title = 'Listado empresas';
        return view('temp.empresas.lista', compact('empresas', 'title'));
    }

    function registro(){
        return view('temp.empresas.registro');
    }
    function crear(){

        $data = request()->validate([
            'nombre' => 'required',
            'rfc' => 'required',
            'd_fiscal' => 'required',
            'pais' => 'required',
            'estado' => 'required',
            'ciudad' => 'required',
            'telefono' => 'required',
            'contacto' => 'required',
            'id_social' => 'required',
            'id_giro' => 'required',
            'email' => ['required', 'email', 'unique:empresas,email'],
            'password' => ['required', 'between:1,8'],
        ],[
            'nombre.required' => 'Se requiere el nombre de la empresa',
        ]);

        $data['password'] = bcrypt($data['password']);

        Empresa::create($data);

        return redirect()->route('emp.show');
    }

    function editar($empresa){
        $data = Empresa::findOrFail($empresa);
        return view('temp.empresas.editar', ['empresa' => $data]);
    }
    function update($id){
        $data = request()->all();
        dd($data);
        $empresa = Empresa::findOrFail($id);
       $empresa->nombre = $data['nombre'];
       $empresa->rfc = $data['rfc'];
       $empresa->d_fiscal = $data['d_fiscal'];
       $empresa->pais = $data['pais'];
       $empresa->estado = $data['estado'];
       $empresa->ciudad = $data['ciudad'];
       $empresa->telefono = $data['telefono'];
       $empresa->contacto = $data['contacto'];
       $empresa->id_social = $data['id_social'];
       $empresa->id_giro = $data['id_giro'];

       $empresa->save();
       return redirect()->route('emp.show');
    }
    //USUARIO EMPRESA
    function Index(){
       //dd(Auth::guard('empresa')->user()->nombre);
        return view('empresas.home');
    }
    function Registrar(){
        $giros = Giro::all();
        $razones = RSocial::all();
        $estados = Estado::all();
        $paices = Pais::all();
        $municipios = Municipio::all();
        return view('empresas.registrar', compact('estados', 'paices', 'municipios', 'giros', 'razones'));
    }
    function createEmpresa(Request $request){
        
        $data = $request->validate([
            'email' => ['required', 'email', 'unique:empresas,email'],
            'password' => ['required', 'same:password2'],
            'password2' => 'required',
            'nombre' => ['required', 'string'],
            'RFC' => ['required'],
            'otro' => 'required',
            'dfiscal' => 'required',
            'pais' => ['required', 'numeric'],
            'estado' => ['required', 'numeric'],
            'ciudad' => ['required', 'numeric'],
            'telefono' => 'required',
            'giro' => ['required', 'numeric'],
            'razon' => ['required', 'numeric'],
        ],[
            'email.unique' => 'Ya existe una cuenta registrada con este correo, verifiquelo.'
        ]);
        
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
        return redirect()->route('empresas.login');
    }
    function login(){
        return view('empresas.login');
    }
    function Perfil(){
        $giros = Giro::all();
        $razones = RSocial::all();
        $estados = Estado::all();
        $paices = Pais::all();
        $municipios = Municipio::all();
        return view('empresas.perfil', compact('estados', 'paices', 'municipios', 'giros', 'razones'));
    }
    function ActualizarDatos(){
        $data = request()->all();
        $empresa = Empresa::findOrFail(auth()->guard('empresa')->user()->id);
        $empresa->nombre = $data['nombre'];
        $empresa->rfc = $data['rfc'];
        $empresa->d_fiscal = $data['d_fiscal'];
        $empresa->id_pais = $data['pais'];
        $empresa->id_estado = $data['estado'];
        $empresa->id_ciudad = $data['ciudad'];
        $empresa->id_social = $data['rsocial'];
        $empresa->id_giro = $data['giro'];
        $empresa->save();
        return redirect()->route('empresas.perfil');
    }
    function ActualizarContacto(){
        $data = request()->all();
        $empresa = Empresa::findOrFail(auth()->guard('empresa')->user()->id);
        $empresa->contacto = $data['contacto'];
        $empresa->telefono = $data['telefono'];
        $empresa->save();
        return redirect()->route('empresas.perfil');
    }
    public function subirLogo(Request $request){   
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
            $empresa = Empresa::findOrFail(auth()->guard('empresa')->user()->id);
            //obtenemos el nombre del archivo
            $nombre = "Logo_".auth()->guard('empresa')->user()->id.".jpg";
            $url="logos/".$nombre;
            \Storage::disk('public')->delete("logos/".$empresa->logo);
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('public')->put($url,\File::get($file));
            $empresa->logo= $nombre;
            $empresa->save();
            return redirect()->route('empresas.perfil');
        }
    }
    public function borrarlogo(){
        $empresa = Empresa::findOrFail(auth()->guard('empresa')->user()->id);
        \Storage::disk('public')->delete("logos/".$empresa->logo);
         $empresa->logo=null;
         $empresa->save();
        return redirect()->route('empresas.perfil');
    }
    function editarpassword(Request $request){
        $empresa = Empresa::findOrFail(auth()->guard('empresa')->user()->id);
        $data = $request->all();

        if(Hash::check($data['pass'],auth()->guard('empresa')->user()->password)){
            if($data['pass']==$data['newpass']){
                return 2;
            }else{
                $empresa->password = bcrypt($data['newpass']);
                $empresa->save();
                return 1;
            }
        }else{
            return 0;
        }
    }
    function verificarpass(){
        $empresa = Empresa::findOrFail(auth()->guard('empresa')->user()->id);
        $data = request()->all();
        if(Hash::check($data['confirmpass'],auth()->guard('empresa')->user()->password)){
            return 1;
        }else{
            return 0;
        }
    }
    function deleteemp(){
        $empresa = Empresa::findOrFail(auth()->guard('empresa')->user()->id);
        $ofertas= Oferta::where('id_emp','=',auth()->guard('empresa')->user()->id);
        $ofertas->delete();
        $empresa->delete();
         return redirect()->route('empresas.logout');
    }

}
/*
function softDelete(Carrera $carrera){

//        Carrera::destroy($carrera->Clave); //hard delete
    $carrera->Existe = 0;
    $carrera->save();

    return redirect()->route('carrera.show');
}
