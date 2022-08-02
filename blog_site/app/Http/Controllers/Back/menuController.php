<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
//model eklentileri
use App\Models\menu;
use App\Models\yazilar;
use Validator;


class menuController extends Controller
{ 
    public function katmake(){
        $data['veri']=menu::orderBy('created_at','DESC')->get();
        return view('back.menu',$data);
    }
    public function menuopen(){
        $data['veri']=menu::orderBy('created_at','DESC')->get();
        $data['form']="form";
        return view('back.menu',$data);
    }
    public function menusave(Request $request){
        $rules=[
            'isim'=>'required'
        ];
        $validate=Validator::make($request->post(),$rules);
        $dizi=$validate->errors();
        $deger=count($dizi);

        if ($deger==0) { 
            $save=new menu;
            $save->menu_ad=$request->isim;
            $save->slug= Str::slug($request->isim);
            $deger=$save->save();
            $data['veri']=menu::orderBy('created_at','DESC')->get();
            $data['oldu']="İşleminiz Yapıldı";
            return view('back.menu',$data);

        }else{ 
            $data['olmadi']="Tekrar Deneyiniz";
            return view('back.menu',$data);
        }
    } 
    public function menuvaz(){
        $data['veri']=menu::orderBy('created_at','DESC')->get(); 
        return view('back.menu',$data);
    }  
    public function menudel($menudelid){ 

        $konturol=yazilar::where('kategori_id',$menudelid)->get();  
        $datakontrol=count($konturol);//0 veri yok 1 ıse var
        if ($datakontrol==0) { 
            $katesil=menu::where('id',$menudelid)->delete(); 
            if ($katesil==1) {
                $data['oldu']="İşleminiz Yapıldı";
                $data['veri']=menu::orderBy('created_at','DESC')->get();
                return view('back.menu',$data); 
            }else{
                $data['olmadi']="Tekrar Deneyiniz";
                $data['veri']=menu::orderBy('created_at','DESC')->get();
                return view('back.menu',$data); 
            }
        }else{
            $data['olmadi']="Bu Kategoriye Ait Kaydedilmiş Yazılar Var Silme İşlemini Yapabilmeniz İçin O Yazıları Silmeniz Gerekmektedir."; 
            $data['veri']=menu::orderBy('created_at','DESC')->get();  
            return view('back.menu',$data); 
        }  
    }   
    public function menuupdate($menuupid){
        $data['dataup']=menu::where('id',$menuupid)->get();
        $data['veri']=menu::orderBy('created_at','DESC')->get();  
        return view('back.menu',$data); 
    } 
    public function menuupvaz(){
        $data['veri']=menu::orderBy('created_at','DESC')->get(); 
        return view('back.menu',$data); 
    } 
    public function menuupsave(Request $request){ 
        $deneme=menu::where('id',$request->id)->update([
            'menu_ad'=>$request->isim,
            'slug'=>Str::slug($request->isim)
        ]);
        if ($deneme==1) { 
            $data['veri']=menu::orderBy('created_at','DESC')->get(); 
            return view('back.menu',$data);
        }else{
            $data['veri']=admin::orderBy('created_at','DESC')->get();  
            return view('back.menu',$data);
        } 
    }

}
