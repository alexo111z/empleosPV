<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    function list(){
        $empresas = Empresa::all();
        $title = 'Listado empresas';
        return view('temp.empresas.lista', compact('empresas', 'title'));
    }

    function registro(){
        return view('temp.empresas.registro');
    }
    function crear(){

        $data = request()->validate([
            'nombre' => 'required',
            'rfc' => 'required',
            'd_fiscal' => 'required',
            'pais' => 'required',
            'estado' => 'required',
            'ciudad' => 'required',
            'telefono' => 'required',
            'contacto' => 'required',
            'id_social' => 'required',
            'id_giro' => 'required',
            'email' => ['required', 'email', 'unique:empresas,email'],
            'password' => ['required', 'between:1,8'],
        ],[
            'nombre.required' => 'Se requiere el nombre de la empresa',
        ]);

        $data['password'] = bcrypt($data['password']);

        Empresa::create($data);

        return redirect()->route('emp.show');
    }

    function editar(){

    }
    function update(){

    }

}
/*
function formEdit(Carrera $carrera){

    return view('Carreras.editar', ['carrera' => $carrera]);
}

function update(){
    $data = request()->all();

    $carrera = Carrera::findOrFail($data['clave']);
    $carrera->Nombre = $data['nombre'];
    $carrera->save();

    return redirect()->route('carrera.show');
}

function softDelete(Carrera $carrera){

//        Carrera::destroy($carrera->Clave); //hard delete
    $carrera->Existe = 0;
    $carrera->save();

    return redirect()->route('carrera.show');
}
