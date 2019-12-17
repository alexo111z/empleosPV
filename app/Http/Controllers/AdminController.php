<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Oferta;
use App\User;
use App\Admin;

class AdminController extends Controller
{
    //
    function index(){
        return view('admins.index');
    }
    function empresas(Request $request){
        $search = $request->get('search');
        if ($search == '' or $search == null) {
            $empresas = Empresa::paginate(10);
        }else{
            $empresas = Empresa::where('nombre','LIKE', '%'.$search.'%')->paginate(10);
        }
        return view('admins.lista.empresas', compact('empresas'));
    }

    function usuarios(Request $request){
        $search = $request->get('search');
        if ($search == '' or $search == null) {
            $users = User::paginate(10);
        }else{
            $users = User::where('nombre', 'LIKE', '%'.$search.'%')->orWhere('apellido', 'LIKE', '%'.$search.'%')->orWhere('email', 'LIKE', '%'.$search.'%')->paginate(10);
        }
        return view('admins.lista.users', compact('users'));
    }

    function empOfertas($empresa, Request $request){
        $search = $request->get('search');
        if ($search == '' or $search == null or !$search) {
            $ofertas = Oferta::where('id_emp',$empresa)->paginate(10);
        }else{
            $ofertas = Oferta::where('id_emp',$empresa)->where('titulo','LIKE', '%'.$search.'%')->paginate(10);
        }
        $title = Empresa::select('Nombre')->find($empresa);
        return view('admins.lista.ofertasE', compact('ofertas','title'));
    }

    function administradores(){
        $search = $request->get('search');
        if ($search == '' or $search == null or !$search) {
            $admins = Admin::paginate(10);
        }else{
            $admins = Admin::where('nombre', 'LIKE', '%'.$search.'%')->orWhere('apellido', 'LIKE', '%'.$search.'%')->orWhere('email', 'LIKE', '%'.$search.'%')->paginate(10);
        }
        return view('admins.lista.administradores', compact('admins'));
    }
    function regAdministrador(){
        return view('admins.registrar.administrador');
    }
    function regUser(){
        return view('admins.registrar.user');
    }
    function regEmpresa(){
        return view('admins.registrar.empresa');
    }
    function regOferta(){
        return view('admins.registrar.oferta');
    }
}
