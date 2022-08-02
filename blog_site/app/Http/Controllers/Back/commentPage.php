<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// model tanımlamaları
use App\Models\yorumlar;


class commentPage extends Controller
{ 

    public function commetPage(){ 
        $data['satveri']=yorumlar::where('kimyo',0)->orderBy('created_at','ASC')->get();
        return view('back.commentPage',$data);
    }



// kontrol ıslemı olmalı burda 
// devamı varsa sılme ıslmeı olmayuacak 
// silme işlemi

    public function commentdel($comdelid){// sılınecek ıd

        $bakalim=yorumlar::where('kimyo',$comdelid)->count();
        if ($bakalim==0) {
            // yorum ayorum yapılmamıs
            $deger=yorumlar::where('id',$comdelid)->delete();
            if ($deger==0) {
                $data['oldu']="Yorumunuz Silinemedi Bir Sıkıntı Oluştu";
            }else{
                $data['olmadi']="Yorumunuz Silindi";
            }
        }else{
            $data['veri']="Bu Yorumu Silmek İstiyorsanız Öncelikle Bu Yorumun Yorumunu Silmeniz Gerekmektedir !!!";
        }
 
        // yorumları ekrana yazdırma kodu burası
        $data['satveri']=yorumlar::where('kimyo',0)->orderBy('created_at','ASC')->get(); 
        return view('back.commentPage',$data);

    }

    
}
