<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    function registro(){
        return view('temp.users.registro');
    }

    function crear(){

        $data = request()->validate([
            "firstName" => 'required',
            "lastName" => 'required',
            "email" => ['required', 'email', 'unique:users,email'],
            "password" => ['required', 'between:1,8'], //unique:tabla,columna
            "edad" => ['required', 'numeric'],
            "fecha" => ['required', 'date_format:Y-m-d'],   //'Y-m-d'
            "genero" => 'required',
            "estudios" => 'required',
            "area" => 'required',
        ],[
            'name.required' => 'El campo esta vacio'
        ]);

        User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'nombre' => $data['firstName'],
            'apellido' => $data['lastName'],
            'nacimiento' => $data['fecha'],
            'genero' => $data['genero'],
            'id_estudios' => $data['estudios'],
            'id_estudios' => $data['area'],
            'edad' => $data['edad'],
        ]);

        return redirect()->route('home');
    }

    function editar($user){
        $data = User::findOrFail($user);
        return view('temp.users.editar', ['user' => $data]);
    }

    function update(){
        $data = request()->all();
        $user = User::findOrFail($data['id']);

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
}
