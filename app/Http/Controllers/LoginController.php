<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    function __construct(){
        $this->middleware('guest', ['only' => 'index']);
    }
    function index() {
        return view("usuarios.login");
    }
    function loginUsuario(){
        $data = $this->validate(request(), [
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string']
        ],[
            'email.required' => 'Campo vacio, porfavor introdusca su email',
            'email.email' => 'Por favor ingrese un email',
            'password.required' => 'Campo vacio, porfavor introdusca su contraseña',
        ]);

        if (Auth::attempt($data)){
//            return auth()->user()->fullname;
            return redirect()->route('usuarios.perfil');
        }

        return back()
            ->withErrors(['email' => 'Usuario no valido'])
            ->withInput(request(['email']));
    }
    function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
