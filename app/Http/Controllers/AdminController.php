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
        return view('admins.empresas');
    }
    function usuarios(){
        return view('admins.users');
    }
}
