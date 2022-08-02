@extends('back.layouts.master')
@section('title','Panel')
@section('content') 

<div id="wrapper">  
    <div id="content-wrapper" class="d-flex flex-column">


        <div class="container-fluid">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">PANEL KULLANICILARI</h4>
                    <p style="color: red;">
                        <?php 
                        if (isset($olmadisil)) {
                            echo "Tekrar Deneyiniz !!!";
                        }elseif (isset($saveno)) { 
                            echo "Tekrar Deneyiniz !!!"; 
                        } ?> 
                    </p> 
                </div>
                <div>
                    <a  href="{{route('admin.open')}}" class="btn btn-secondary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-right"></i>
                        </span> 
                        <span class="text">Kullanıcı Ekle</span> 
                    </a> 
                    <?php if (isset($form) && $form=="form") { ?>
                       <div> 
                        <div style="border: 1px solid #d3d3d3;border-radius: 20px;" class="col-4">
                            <br>
                            <h3>- Admin Kullanıcı Ekle -</h3> 

                            <form method="POST" action="{{route('admin.save')}}" class="user">
                                @csrf  
                                <div class="form-group">
                                    <input type="text" name="isim" class="form-control form-control-user"aria-describedby="emailHelp"placeholder="İsim-Soyisim" >
                                </div>      

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user"aria-describedby="emailHelp"placeholder="Email">
                                </div> 

                                <div class="form-group">
                                    <input type="password" name="sifre" class="form-control form-control-user"aria-describedby="emailHelp"placeholder="Şifre" >
                                </div> 

                                <button type="submit"  class="btn btn-primary btn-user btn-block" >Kaydet</button> 
                                <hr>

                                <a href="{{route('admin.vazgec')}}" class="btn btn-google btn-user btn-block">Vazgeç</a>  
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

                    <form method="POST" action="{{route('admin.updatesave')}}" class="user">
                        @csrf 
                        <div class="form-group">
                            <input type="text" name="isim" class="form-control form-control-user"aria-describedby="emailHelp"placeholder="İsim-Soyisim" value="<?php echo $dataup->name;?>">
                        </div>      

                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user"aria-describedby="emailHelp"placeholder="Email" value="<?php echo $dataup->email;?>">
                        </div> 

                        <div class="form-group">
                            <input type="password" name="sifre" class="form-control form-control-user"aria-describedby="emailHelp"placeholder="Şifre" value="<?php echo $dataup->password;?>">
                        </div> 

                        <button type="submit" name="id" value="<?php echo $dataup->id;?>"  class="btn btn-primary btn-user btn-block" >Kaydet</button> 
                        <hr>


                        <a href="{{route('admin.vazgec')}}" class="btn btn-google btn-user btn-block">Vazgeç</a>  
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
                            <th>Name-Surname</th>
                            <th>Email</th>
                            <th>Şifre</th>
                            <th>Yükleme Tarihi</th>
                            <th>Güncelleme Tarihi</th> 
                            <th>Sil</th> 
                            <th>Güncelle</th> 
                        </tr>
                    </thead> 
                    <tfoot>
                        <tr>
                            <th>Name-Surname</th>
                            <th>Email</th>
                            <th>Şifre</th>
                            <th>Yükleme Tarihi</th>
                            <th>Güncelleme Tarihi</th> 
                            <th>Sil</th> 
                            <th>Güncelle</th> 
                        </tr>
                    </tfoot>
                    <tbody> 
                        <?php if (isset($user)) {

                           foreach ($user as $value) {?> 
                            <tr>
                                <td><?php echo $value->name; ?></td>
                                <td><?php echo $value->email; ?></td>
                                <td><?php echo $value->password; ?></td>
                                <td><?php echo $value->created_at; ?></td>
                                <td><?php echo $value->updated_at; ?></td> 
                                <td>
                                    <a href="/admin/useDelete/<?php echo $value->id; ?>" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Sil</span>
                                    </a>
                                </td> 

                                <td>
                                    <a id="ajaxupdate" help="<?php echo $value->id; ?>" class="btn btn-info btn-icon-split">
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

<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog"> 
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Kullanıcı Güncelle</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button> 
            </div>

            <form action="{{route('admin.getdatapost')}}" method="POST" > 
                @csrf
                <div class="modal-body"> 
                    <div class="form-group">
                        <label>Kullanıcı Adı:</label>
                        <input id="updatename" type="text" class="form-control" name="updatename">
                    </div> 
                </div>
                <div class="modal-body"> 
                    <div class="form-group">
                        <label>Email:</label>
                        <input id="updateemail" type="email" class="form-control" name="updateemail">
                    </div> 
                </div>
                <div class="modal-body"> 
                    <div class="form-group">
                        <label>Şifre:</label>
                        <input id="updatepassword" type="password" class="form-control" name="updatepassword">
                    </div> 
                </div>
                <input type="hidden" id="idverisi" name="idverisi" value="">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-default" >Kaydet</button> 
                </div>
            </form>

        </div> 
    </div>
</div>




@endsection  

@section('js')

<script type="text/javascript">
    $(function(){
        //guncelle butonuna basıldıgında verıler alındı ve bu verıler modala yazılacak
        $(document).on('click','#ajaxupdate',function(){ 
            var iddeger=$(this).attr('help');   
            $.ajax({ 
                type:'GET',
                url:'{{route('admin.getdata')}}',
                data:{id:iddeger},
                success:function(data){
                    console.log(data);
                    $('#idverisi').val(data.id);// hidden verisine id gomduk
                    $('#updatename').val(data.name);
                    $('#updateemail').val(data.email);
                    $('#updatepassword').val(data.password);
                    $('#editModal').modal(); // model acmaya yarar
                } 
            }); 
        });
    });
</script>
@endsection 
