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
        if((RelacionTag::where('id_usuario',auth()->user()->id)->count())<10){
            $data = request()->all();
            $idTag =Tag::where('nombre', $data['nombre'])->value('id');
            if( $idTag ==null){
                Tag::create(['nombre' => $data['nombre'],]);
                $idTag =Tag::where('nombre', $data['nombre'])->value('id');
            }
            $rtags = RelacionTag::where([['id_usuario', auth()->user()->id], ['id_tag',$idTag],])->value('id');
            if($rtags==null){
                RelacionTag::create(['id_usuario' => auth()->user()->id,'id_tag' => $idTag,]);
            }
            return 1;
        }else{
            return 0;
        }  
    }
    public function destroy(){
        $data = request()->all();
        $tag = RelacionTag::where('id', $data['id']);
        $tag->delete();
    }
}
