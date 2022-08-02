
@extends('back.layouts.master')
@section('title','Panel')
@section('content')  

<div class="p-5">
	<div class="text-center">
		<h1 class="h4 text-gray-900 mb-4">- YAZI TAMAMI -</h1>
	</div>
	<form class="user"> 
		<div class="form-group">
			<label>BAŞLIK:</label>
			<input type="text" class="form-control form-control-user" value="<?php echo $veri->title; ?>">
		</div>
		<div class="form-group">
			<label>METİN:</label>
			<input type="text" class="form-control form-control-user" value="<?php echo $veri->content; ?>">
		</div>

		<div class="row"> 
			<div class="form-group col-6" >
				<label>RESİM:</label> <br>
				 <img  style="width: 280px;height: 180px;" src="<?php echo $veri->image; ?>">
			</div> 
			<div class="form-group col-6"  >
				<label>KATEGORİ ADI:</label> 
				<input type="text" class="form-control form-control-user" value="<?php echo $katename->menu_ad; ?>">
			</div> 
		</div> 
		<a href="{{route('admin.anasayfaopen')}}" class="btn btn-facebook btn-user btn-block">
			<h5>Ana Sayfa</h5>
		</a>
	</form>
	<hr> 
</div> 
@endsection   
