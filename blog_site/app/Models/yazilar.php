<?php

namespace App\Models; 
use Illuminate\Database\Eloquent\Model; 
//soft delete ıslemı
use Illuminate\Database\Eloquent\SoftDeletes;

class yazilar extends Model
{

    use SoftDeletes;
    public function get_name(){
        return $this->hasOne('App\Models\menu','id','kategori_id');
    }
}
