<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function registrar(){
        return view('usuarios.registrar');
    }
    function perfil(){
        return view('usuarios.perfil');
    }





    function registro(){
        return view('registrousuarios');
    }
    

    function crear(){

        //$data = request()->all();

        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'nacimiento' => 'required',
            'genero' => 'required',
            'id_estudios' => 'required',
            'id_estudios' => 'required',
            'edad' => 'required',
        ],[
            'name.required' => 'El campo esta vacio'
        ]);

        dd($data);
        return "texto pagina";

        /*
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


        return redirect()->route('#');
        */
    }

}
