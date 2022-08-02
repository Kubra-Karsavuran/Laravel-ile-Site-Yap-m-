@extends('back.layouts.master')
@section('title','Panel')
@section('content') 

<div id="wrapper">  
	<div id="content-wrapper" class="d-flex flex-column">

		<div class="container-fluid"> 
			<div class="card shadow mb-4">

				<div class="card-header py-3">
					<h4 class="m-0 font-weight-bold text-primary">MESAJ YOLLA</h4> 
				</div> 

				<h6 style=" color: green; "><?php if (isset($bilgi)) {echo $bilgi;}?></h6>
					
					 
			<div class="card-body">
				<div class="table-responsive"> 
					<form action="{{route('admin.email_islemleri')}}" method="POST" > 
						@csrf  
						<label style="color: blue;">Gönderilecek Kişi</label><br>
						<h6> <?php  if (isset($name)) {echo $name; } ?></h6>
						<hr> 
						<label style="color: blue;">Gönderile Kişi Meali</label><br> 
						<input value="<?php  if (isset($email)) {echo $email; } ?>" name="post_mail" ><br><br> 
						<hr> 
						<label  style="color: blue;">İletilecek Mesajınız</label><br> 
						<input placeholder="İletilecek mesaj" name="ileti" ><br><br>  
						<input class="btn m-b-15 ml-2 mr-2 btn-success" type="submit" value="Gönder" id="c_submit"> 
					</form>  
				</div>
			</div> 
		</div> 
	</div>  
</div> 
</div>	
@endsection   
