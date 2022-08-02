@extends('front.layouts.master')

@section('title','Kategori Yazıları')

@section('content')

@include('front.widgets.sliderWidget') 

<br><br><br>


<div class="beautypress-newsfeed-section beautypress-no-bg section-padding">
	<div class="container">
		<div class="row">


			<?php foreach ($cate_yazi as $value) { ?>



				<div class="col-md-12 col-sm-12 col-xl-3 col-lg-3">
					<div class="beautypress-single-newsletter">
						<div class="beautypress-newsfeed-header beautypress-black-gradient-overlay">
							<img src="<?php echo $value->image; ?>" alt="">
							<div class="beautypress-newsfeed-header-content">
								<div class="beautypress-newsfeed-img"> 
									<a href="<?php echo "/$categori->menu_ad/".$value->title_slug; ?>"> <h3><?php echo $value->title; ?></h3> </a>
									<h5 style="margin-left: 50px;" > <?php echo $value->created_at->diffForHumans(); ?></h5>
								</div> 
							</div> 
						</div> 
						<div class="beautypress-newsfeed-footer"> 
                             <?php
                            $nokta="...";
                            $write=substr($value->content,0,100);
                            ?>
							<p><?php echo $write.$nokta; ?> </p>
						</div> 
					</div> 
				</div>


			<?php } ?>



		</div> 
	</div>
</div>





@endsection
