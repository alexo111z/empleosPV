<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //
    function __construct(){
        //$this->middleware('guest', ['only' => 'index']);
        $this->middleware('guest', ['except' => ['logout']]);
    }
    function index() {
        return view("usuarios.login");
        
    }
    function loginUsuario(Request $request){
        
        $data = $this->validate(request(), [
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string']
        ],[
            'email.required' => 'Campo vacío, introduce tu email',
            'email.email' => 'Ingresar un email válido ej. email@example.com',
            'password.required' => 'Campo vacío, introduce tu contraseña',
        ]);
        $remember = $request->has('remember') ? true : false;

       // if (Auth::attempt($data)){
           if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']],$remember)) {
//            return auth()->user()->fullname;
            return redirect()->route('ofertas.lista');
        }

        return back()
            ->withErrors(['error' => 'Usuario y/o Contraseña incorrectos, por favor verifique sus datos.'])
            ->withInput(request(['error']));
    }
    function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
