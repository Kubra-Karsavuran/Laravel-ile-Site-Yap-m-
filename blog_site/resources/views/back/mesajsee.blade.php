@extends('back.layouts.master')
@section('title','Panel')
@section('content') 

<div id="wrapper">  
    <div id="content-wrapper" class="d-flex flex-column"> 

        <div class="container-fluid"> 
            <div class="card shadow mb-4"> 
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">GELEN MESAJLAR</h4> 
                    <p style="color: red;"><?php 
                    if (isset($deger1)) {
                        $bakalim=isset($deger1);
                        if ($bakalim==1) {
                            echo "Silme İşlemi oldu";
                        }else{
                            echo "Tekrar Deneyin";
                        }
                    }?></p>

                </div>  
                <div style="display: flex;margin-top: 20px;">
                    <?php $tüm=10;$bilgi=20;$destek=30;$genel=40;?>  
                    <div style="margin-left: 50px;">
                        <a  href="/admin/all/<?php echo $tüm; ?>" class="btn btn-info btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span> 
                            <span class="text">Tümü</span> 
                        </a>  
                    </div> 
                    <div style="margin-left: 50px;">
                        <a  href="/admin/all/<?php echo $bilgi; ?>" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span> 
                            <span class="text">Bilgi</span> 
                        </a>  
                    </div> 
                    <div style="margin-left: 50px;">
                        <a  href="/admin/all/<?php echo $destek; ?>" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span> 
                            <span class="text">Destek</span> 
                        </a>  
                    </div> 
                    <div style="margin-left: 50px;">
                        <a  href="/admin/all/<?php echo $genel; ?>" class="btn btn-warning btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span> 
                            <span class="text">Genel</span> 
                        </a>  
                    </div> 
                </div> 
 
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name-Surname</th>
                                    <th>Email</th> 
                                    <th>Mesaj</th> 
                                    <th>Konu</th>   
                                    <th>Yükleme Tarihi</th> 
                                    <th>Sil</th>   
                                </tr>
                            </thead> 
                            <tfoot>
                                <tr>
                                    <th>Name-Surname</th>
                                    <th>Email</th> 
                                    <th>Mesaj</th>  
                                    <th>Konu</th>   
                                    <th>Yükleme Tarihi</th> 
                                    <th>Sil</th>   
                                </tr>
                            </tfoot>
                            <tbody> 
                                <?php if (isset($veri)) { 
                                 foreach ($veri as $value) {  ?>  
                                    <tr>
                                        <td><?php echo $value->name; ?></td>  

                                        <td>
                                         <a href="/admin/mesaj_yolla/<?php echo $value->name;?>/<?php echo $value->email;?>"><button type="button" class="btn m-b-15 ml-2 mr-2 btn-secondary">  Kişiye Mesaj Yolla </button></a>
                                        </td> 


                                        <td><?php echo $value->message; ?></td> 
                                        <td><?php echo $value->topic; ?></td> 
                                        <td><?php echo $value->created_at; ?></td>  
                                        <td>
                                            <a href="/admin/delete/<?php echo $value->id; ?>" class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Sil</span>
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


 