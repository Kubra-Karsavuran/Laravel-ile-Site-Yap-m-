@extends('back.layouts.master')
@section('title','Panel')
@section('content') 

<div id="wrapper">  
    <div id="content-wrapper" class="d-flex flex-column">


        <div class="container-fluid">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">- KATEGORİLER -</h4> 
                </div>
                <div>
                    <a  href="{{route('admin.menuopen')}}" class="btn btn-secondary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-right"></i>
                        </span> 
                        <span class="text">Kategori Ekle </span> 
                    </a> 
                    <br>
                    <p style="color: red;">
                        <?php 
                        if (isset($oldu)) {
                            echo $oldu;
                        }elseif (isset($olmadi)) {
                            echo $olmadi;
                        } ?>
                    </p>
                    <?php if (isset($form) && $form=="form") { ?>
                     <div> 
                        <div style="border: 1px solid #d3d3d3;border-radius: 20px;" class="col-4">
                            <br>
                            <h3>- Admin Kullanıcı Ekle -</h3> 
                             
                            <form method="POST" action="{{route('admin.menusave')}}" class="user">
                                @csrf  
                                <div class="form-group">
                                    <input type="text" name="isim" class="form-control form-control-user"aria-describedby="emailHelp"placeholder="İsim-Soyisim" >
                                </div>      
  
                                <button type="submit"  class="btn btn-primary btn-user btn-block" >Kaydet</button> 
                                <hr>

                                <a href="{{route('admin.menuvaz')}}" class="btn btn-google btn-user btn-block">Vazgeç</a>  
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
                    <h3>- Admin Güncelleme İşlemi -</h3>   

                    <form method="POST" action="{{route('admin.menuupsave')}}" class="user">
                        @csrf 
                        <div class="form-group">
                            <input type="text" name="isim" class="form-control form-control-user"aria-describedby="emailHelp"placeholder="İsim-Soyisim" value="<?php echo $dataup[0]['menu_ad']; ?>">
                        </div>   
                        <button type="submit" name="id" value="<?php echo $dataup[0]['id']; ?>"  class="btn btn-primary btn-user btn-block" >Kaydet</button> 
                        <hr>  
                        <a href="{{route('admin.menuupvaz')}}" class="btn btn-google btn-user btn-block">Vazgeç</a>  
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
                            <th>Sıralama</th> 
                            <th>Name-Surname</th>  
                            <th>Yükleme Tarihi</th>
                            <th>Güncelleme Tarihi</th> 
                            <th>Sil</th> 
                            <th>Güncelle</th> 
                        </tr>
                    </thead> 
                    <tfoot>
                        <tr>
                            <th>Sıralama</th>
                            <th>Name-Surname</th>  
                            <th>Yükleme Tarihi</th>
                            <th>Güncelleme Tarihi</th> 
                            <th>Sil</th> 
                            <th>Güncelle</th>  
                        </tr>
                    </tfoot>
                    <tbody id="orders" > 
                        <?php if (isset($veri)) {

                         foreach ($veri as $value) {?> 
                            <tr>
                                <td> <i class="fa fa-arrows-alt-v fa-3x handle" style="cursor: move;" ></i> </td>
                                <td><?php echo $value->menu_ad; ?></td>
                                <td><?php echo $value->created_at; ?></td>
                                <td><?php echo $value->updated_at; ?></td> 
                                <td>
                                    <a href="/admin/menudelete/<?php echo $value->id; ?>" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Sil</span>
                                    </a>
                                </td> 

                                <td>
                                    <a href="/admin/menuupdate/<?php echo $value->id; ?>" class="btn btn-info btn-icon-split">
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

@section('js')
<script src="https://cdn.jsdelivr.net/npm/knockout-sortable@1.2.2/build/knockout-sortable.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<script type="text/javascript">
    $('#orders').sortable({
        handle:'.handle'
    });
</script>
@endsection
