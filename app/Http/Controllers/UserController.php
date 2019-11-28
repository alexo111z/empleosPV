<?php

namespace App\Http\Controllers;

use App\Area;
use App\NEstudio;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\RelacionTag;
use App\Tag;
class UserController extends Controller
{
    function registrar(){
        $estudios = NEstudio::all();
        $areas = Area::all();
        return view('usuarios.registrar', compact('estudios', 'areas'));
    }
    function perfil(){
      
        $rtags = RelacionTag::where('id_usuario', '=', auth()->user()->id)->get();
        $tags = Tag::all();
        return view('usuarios.perfil',compact('rtags','tags'));
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
    /*EDITAR y/o AGREGAR */
    public function addConocimientos(){
        $data = request()->all();
        $user = User::findOrFail(auth()->user()->id);
        $user->conocimientos=$data['conocimientos'];
        $user->save();
    }
}
