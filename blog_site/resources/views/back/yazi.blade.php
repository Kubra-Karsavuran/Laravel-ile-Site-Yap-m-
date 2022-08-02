@extends('back.layouts.master')
@section('title','Panel')
@section('content') 

<div id="wrapper">  
    <div id="content-wrapper" class="d-flex flex-column">


        <div class="container-fluid">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">- YAZILAR -</h4> 
                </div>

                <div>
                    <a  href="{{route('admin.yaziekleac')}}" class="btn btn-secondary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-right"></i>
                        </span> 
                        <span class="text">Yazı Ekle </span> 
                    </a>
                    <a  href="{{route('admin.deletepage')}}" class="btn btn-warning btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span> 
                        <span class="text">Silinmiş Yazılar</span> 
                    </a>   
                    <br> 
                    <?php if (isset($form) && $form=="form") { ?>
                       <div> 
                        <div style="border: 1px solid #d3d3d3;border-radius: 20px;" class="col-4">
                            <br>
                            <h3>- YAZI EKLE -</h3>   

                            <form method="POST" action="{{route('admin.yazisave')}}" class="user" enctype="multipart/form-data">
                                @csrf  
                                <div class="form-group">
                                    <label>Makale Fotoğrafı:</label>
                                    <input type="file" name="image" class="form-control" required >
                                </div>      

                                <div class="form-group">
                                    <label>Makale Başlığı:</label>
                                    <input type="text" name="baslik" class="form-control" required >
                                </div>  

                                <!-- kategoriler -->
                                <div>
                                 <label>Makale Kategorileri:</label>
                                 <?php foreach ($kate as $value) { ?>  
                                     <div class="form-check">  
                                        <input value="<?php echo $value->id; ?>"  class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            <?php echo $value->menu_ad; ?>
                                        </label>

                                    </div>
                                <?php } ?>
                            </div> <br>
                            <!-- kategoriler -->

                            <div class="form-group">
                             <label>Makale Metni:</label>
                             <textarea id="summernote" type="text" name="metin" class="form-control" rows="6" > </textarea>
                         </div> 

                         <button type="submit"  class="btn btn-primary btn-user btn-block" >Kaydet</button> 
                         <hr>

                         <a href="{{route('admin.yazivaz')}}" class="btn btn-google btn-user btn-block">Vazgeç</a>  
                     </form><br>



                 </div>
                 <div class="col-4"> 
                 </div>
                 <div class="col-4"> 
                 </div> 
             </div>  
             <br><br>
         <?php } ?>
     </div>

     <!-- guncelleme formu bu ona gore ıslenecektır -->

     <?php if (isset($dataup)) { ?>  
       <div> 
        <div style="border: 1px solid #d3d3d3;border-radius: 20px;" class="col-4">
            <br>
            <h3>- YAZI GÜNCELLE -</h3>   

            <form enctype="multipart/form-data" method="POST" action="{{route('admin.yaziuptade')}}" class="user">
                @csrf  
                <div class="form-group">
                    <label>Makale Resmi:</label>
                    <input  type="file" name="url" class="form-control" required   >
                </div>      

                <input type="text" name="id" hidden value="<?php  echo $dataup[0]['id']; ?>">

                <div class="form-group">
                    <input type="text" name="baslik" class="form-control" required  value="<?php echo $dataup[0]['title']; ?>" >
                </div> 

                <!-- kategoriler -->
                <div> 
                    <?php foreach ($kategoriup as $value) {?>

                     <div class="form-check">
                      <input <?php if ($value->id==$dataup[0]['kategori_id']) {
                        $deger=$value->id;
                        echo "checked value='".$deger."'";
                    }?> value="<?php echo $value->id; ?>" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        <?php echo $value->menu_ad; ?>
                    </label>
                </div> 
            <?php } ?>
        </div> <br>
        <!-- kategoriler --> 
       
        <div class="form-group">
            <textarea required value="deneme" id="summernote" type="text" name="metin" class="form-control" rows="6" > </textarea>  
        </div> 

        <button type="submit"  class="btn btn-primary btn-user btn-block" >Kaydet</button> 
        <hr>

        <a href="{{route('admin.yazivaz')}}" class="btn btn-google btn-user btn-block">Vazgeç</a>  
    </form><br>
</div>
<div class="col-4"> 
</div>
<div class="col-4"> 
</div> 
</div>  
<br><br>
<?php } ?>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Resim</th>  
                    <th>Başlık</th>
                    <th>Metin</th> 
                    <th>Kategori</th> 
                    <th>Like Sayısı</th>
                    <th>Tıklanma Sayısı</th> 
                    <th>Tamamı</th>
                    <th>Güncelle</th>  
                    <th>Sil</th>
                </tr>
            </thead> 
            <tfoot>
                <tr>
                    <th>Resim</th>  
                    <th>Başlık</th>
                    <th>Metin</th> 
                    <th>Kategori</th> 
                    <th>Like Sayısı</th>
                    <th>Tıklanma Sayısı</th> 
                    <th>Tamamı</th>
                    <th>Güncelle</th>  
                    <th>Sil</th>   
                </tr>
            </tfoot>
            <tbody> 
                <?php if (isset($veri)) {

                   foreach ($veri as $value) {?> 
                    <tr>
                        <td><img style="width: 150px;height: 100px;" src="<?php echo $value->image; ?>"> </td>
                        <td><?php echo $value->title; ?></td>
                        <td><?php $metin=substr($value->content, 0, 100); $nokta="..."; echo $metin.$nokta; ?></td> 
                        <td><?php echo $value->get_name->menu_ad;?></td> 
                        <td><?php echo $value->like; ?></td> 
                        <td><?php echo $value->hit; ?></td> 

                        <td>
                            <a href="/admin/yazitamami/<?php echo $value->id;?>/<?php echo $value->kategori_id;?>" class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <span class="text">Tamamı</span>
                            </a>
                        </td> 

                        <td>
                            <a href="/admin/yazidelete/<?php echo $value->id; ?>" class="btn btn-danger btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Sil</span>
                            </a>
                        </td> 

                        <td>
                            <a href="/admin/yazigunce/<?php echo $value->id; ?>" class="btn btn-info btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                                <span class="text">Güncelle</span>
                            </a>
                        </td> 

                    </tr> 
                <?php }   } ?>
            </tbody>
        </table>
    </div>
</div>
</div> 
</div>  
</div> 
@endsection  

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection 

 
@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> 
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script> 
@endsection 
