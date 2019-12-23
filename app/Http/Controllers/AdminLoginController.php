<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    function __contruct() {
        $this->middleware('guest:admin');
    }
    function login(){
        return view('admins.login');
    }
    function autenticar(Request $request){
        
        $data = $request->validate([
            'email' => ['required','email'],
            'password' => 'required',
            'remember' => 'nullable',
        ]);
        $remember = $request->has('remember') ? true : false;
            //para empresas: guard('empresa')
        if (Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password']], $remember)) {
            return redirect()->route('admin.index');
        }

        return back()
            ->withErrors(['error' => 'Usuario y/o Contraseña incorrectos, por favor verifique sus datos.'])
            ->withInput(request(['error']));
    }
    function logout(){
        Auth::logout();
        return redirect()->route('admin.v.login');
    }
}
