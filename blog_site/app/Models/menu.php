<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    public function sayi(){
        return $this->hasMany('App\Models\yazilar','kategori_id','id')->count();
    }
}
