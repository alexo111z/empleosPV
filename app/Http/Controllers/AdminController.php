<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function index(){
        return view('admins.index');
    }
    function empresas(){
        return view('admins.lista.empresas');
    }
    function usuarios(){
        return view('admins.lista.users');
    }
    function empOfertas(){
        return view('admins.lista.ofertasE');
    }
    function administradores(){
        return view('admins.lista.administradores');
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
}
