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

        $data = request()->all();

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


        return redirect()->route('url');
        */
    }

}
