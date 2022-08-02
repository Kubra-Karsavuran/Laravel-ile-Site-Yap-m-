@extends('back.layouts.master')
@section('title','Panel')
@section('content') 

<div id="wrapper">  
    <div id="content-wrapper" class="d-flex flex-column">


        <div class="container-fluid">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">- İLETİŞİM BİLGİLERİ -</h4> 
                </div> 

<!-- guncelleme formu bu ona gore ıslenecektır -->

            <?php if (isset($dataup)) { ?> 
             <div> 
                <div style="border: 1px solid #d3d3d3;border-radius: 20px;" class="col-4">
                    <br>
                    <h3>- Admin Güncelleme İşlemi -</h3>   

                    <form method="POST" action="{{route('admin.ilgun')}}" class="user">
                        @csrf 
                        <div class="form-group">
                            <input type="text" name="email" class="form-control form-control-user"aria-describedby="emailHelp"placeholder="Email" value="<?php echo $dataup[0]['email_bilgisi']; ?>">
                        </div> 
                        <div class="form-group">
                            <input type="text" name="tel" class="form-control form-control-user"aria-describedby="emailHelp"placeholder="Tel" value="<?php echo $dataup[0]['tel_bilgisi']; ?>">
                        </div> 
                        <div class="form-group">
                            <input type="text" name="adres" class="form-control form-control-user"aria-describedby="emailHelp"placeholder="Adres" value="<?php echo $dataup[0]['adres_bilgisi']; ?>">
                        </div> 

                        <button type="submit" name="id" value="<?php echo $dataup[0]['id']; ?>"  class="btn btn-primary btn-user btn-block" > Kaydet  </button> 
                        <hr>  

                        <a href="{{route('admin.ilevaz')}}" class="btn btn-google btn-user btn-block">Vazgeç</a>  
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
                            <th>Email</th>  
                            <th>Tel</th>
                            <th>Adres</th>  
                            <th>Güncelle</th> 
                        </tr>
                    </thead> 
                    <tfoot>
                        <tr>
                            <th>Email</th>  
                            <th>Tel</th>
                            <th>Adres</th>  
                            <th>Güncelle</th>   
                        </tr>
                    </tfoot>
                    <tbody> 
                        <?php if (isset($veri)) {

                         foreach ($veri as $value) {?> 
                            <tr>
                                <td><?php echo $value->email_bilgisi; ?></td>
                                <td><?php echo $value->tel_bilgisi; ?></td> 
                                <td><?php echo $value->adres_bilgisi; ?></td>   
                                <td>
                                    <a href="/admin/iletupdate/<?php echo $value->id; ?>" class="btn btn-info btn-icon-split">
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
