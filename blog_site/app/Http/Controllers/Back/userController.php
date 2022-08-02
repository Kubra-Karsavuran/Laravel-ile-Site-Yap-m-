<?php

namespace App\Http\Controllers\Back; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;  

// model tanımlamaları  
use App\Models\admin;
 

class userController extends Controller
{
    public function users(){
        return view('back.kullanici');
    } 
    public function userFunction(){ 
        $data['user']=admin::orderBy('created_at','DESC')->get();
        return view('back.kullanici',$data);
    } 
    public function useOpen(Request $request){
        $data['form']="form"; 
        $data['user']=admin::orderBy('created_at','DESC')->get(); 
        return view('back.kullanici',$data);
    } 
    public function vazgec(){
        $data['user']=admin::orderBy('created_at','DESC')->get(); 
        $data['form']="no";
        return view('back.kullanici',$data);
    }  
    public function useDelete($useid){
        $deger=admin::where('id',$useid)->delete();
        if ($deger==1) {
            $data['user']=admin::orderBy('created_at','DESC')->get(); 
            return view('back.kullanici',$data);
        }else if($deger==0){
            $data['user']=admin::orderBy('created_at','DESC')->get();
            $data['olmadisil']="*Tekrar Deneyin";
            return view('back.kullanici',$data);
        }else{
            $data['user']=admin::orderBy('created_at','DESC')->get();
            $data['olmadisil']="*Tekrar Deneyin";
            return view('back.kullanici',$data);
        }
    }  
    public function useSave(Request $request){  
        $rules=[
            'isim'=>'required',
            'email'=>'required|email',
            'sifre'=>'required'
        ];
        $validate=Validator::make($request->post(),$rules);
        $dizi=$validate->errors(); 
        $deger=count($dizi); 
        if ($deger==0) { 
            $contact=new admin;
            $contact->name=$request->isim;
            $contact->email=$request->email;
            $contact->password=$request->sifre;
            $contact->save(); 
            $data['user']=admin::orderBy('created_at','DESC')->get();
            return view('back.kullanici',$data);
        }else{
            $data['saveno']="Tekrar Deneyiniz";
            $data['user']=admin::orderBy('created_at','DESC')->get();
            return view('back.kullanici',$data); 
        }  
    }
 
    public function getdata(Request $request){
        $veri=admin::findOrFail($request->id); // bu id li tum verıyı ceker 
        return response()->json($veri);
    } 

    public function getdatapost(Request $request){
        $idverisi=$request->idverisi;
        $kontrol=admin::where('id',$idverisi)->update([
            'name'=>$request->updatename,
            'email'=>$request->updateemail,
            'password'=>$request->updatepassword
        ]);
        if ($kontrol==1) {
            toastr()->success('Başarılı', 'İşlem Başarılı', ['timeOut' => 3000]);
            $data['user']=admin::orderBy('created_at','DESC')->get();
            return view('back.kullanici',$data);  
        }else{
            toastr()->error('Başarısız', 'Tekrar Deneyiniz', ['timeOut' => 3000]);
            $data['user']=admin::orderBy('created_at','DESC')->get();
            return view('back.kullanici',$data);  
        }

    }




    public function useUpdatesave(Request $request){
        $workid=$request->id; 
        $deneme=admin::where('id',$workid)->update([
            'name'=>$request->isim,
            'email'=>$request->email,
            'password'=>$request->sifre
        ]);
        if ($deneme==1) { 
            $data['user']=admin::orderBy('created_at','DESC')->get(); 
            return view('back.kullanici',$data);
        }else{
            $data['user']=admin::orderBy('created_at','DESC')->get();  
            return view('back.kullanici',$data);
        } 
    }



    

}