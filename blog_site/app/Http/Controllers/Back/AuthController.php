<?php

namespace App\Http\Controllers\Back; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Validator; 
use Illuminate\Support\Facades\DB;  

use Illuminate\Support\Facades\Auth;
use App\Models\admin;  


class AuthController extends Controller
{
    public function login_giris(){
        return view('back.auth.login');
    }
    
    // login post ıslemlerı
    public function login_post(Request $request){ 
        $rules=[
        'name'=>'required',
        'email'=>'required|email',
        'password'=>'required'
        ]; 
        $validate=Validator::make($request->post(),$rules);
        $dizi=$validate->errors(); 
        $deger=count($dizi); // dizi varsa yanı error varsa

        if ($deger==0) {
            /// inputlarda hata yok demek  
            $data=admin::orderBy('id','ASC')->get(); 
           
            for ($i=0; $i <count($data) ; $i++) { 
                if ($request->password==$data[$i]['password']) {
                    return view('back.dashboard'); 
                    break;
                }  
            }   
            return view('back.auth.login')->with('unsuccessful','Admin Kullanıcısı Değilsiniz !!!');

        }else if($deger!=0){
            // input girişlerinde bır hata var
            return view('back.auth.login')->with('unsuccessful','Bilgileri Konturol Ediniz !!!');
        }else{
            return view('back.auth.login')->with('unsuccessful','Tekrar Deneyiniz !!!');
        } 
    }


    public function login_out(){
        return view('back.auth.login');
    }
    

    
}

