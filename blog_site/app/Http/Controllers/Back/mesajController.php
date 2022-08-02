<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// model eklentileri
use App\Models\Contact;
use Mail;


class mesajController extends Controller
{
    public function seemesaj(){
        $data['veri']=Contact::orderBy('created_at','DESC')->get();
        return view('back.mesajsee',$data);
    }
    public function tumubutton($deger){
        if ($deger==10) {
            $data['veri']=Contact::orderBy('created_at','DESC')->get();
            return view('back.mesajsee',$data);
        }elseif($deger==20){
            $data['veri']=Contact::where('topic','Bilgi')->get();
            return view('back.mesajsee',$data); 
        }elseif($deger==30){
            $data['veri']=Contact::where('topic','Destek')->get();
            return view('back.mesajsee',$data); 
        }elseif($deger==40){
            $data['veri']=Contact::where('topic','Genel')->get();
            return view('back.mesajsee',$data); 
        }
    }

    public function delete($deleteid){
        $data['veri']=Contact::orderBy('created_at','DESC')->get();
        $see=Contact::where('id',$deleteid)->delete();
        $data['deger1']=$see;
        if ($see==1) {  
            return view('back.mesajsee',$data);
        }else{
            return view('back.mesajsee',$data);
        } 
    }

 

    public function mesajYolla($mesajyollaname,$mesajyollaemail){ 
        $data['name']=$mesajyollaname;
        $data['email']=$mesajyollaemail;
        return view('back.meal_yolla',$data); 
    }



// gonderılecek mail ıslemleri burda
// siteden mesaj atan kısıye mail uzerınden mesaj yollanacak burdan

    public function mesaj_email(Request $request){ 

        $getmail=$request->post_mail; // gonderılecek email adres 
        $getmesaj=$request->ileti;   // gonderılecek verı
 
 // bu mail, mailtrap uzerınden yapıldıgından dolayı gercek gonderılecek maıl adresı kullanılamadı 

        Mail::raw($getmesaj, function($message){ 
          $message->from('kubrakarsavuran18@gmail.com','Blog Sitesi');
          // mesaj kımden gıdecek
          $message->to('kubrakarsavuran18@gmail.com'); 
          // kime gidecek
          $message->subject('kübra'.'iletişimden mesaj gonderdı'); 
        });  

 
        $data['bilgi']="Mailiniz İletilmiştir";
        return view('back.meal_yolla',$data); 
    }
 
   





}
