<?php

namespace App\Http\Controllers;

use App\Area;
use App\NEstudio;
use App\RelacionTag;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function registrar(){
        $estudios = NEstudio::all();
        $areas = Area::all();
        return view('usuarios.registrar', compact('estudios', 'areas'));
    }
    function perfil(){
        $rTags = RelacionTag::where('id_usuario', '=', auth()->user()->id)->get();
        $estudios = NEstudio::all();
        $areas = Area::all();
        return view('usuarios.perfil', compact('rTags', 'estudios', 'areas'));
    }

    //Luis - Sin formato -Eliminar
    function registro(){
        return view('temp.users.registro');
    }

    function crear(Request $request){
        //validate() -> utiliza el 'name' del campo
        $data = $request->validate([
            "email" => ['required', 'email', 'unique:users,email'], //unique:tabla,columna
            "password" => ['required', 'between:1,8', 'same:password2'],
            "password2" => ['required', 'between:1,8'],
            "firstName" => 'required',
            "lastName" => 'required',
            "trip-start" => ['required', 'date_format:Y-m-d'],   //'Y-m-d'  born date
            "sexo" => 'required', //genero
            "estudios" => 'required',
            "area" => 'required',
            //Calcular edad para insercion
        ],[
            'name.required' => 'El campo esta vacio'
        ]);

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
            'id_estudios' => $data['area'],
            'edad' => $edad,
            'alias' => $alias,
        ]);

        return redirect()->route('home');
    }

    function editar($user){
        $data = User::findOrFail($user);
        return view('temp.users.editar', ['user' => $data]);
    }

    function update($id){
        $data = request()->all();
        $user = User::findOrFail($id);

        $user->email = $data['email'];
        $user->nombre = $data['firstName'];
        $user->apellido = $data['lastName'];
        $user->nacimiento = $data['fecha'];
        $user->genero = $data['genero'];
        $user->id_estudios = $data['estudios'];
        $user->id_area = $data['area'];
        $user->edad = $data['edad'];

        $user->save();

        return redirect()->route('home');
    }
    function editarPersonal(Request $request){
        $data = $request->all();
        $user = User::findOrFail(auth()->user()->id);

        $date1 = Carbon::createFromDate($data['nacimiento']);
        $ahora = Carbon::now();
        $edad = $date1->diffInYears($ahora);

//        dd($data['pais'], $data['estado'],$data['ciudad']);

        $user->nacimiento = $data['nacimiento'];
        $user->edad = $edad;
        $user->genero = $data['genero'];
        $user->estado = $data['estado'];
        $user->ciudad = $data['ciudad'];
        $user->pais = $data['pais'];
        $user->save();

        return redirect()->back();
    }
    function editarContacto(Request $request){
        $data = $request->all();
        User::findOrFail(auth()->user()->id)->update($data);
        return redirect()->back();
    }
    function editarAcademica(Request $request){
        $data = $request->all();
        User::findOrFail(auth()->user()->id)->update([
            'id_estudios' => $data['estudios'],
            'id_area' => $data['area'],
        ]);
        return redirect()->back();
    }
    function editarLaboral(Request $request){
        $data = $request->all();
        User::findOrFail(auth()->user()->id)->update([
            'conocimientos' => $data['conocimientos'],
        ]);
        return redirect()->back();
    }
}
