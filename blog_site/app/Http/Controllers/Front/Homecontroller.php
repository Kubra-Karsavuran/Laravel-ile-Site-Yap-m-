<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// model tanımlamalarımı yaptım
use App\Models\menu;
use App\Models\yazilar; 
use App\Models\tiklanma;
use App\Models\page;
use App\Models\Contact;
use App\Models\yorumlar;


// valıdator tanımlaması yanı gelen postları konturol edıcez demek bu 
use Validator;
// email yollama ıslemı
use Mail;

use Illuminate\Support\Facades\DB;  // verı tabanı eklentısı




class Homecontroller extends Controller
{
    public function index(){ 
        $data['veri']=menu::inRandomOrder()->get();     // konu baskıları var bunda 
        $data['yazilar']=yazilar::orderBy('created_at','DESC')->get();  
        $data['pages']=page::orderBy('order','ASC')->get();
        return view('front.homepage',$data); 
    }



//////////////////////////////////////////////////////////////////

    // yapılan yorumları sayfada paylasma ıslemlerı
    public function yorumlar(){ 

        $veriler=yorumlar::where('kimyo',0)->get(); 
        $data['yorum_number']=count($veriler); 
        $data['yorumlarim']=$veriler; 
        return view('front.yorumlar',$data);
    }


    // yapılan yorumu vt nına atma ıslemı 
    public function yorum_post(Request $request){ 
     $kural=[ 
        'name'=>'required',
        'email'=>'required|email',
        'mesaj'=>'required'
    ];
    $validate=Validator::make($request->post(),$kural);

    $try=$validate->errors();
    $deger=count($try);

    if ($deger!=0) {
        return view('front.yorumlar')->with('mesaj','Tekrar Deneyiniz !!!');
    }else{
            //vt nına veriler atılacaktır
        $write=new yorumlar;
        $write->ad_soyad=$request->name; 
        $write->email=$request->email;
        $write->yorum=$request->mesaj;
        $write->save();


        $veriler=yorumlar::where('kimyo',0)->get();  
        $deger=count($veriler); 
        $data['yorumlarim']=$veriler;
        $data['yorum_number']=$deger;
        $data['mesaj']="Yorumunuz Gönderildi"; 

        return view('front.yorumlar',$data); 

    } 
}

    // yorumlardakı like butonu yapımı 
public function yorum_like($like_number,$id_deger){

    $change=yorumlar::where('id',$id_deger)->first(); 
    $new_like_number=$change->like+1;

    yorumlar::where('id',$id_deger)->update([
        'like'=>$new_like_number,
    ]);

        // verılerı ekrana yazma 
    $veriler=yorumlar::where('kimyo',0)->get();  
    $deger=count($veriler); 
    $data['yorumlarim']=$veriler;
    $data['yorum_number']=$deger; 

    return view('front.yorumlar',$data); 
}


    // yorumlardakı dislike butonu yapımı
public function yorum_dislike($dislike_number,$id_ddeger){

    $change_2=yorumlar::where('id',$id_ddeger)->first(); 
    $new_like_numberr=$change_2->dislike+1;

    yorumlar::where('id',$id_ddeger)->update([
        'dislike'=>$new_like_numberr,
    ]);

    $veriler=yorumlar::where('kimyo',0)->get();  
    $deger=count($veriler); 
    $data['yorumlarim']=$veriler;
    $data['yorum_number']=$deger;

    return view('front.yorumlar',$data); 
}



public function yorum_cevap($cevap_id){ 
    $veriler=yorumlar::where('kimyo',0)->get();  
    $deger=count($veriler); 
        $data['yorumlarim']=$veriler;//yorumlar
        $data['yorum_number']=$deger; //yorum sayısı ekrana yazıyo
        $data['cevap_id']=$cevap_id;  //kıme cevap verdıysem onun id si
        return view('front.yorumlar',$data); 
    }
    public function yorumlarcev_post(Request $request){ 
        $comsave=new yorumlar;
        $comsave->ad_soyad=$request->name;
        $comsave->email=$request->email;
        $comsave->yorum=$request->mesaj;
        $comsave->kimyo=$request->kimcevap;
        $deger=$comsave->save(); 
        if ($deger==1) {
            $data['oldu']="İşleminiz Yapıldı";
            $veriler=yorumlar::where('kimyo',0)->get();  
            $deger=count($veriler); 
            $data['yorumlarim']=$veriler;
            $data['yorum_number']=$deger; 
            return view('front.yorumlar',$data); 
        } 
    }
    public function yorumdahafaz($yorumid){
        $kubra=yorumlar::where('kimyo',$yorumid)->get(); 
        $sayi=count($kubra);
        $data['sayideger']=$sayi; //0=veri yok 1=veri var

        $data['yaziver']=yorumlar::where('kimyo',$yorumid)->get();

        $veriler=yorumlar::where('kimyo',0)->get();  
        $deger=count($veriler); 
        $data['yorumlarim']=$veriler;
        $data['yorum_number']=$deger; 
        return view('front.yorumlar',$data); 
    }

    public function dahaaz(){
        $veriler=yorumlar::where('kimyo',0)->get();  
        $deger=count($veriler); 
        $data['yorumlarim']=$veriler;
        $data['yorum_number']=$deger; 
        return view('front.yorumlar',$data);
    }


//////////////////////////////////////////////////////////////////////


    public function single($kategori,$slug){ // kategorı adı + baslıgın slug halı 
        $kate_dene=menu::whereSlug($kategori)->first() ?? abort(403,'Böyle Bir kategori Bulunamadı'); // boyle bır kategorı varmı konturolu

        $deneme=yazilar::where('title_slug',$slug)->where('kategori_id',$kate_dene->id)->first() ?? abort(403,'Böyle Bir Yazı Bulunamadı');

        $deneme->increment('hit'); // tıklanma sayısı

        $data['article']=$deneme;

        return view('front.yazinin_tamami',$data);
    }

 

    public function yazi_get($categori){

        $get_kate=menu::where('slug',$categori)->first() ?? abort(403,'Böyle Bir kategori Bulunamadı');
        $at=$get_kate->id;
        $data['categori']=$get_kate; 

        $get_yazi=yazilar::where('kategori_id',$at)->get();
        $data['cate_yazi']=$get_yazi; 

        return view('front.kategorinin_yazilari',$data);  
    }
 

    public function hakkimizda_see(){   
        $data['degerler']=page::where('id',1)->first();
        return view('front.page',$data);
    }
 
//yazılan yazılar ıcın yazılan function 

    public function yazilanyazilar(){ 
        $data['metin']=yazilar::orderBy('created_at','DESC')->get(); 
        return view('front.yazilanyazilar',$data);  
    }


    // iletişim sayfası
    
    public function iletisim(){
        return view('front.iletisim');
    }


    public function iletisim_post(Request $request){

     $rules=[
        'name'=>'required',
        'email'=>'required|email',
        'topic'=>'required',
        'message'=>'required'
    ];
    $validate=Validator::make($request->post(),$rules);
    $dizi=$validate->errors();

    $deger=count($dizi);

    if ($deger==0) {  

        $contact=new Contact;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->topic=$request->topic;
        $contact->message=$request->message;
        $veri=$contact->save(); 
        
        if ($veri==1) { // veri tabanı oldu  
            return view('front.iletisim')->with('succes','Başarıyla Mesajınız İletilmiştir');
            die; 
        }else{
            return view('front.iletisim')->with('succes','verı tabanı olmadı !!!');
            die;
        }
 
    }else{
        return view('front.iletisim')->with('succes','Yazımda hata !!!');
        die;
    }

}

 
// front kısmındakıı yzıların kalplerini yapıcaz 
public function yaziKalp($kalpid){

    $article=yazilar::where('id',$kalpid)->first();
    $newlike=$article->like+1; 
    yazilar::where('id',$kalpid)->update([
        'like'=>$newlike,
    ]); 
    $data['article']=$article;
    return view('front.yazinin_tamami',$data); 
}










}
