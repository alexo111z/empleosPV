<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    function registro(){
        return view('registrousuarios');
    }

    function crear(){

        //$data = request()->all();

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

//        dd($data);

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

}
