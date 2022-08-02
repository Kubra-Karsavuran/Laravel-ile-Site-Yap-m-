<?php

namespace App\Http\Controllers\Back; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // slug yazımı
// model eklentısı
use App\Models\yazilar;
use App\Models\menu;

use Illuminate\Support\Facades\File;// dosyanın ıcınden verı sılme ıslemı



class yaziController extends Controller
{
    public function yaziopen(){
        $data['veri']=yazilar::orderBy('created_at','ASC')->get();
        return view('back.yazi',$data); 
    } 
    public function yazidel($yazidelid){ 
        $deneme=yazilar::where('id',$yazidelid)->delete();  
        if ($deneme==1) {
            $data['veri']=yazilar::orderBy('created_at','ASC')->get();
            toastr()->success('Başarılı', 'İşlem Başarılı', ['timeOut' => 3000]);
            return view('back.yazi',$data);
        }else{
            toastr()->error('Başarısız', 'Tekrar Deneyiniz', ['timeOut' => 3000]);
            $data['veri']=yazilar::orderBy('created_at','ASC')->get();
            return view('back.yazi',$data);
        }  
    } 
    public function yaziekleac(){
        $data['veri']=yazilar::orderBy('created_at','ASC')->get();
        $data['kate']=menu::orderBy('created_at','ASC')->get();
        $data['form']="form";
        return view('back.yazi',$data);
    } 
    public function yazivaz(){
        $data['veri']=yazilar::orderBy('created_at','ASC')->get(); 
        return view('back.yazi',$data);
    } 


    public function yazisave(Request $request){ 
        $article=new yazilar;
        $article->title=$request->baslik;
        $article->title_slug=Str::slug($request->baslik);
        $article->content=$request->metin;
        $article->kategori_id=$request->flexRadioDefault; 
        
        if ($request->hasFile('image')) { // bu verı varmı dıye sorduk
            $newimagename=str::slug($request->baslik).".".$request->image->getClientOriginalExtension(); 
            $request->image->move(public_path('uploads'),$newimagename);// dosya uzantısı,kaydedecegım verı
            $article->image="uploads/".$newimagename;
        }  
        $sonuc=$article->save(); 
        if ($sonuc==1) { 
            $data['veri']=yazilar::orderBy('created_at','ASC')->get(); 
            toastr()->success('Başarılı', 'İşlem Başarılı', ['timeOut' => 3000]);
            return view('back.yazi',$data); 
        }else{
            $data['veri']=yazilar::orderBy('created_at','ASC')->get();  
            toastr()->error('Başarısız', 'Tekrar Deneyiniz', ['timeOut' => 3000]);
            return view('back.yazi',$data);
        }
    } 


    public function yaziupdate(Request $request){ 

        $degid=$request->id;   
        
        if ($request->hasFile('url')) {
            $newimagename=str::slug($request->baslik).".".$request->url->getClientOriginalExtension(); 
            $request->url->move(public_path('uploads'),$newimagename);// dosya uzantısı,kaydedecegım verı
            $kaydet="uploads/".$newimagename;

            $deger=yazilar::where('id',$degid)->update([
                'kategori_id'=>$request->flexRadioDefault,
                'title'=>$request->baslik,
                'title_slug'=>Str::slug($request->baslik), 
                'content'=>$request->metin,
                'image'=>$kaydet
            ]);

            if ($deger==1) { 
                $data['veri']=yazilar::orderBy('created_at','ASC')->get();
                toastr()->success('Başarılı', 'İşlem Başarılı', ['timeOut' => 3000]);
                return view('back.yazi',$data);
            }else{
                $data['veri']=yazilar::orderBy('created_at','ASC')->get();
                toastr()->error('Başarısız', 'Tekrar Deneyiniz', ['timeOut' => 3000]);
                return view('back.yazi',$data);
            }  

        }else{
            $data['veri']=yazilar::orderBy('created_at','ASC')->get();
            toastr()->error('Başarısız', 'Tekrar Deneyiniz', ['timeOut' => 3000]);
            return view('back.yazi',$data);
        } 
        
    }



    public function yaziup($yaziup){

    $data['dataup']=yazilar::where('id',$yaziup)->get(); // basılanın verılerı
    $data['kategoriup']=menu::orderBy('created_at','ASC')->get(); // kategorileri yazdırmak ıcın
    $data['veri']=yazilar::orderBy('created_at','ASC')->get(); // alttakı satırlar ıcın
    return view('back.yazi',$data);  
} 


    //  yazının id/ kate id
public function yazitamami($yaziid,$kateid){
        // yazi id ıle varı cekme işlemleri
    $data['veri']=yazilar::where('id',$yaziid)->first();
        // kategori id ile ile kategorinin adının alacaz
    $data['katename']=menu::where('id',$kateid)->first();
    return view('back.tumyazi',$data); 
} 
public function anaSayfaopen(){
    $data['veri']=yazilar::orderBy('created_at','ASC')->get(); 
    return view('back.yazi',$data);
} 



public function deletepage(){
    $data['veri']=yazilar::onlyTrashed()->orderBy('deleted_at','desc')->get();
    return view('back.silinenler',$data);
}

public function recover($recoverid){
    yazilar::onlyTrashed()->find($recoverid)->restore(); 
    toastr()->success('Başarılı', 'İşlem Başarılı', ['timeOut' => 3000]);
    return view('back.silinenler');
}


public function hardrecover($hardrecoverid){
    $delsave=yazilar::onlyTrashed()->find($hardrecoverid); 

    if (File::exists($delsave->image)) { // kalıcı sılme ıslemınde resım varmı kontrolu
        File::delete(public_path($delsave->image)); // resmı sıl
        $deger=$delsave->forceDelete();  // vt nından kalıcı bu satırı sıl
        if ($deger==1) {
            toastr()->success('Başarılı', 'İşlem Başarılı', ['timeOut' => 3000]);
            return view('back.silinenler'); 
        }else{
            toastr()->error('Başarısız', 'Tekrar Deneyiniz', ['timeOut' => 3000]);
            return view('back.silinenler'); 
        }

    }else{
        toastr()->error('Başarısız', 'Tekrar Deneyiniz', ['timeOut' => 3000]);
        return view('back.silinenler');
    } 
}



}
