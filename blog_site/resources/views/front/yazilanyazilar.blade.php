@extends('front.layouts.master')

@section('title','Kategori Yazıları')

@section('content')

@include('front.widgets.sliderWidget') 
		 
		<div class="beautypress-newsfeed-section beautypress-no-bg section-padding">
			<div class="container">
				<div class="row">

                    
                 
                   
                 <?php foreach ($metin as $yazilar) {?>
                 	 
              
                      
					<div class="col-md-12 col-sm-12 col-xl-4 col-lg-4">
						<div class="beautypress-single-newsletter mb-30">
							<div class="beautypress-newsfeed-header beautypress-black-gradient-overlay">
								<img src="<?php echo $yazilar->image; ?>" alt="">
								<div class="beautypress-newsfeed-header-content">
									<div class="beautypress-newsfeed-img">
										<h5><a href=" "></a>Kategori:<?php echo $yazilar->get_name->menu_ad; ?></h5> 
									</div>
									<div class="beautypress-dates">
										  <h5><?php echo $yazilar->created_at->diffForHumans(); ?> </h5>
									</div>
								</div> 
							</div> 
							<div class="beautypress-newsfeed-footer"> 
								 <h2>  <a href="/<?php echo $yazilar->get_name->slug."/".$yazilar->title_slug;?>"> <?php echo $yazilar->title; ?></a></h2> 
								<p><?php
								$metin=$yazilar->content;
                                $deger_1=substr($metin,0,100);
                                $nokta="...";
								 echo $deger_1.$nokta; ?> </p>
							</div> 
						</div> 
					</div>
					 
			        <?php } ?>        
				  
				</div>
				 
			</div>
		</div>

@endsection
