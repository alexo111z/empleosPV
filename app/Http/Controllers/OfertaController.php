<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Oferta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class OfertaController extends Controller
{
    function general(){
        $ofertas = Oferta::all();
        return view('temp.general.lista', ['ofertas' => $ofertas]);
    }

    function show($empresa){
        $empresa =  Crypt::decrypt($empresa);
        $data = Empresa::findOrFail($empresa);
        $ofertas = Oferta::where('id_emp', $empresa)->get();
        return view('temp.ofertas.lista', ['ofertas' => $ofertas,'empresa' => $data]);
    }

    function nueva($empresa){
        $empresa =  Crypt::decrypt($empresa);
        $data = Empresa::findOrFail($empresa);
        return view('temp.ofertas.crear', ['empresa' => $data]);
    }

    function create($id){
        $data = request()->validate([
            'titulo' => 'required',
            'dcorta' => '',
            'dlarga' => '',
            'salario' => '',
            'tcontrato' => '',
            'vigencia' => '',
            'pais' => '',
            'estado' => '',
            'ciudad' => '',
        ],[
            'required.titulo' => 'falta'
        ]);

        Oferta::create([
            'id_emp' => $id,
            'titulo' => $data['titulo'],
            'd_corta' => $data[ 'dcorta'],
            'd_larga' => $data['dlarga'],
            'salario' => $data['salario'],
            't_contrato' => $data['tcontrato'],
            'vigencia' => $data['vigencia'],
            'pais' => $data['pais'],
            'estado' => $data['estado'],
            'ciudad' => $data['ciudad'],
        ]);

        return redirect()->route('oferta.list',  $empresa =  Crypt::encrypt($id));
    }

}
