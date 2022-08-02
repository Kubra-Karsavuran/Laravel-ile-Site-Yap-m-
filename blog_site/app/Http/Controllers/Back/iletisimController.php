<?php

namespace App\Http\Controllers\Back; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// model eklentılerı
use App\Models\iletisim;


class iletisimController extends Controller
{
    public function iletisimsee(){
        $data['veri']=iletisim::orderBy('created_at','ASC')->get();
        return view('back.iletisim',$data);
    }
    public function iletisimupdate($iletupid){ 
       $data['veri']=iletisim::orderBy('created_at','ASC')->get(); 
       $data['dataup']=iletisim::where('id',$iletupid)->get();
       return view('back.iletisim',$data); 
    } 
    public function iletivaz(){
       $data['veri']=iletisim::orderBy('created_at','ASC')->get();  
        return view('back.iletisim',$data);
    } 
    public function iletsave(Request $request){
        $degerid=$request->id;
        $veri=iletisim::where('id',$degerid)->update([
            'email_bilgisi'=>$request->email,
            'tel_bilgisi'=>$request->tel,
            'adres_bilgisi'=>$request->adres 
        ]);
        if ($veri==1) { 
            $data['veri']=iletisim::orderBy('created_at','DESC')->get(); 
            return view('back.iletisim',$data);
        }else{
            $data['veri']=iletisim::orderBy('created_at','DESC')->get();  
            return view('back.iletisim',$data);
        } 
    }


}

 