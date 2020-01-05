<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class EmpresaLoginController extends Controller
{
    function __contruct() {
        $this->middleware('guest:empresa', ['except' => ['logout']]);
    }

    function login(){
        return view('empresas.login');
    }
    function autenticar(Request $request){
        
        $data = $request->validate([
            'email' => ['required','email'],
            'password' => 'required',
            'remember' => 'nullable',
        ],[
            'email.required' => 'Campo vacío, introduce tu email',
            'email.email' => 'Ingresar un email válido ej. email@example.com',
            'password.required' => 'Campo vacío, introduce tu contraseña',
        ]);
        $remember = $request->has('remember') ? true : false;
            //para empresas: guard('empresa')
        if (Auth::guard('empresa')->attempt(['email'=>$data['email'], 'password'=>$data['password']], $remember)) {
            return redirect()->route('empresas.index');
        }

        return back()
            ->withErrors(['error' => 'Usuario y/o Contraseña incorrectos, por favor verifique sus datos.'])
            ->withInput(request(['error']));
    }
    function logout(){
        Auth::guard('empresa')->logout();
        return redirect()->route('empresas.login');
    }
}
