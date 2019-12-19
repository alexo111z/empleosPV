<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use Carbon\Carbon;

class AdminController extends Controller
{
    //
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
        $paices = Pais::all();
        $municipios = Municipio::all();
        return view('admins.registrar.oferta', compact('emp', 'estados', 'paices', 'municipios'));
    }
    function createOferta(Request $request){
        $data = $request;
        dd( $request->all());
    }
}
