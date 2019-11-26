<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tag;
use App\RelacionTag;

class TagsController extends Controller
{
    public function Insert(){
        
        $data = request()->all();
        $nombreTag =$data['nombre'];
        $idTag =Tag::where('nombre', $nombreTag)->value('id');
        if( $idTag ==null){
            Tag::create([
                'nombre' => $nombreTag,
            ]);
            $idTag =Tag::where('nombre', $nombreTag)->value('id');
        }
        $rtags = RelacionTag::where([
            ['id_usuario', auth()->user()->id],
            ['id_tag',$idTag],
        ])->value('id');
        if($rtags==null){
            RelacionTag::create([
                'id_usuario' => auth()->user()->id,
                'id_tag' => $idTag,
            ]);
        }
        
    }
    /*public function Insert(){
        
        $data = request()->all();
        $idTag =Tag::where('nombre', $data['inputtag'])->value('id');
        if( $idTag ==null){
            Tag::create([
                'nombre' => $data['inputtag'],
            ]);
            $idTag =Tag::where('nombre', $data['inputtag'])->value('id');
        }
        $rtags = RelacionTag::where([
            ['id_usuario', auth()->user()->id],
            ['id_tag',$idTag],
        ])->value('id');
        if($rtags==null){
            RelacionTag::create([
                'id_usuario' => auth()->user()->id,
                'id_tag' => $idTag,
            ]);
        }
        return redirect()->route('usuarios.perfil');
    }*/
}
