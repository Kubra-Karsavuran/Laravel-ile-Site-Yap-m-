@extends('back.layouts.master')
@section('title','Panel')
@section('content') 

<div id="wrapper">  
    <div id="content-wrapper" class="d-flex flex-column">


        <div class="container-fluid">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">- SİLİNEN YAZILAR -</h4> 
                </div>

                 
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
                                <th>Kurtar</th>
                                <th>Kalıcı Sil</th> 
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
                                <th>Kurtar</th>
                                <th>Kalıcı Sil</th>   
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
                                        <a href="/admin/recover/<?php echo $value->id; ?>" class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <span class="text">Kurtar</span>
                                        </a>
                                    </td> 

                                    <td>
                                        <a href="/admin/hardrecover/<?php echo $value->id; ?>" class="btn btn-danger btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Kalıcı Sil</span>
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





