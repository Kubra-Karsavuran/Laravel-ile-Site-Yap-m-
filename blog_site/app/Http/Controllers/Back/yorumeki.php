<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// model ekleyecez verı ceklek için
use App\Models\yorumlar;

class yorumeki extends Controller
{
    public function pagesee($pageid){
        $veri=yorumlar::where('kimyo',$pageid)->get(); 
        $verisay=count($veri); 
        if ($verisay>0) {
            $data['dataveri']=$veri;
            return view('back.yorumeki',$data);
        }else{
            $data['write']="Yoruma Yorum Yapılmamış";
            return view('back.yorumeki',$data);
        }
    } 

    public function pagesil($pagesilid){
        yorumlar::where('id',$pagesilid)->delete();
        return view('back.commentPage');
         

    }
}
