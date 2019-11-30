<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelacionTag extends Model
{
    protected $table = 'relacion_tags';

    public function tag(){
        return $this->belongsTo(Tag::class, 'id_tag');
    }
}
