<?php  
use Illuminate\Support\Facades\Route;  
Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function(){ 
	Route::get('adminPanel','Back\Dashboard@index')->name('dashboard');   
	Route::get('cikis','Back\AuthController@login_out')->name('login.out'); 
}); 
// admin kullanıcılar kısmı
Route::get('/admin/login','Back\AuthController@login_giris')->name('admin.login');      
Route::post('/admin/login','Back\AuthController@login_post')->name('admin.login.post');  
Route::get('/admin/kullanici','Back\userController@userFunction')->name('admin.kullanici'); 
Route::get('/admin/useOpen','Back\userController@useOpen')->name('admin.open');  
Route::get('/admin/no','Back\userController@vazgec')->name('admin.vazgec');  
Route::get('/admin/useDelete/{useid}','Back\userController@useDelete');    
Route::post('/admin/useSave','Back\userController@useSave')->name('admin.save');  

//bu ıslem jquery ıle ajax kullanılarak yazıldı kullanıcılar sayfasın da 
Route::get('/admin/getdata','Back\userController@getdata')->name('admin.getdata');
Route::post('/admin/getdatapost','Back\userController@getdatapost')->name('admin.getdatapost'); 
// admin panelde mesaj yollama işlemi
Route::get('/admin/mesaj_yolla/{mesajyollaname}/{mesajyollaemail}','Back\mesajController@mesajYolla'); 
// bu uzantıdan maıl yollanacak  
Route::post('/admin/email_yolla','Back\mesajController@mesaj_email')->name('admin.email_islemleri');  




// frontend tarafında yazıların kalplerı
Route::get('/yazi/like/{kalpid}','front\Homecontroller@yaziKalp');






Route::post('/admin/useUpdatesave','Back\userController@useUpdatesave')->name('admin.updatesave');  
//admin mesajlar kısmı yapılacak burada 
Route::get('/admin/seemesaj','Back\mesajController@seemesaj')->name('admin.seemesaj'); 
Route::get('/admin/all/{deger}','Back\mesajController@tumubutton');
Route::get('/admin/delete/{deleteid}','Back\mesajController@delete');  
// admin yorumlar kısmı
Route::get('/admin/comment','Back\commentPage@commetPage')->name('admin.commentPage');
Route::get('/admin/commentdel/{comdelid}','Back\commentPage@commentdel');
Route::get('/admin/pagesee/{pageid}','Back\yorumeki@pagesee');
Route::get('/admin/pagesil/{pagesilid}','Back\yorumeki@pagesil');
// yorumlar son
Route::get('/admin/kategori','Back\menuController@katmake')->name('admin.kategori');
Route::get('/admin/menuopen','Back\menuController@menuopen')->name('admin.menuopen');
Route::post('/admin/menusave','Back\menuController@menusave')->name('admin.menusave');
Route::get('/admin/menuvaz','Back\menuController@menuvaz')->name('admin.menuvaz');
Route::get('/admin/menudelete/{menudelid}','Back\menuController@menudel');
Route::get('/admin/menuupdate/{menuupid}','Back\menuController@menuupdate');
Route::get('/admin/menuupvaz','Back\menuController@menuupvaz')->name('admin.menuupvaz'); 
Route::post('/admin/menuupsave','Back\menuController@menuupsave')->name('admin.menuupsave');
// admın ıletısım bılgılerı
Route::get('/admin/iletisim','Back\iletisimController@iletisimsee')->name('admin.iletisim');
Route::get('/admin/iletupdate/{iletupid}','Back\iletisimController@iletisimupdate');
Route::get('/admin/gunvaz','Back\iletisimController@iletivaz')->name('admin.ilevaz');
Route::post('/admin/iletguncel','Back\iletisimController@iletsave')->name('admin.ilgun'); 
//admin yazılar sayfasının kodları
Route::get('/admin/yaziopen','Back\yaziController@yaziopen')->name('admin.yaziopen');
Route::get('/admin/yazidelete/{yazidelid}','Back\yaziController@yazidel');
Route::get('/admin/yaziekleac','Back\yaziController@yaziekleac')->name('admin.yaziekleac');
Route::post('/admin/yazisave','Back\yaziController@yazisave')->name('admin.yazisave');
Route::get('/admin/yazivaz','Back\yaziController@yazivaz')->name('admin.yazivaz');
Route::get('/admin/yazigunce/{yaziup}','Back\yaziController@yaziup');
Route::post('/admin/yazigun','Back\yaziController@yaziupdate')->name('admin.yaziuptade');
Route::get('/admin/yazitamami/{yaziid}/{kateid}','Back\yaziController@yazitamami');
Route::get('/admin/anaSayfa','Back\yaziController@anaSayfaopen')->name('admin.anasayfaopen'); 
Route::get('/admin/silinenler','Back\yaziController@deletepage')->name('admin.deletepage');
Route::get('/admin/recover/{recoverid}','Back\yaziController@recover');
Route::get('/admin/hardrecover/{hardrecoverid}','Back\yaziController@hardrecover'); 

//////////////////////////////////////////////////
//admin sayfasının kodları
Route::get('/yorumlar/dahaaz','front\Homecontroller@dahaaz')->name('admin.dahaaz');  
Route::get('/','front\Homecontroller@index');
Route::get('/iletisim','front\Homecontroller@iletisim');   
Route::post('/iletisim','front\Homecontroller@iletisim_post')->name('iletisim.post');  
Route::get('/yorumlar','front\Homecontroller@yorumlar'); 
Route::post('/yorumlar','front\Homecontroller@yorum_post')->name('yorum.post');

Route::get('/yorumlar/like/{like_number}/{id_deger}','front\Homecontroller@yorum_like'); 
Route::get('/yorumlar/dislike/{dislike_number}/{id_ddeger}','front\Homecontroller@yorum_dislike');   
Route::get('/yazilar','front\Homecontroller@yazilanyazilar');  
Route::get('/hakkimizda','front\Homecontroller@hakkimizda_see');  
Route::get('/kategori/{categori}','front\Homecontroller@yazi_get')->name('categori');  
Route::get('/{kategori_yaz}/{slug}','front\Homecontroller@single'); 
//Route::get('/{yazi_id}','front\Homecontroller@tiklanma');
Route::get('/yorumlar/cevap/{cevap_id}','front\Homecontroller@yorum_cevap'); 
Route::post('/yorumlar/postislem','front\Homecontroller@yorumlarcev_post')->name('yorumcev.post');
Route::get('/yorumlar/dahafazla/{yorumid}','front\Homecontroller@yorumdahafaz');





