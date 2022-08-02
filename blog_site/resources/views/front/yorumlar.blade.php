@extends('front.layouts.master')

@section('title','Kategori Yazıları')

@section('content')

@include('front.widgets.sliderWidget') 

<style type="text/css">

</style>

<section class="beautypress-blog-post-section section-padding">
	<div style="margin-left: 100px;margin-right: 100px;"> 
		<div class="row">

			<!--  baskasına yorum yapılacagı zaman acılacaktır   -->
			<div <?php if (!isset($cevap_id)) {echo "hidden";} ?> 
			id="deneme" class="col-md-3 col-xl-3 col-lg-3" >   
			<div class="beautypress-replay-container">
				<div class="beautypress-simple-title mb-30">
					<h3>Cevap Ver</h3>  
				</div> 
				<div class="beautypress-replay-form-wraper">  

					<form  action="{{route('yorumcev.post')}}" method="POST">
						@csrf
						<div class="  mb-30">  
							<div class="form-group">
								<input type="text" name="name"  class="form-control" placeholder="Your name">
							</div>
							<input type="text" hidden name="kimcevap" value="<?php if(isset($cevap_id)){echo $cevap_id;} ?>">

							<br>
							<div class="form-group">
								<input type="email" name="email" class="form-control" placeholder="Your email">
							</div>
							<br> 
						</div>
						<div class="form-group">
							<textarea class="form-control mb-30" name="mesaj" cols="30" placeholder="Comments" rows="10"></textarea>
						</div>

						<div class="form-group">
							<input type="submit" value="Gönder" >
						</div>  
					</form> 

				</div> 
			</div>  
		</div>


		<?php 
		if (isset($sayideger)) {
			// veri var
			if ($sayideger<=0) {
				$sonuc="veri yok";
			}
		}else{
			// veri yok
			$writecss="display: none;";
		}  
		?>



		<div class="col-md-6 col-xl-6 col-lg-6">
			<div class="beautypress-blog-post-group">  
				<div class="beautypress-replay-answer-container"> 
					<div class="beautypress-simple-title mb-30">
						<h5 style="color: purple;">
							<?php
							if (isset($oldu)) {
								echo $oldu;
							}  ?> 
						</h5>
						<h3>Toplam Yorum Sayısı <span><?php echo $yorum_number; ?></span></h3>
						<h3 style="color: red;"><?php if(isset($sonuc)){ echo $sonuc; } ?></h3>
					</div> 
					<div class="beautypress-replay-answer-wraper">

						<?php 

						foreach ($yorumlarim as $write) {  ?>

							<div class="beautypress-single-replay">
								<div class="beautypress-replayer-img">
									<img src="img/avatar-1.jpg" alt="">
								</div>
								<div class="beautypress-replay-text">
									<div class="beautypress-spilit-container">
										<div class="beautypress-replay-name">
											<h5 style="color: red;">  </h5>
											<h5><?php echo $write->ad_soyad; ?></h5>
										</div>
										<div class="beautypress-replay-time">
											<h6>{{$write->created_at->diffForHumans()}}</h6>
										</div>
									</div>
									<p><?php echo $write->yorum; ?></p>
									<ul class="beautypress-socail-react">

										<!-- like ve dıslike lar jquery ıle saglanacak -->
										<li><a href="yorumlar/like/<?php echo $write->like;?>/<?php echo $write->id;?>" class="color-purple"><i class="fa fa-thumbs-o-up"></i></a><?php echo $write->like; ?></li>

										<li><a href="yorumlar/dislike/<?php echo $write->dislike;?>/<?php echo $write->id;?>" class="color-purple"><i class="fa fa-thumbs-o-down"></i></a><?php echo $write->dislike; ?></li>

										<!-- basıldıgında form cıkacak jquery ıle saglanacak yoruma yorum yapılacak -->
										<li><a href="yorumlar/cevap/<?php echo $write->id;?>" class="color-purple">Cevapla</a></li>

										<!-- bu yoruma yorum yapıldıgında acacak eger yoksa yok yazacak -->
										<li><a href="/yorumlar/dahafazla/<?php echo $write->id;?>" class="color-purple">Daha Fazla</a></li>
									</ul>
								</div>
							</div>

						<?php  }     ?>
 


						<div  style="<?php if(isset($writecss)){echo $writecss;} ?>">
							<?php if(isset($yaziver)){  ?> 
								<?php foreach ($yaziver as  $value) {?>
									<div  class="beautypress-single-replay beautypress-replay">
										<div class="beautypress-replayer-img">
											<img src="img/avatar-2.jpg" alt="">
										</div>  
										<div class="beautypress-replay-text">
											<div class="beautypress-spilit-container">
												<div class="beautypress-replay-name"> 
													<h5><?php echo $value['ad_soyad']; ?></h5>
												</div>
												<div class="beautypress-replay-time">
													<h6><?php echo $value->created_at->diffForHumans(); ?></h6>
												</div>
											</div>
											<p><?php echo $value['yorum']; ?></p> 
											<li><a href="{{route('admin.dahaaz')}}" class="color-purple">Daha Az</a></li>
										</div>  
									</div> 
								<?php } ?> 
							<?php } ?>
						</div>

 
					</div>  
				</div>  
			</div> 
		</div> 


		<!-- yorum ekleme kısmı -->

		<div class="col-md-3 col-xl-3 col-lg-3" >   
			<div class="beautypress-replay-container">
				<div class="beautypress-simple-title mb-30">
					<h3>Yorum Yap</h3>
					<br> 
					<h5 style="color: purple;">
						<?php
						if (isset($mesaj)) {
							echo $mesaj;
						}  ?> 
					</h5>
				</div> 
				<div class="beautypress-replay-form-wraper"> 
					<form action="{{route('yorum.post')}}" method="POST">
						@csrf
						<div class="  mb-30"> 
							<div class="form-group">
								<input type="text" name="name"  class="form-control" placeholder="Your name">
							</div>

							<br>
							<div class="form-group">
								<input type="email" name="email" class="form-control" placeholder="Your email">
							</div>
							<br> 
						</div>
						<div class="form-group">
							<textarea class="form-control mb-30" name="mesaj" cols="30" placeholder="Comments" rows="10"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Gönder" name="gonder">
						</div>
					</form> 
				</div> 
			</div>  
		</div>






	</div>
</div>
</section>  

<script type="text/javascript">
	$(function(){
		console.log("deneme bakalım olacakmı");
	});
</script>

@endsection
