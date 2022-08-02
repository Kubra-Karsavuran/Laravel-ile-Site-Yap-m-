@extends('front.layouts.master')

@section('title','Yazının Tamamı')

@section('content')

@include('front.widgets.sliderWidget') 


<div class="beautypress-shop-single-page section-padding product">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-12 col-lg-9"> 

				<div class="woocommerce-tabs beautypress-woocommerce-tabs wc-tabs-wrapper"> 
					<div class="tab-content woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab">
						<div id="description" class="tab-pane fade in active woocommerce-Tabs-panel woocommerce-Tabs-panel--reviews panel entry-content wc-tab">
                             <div style="display: flex;"> 
                             	<h1> <?php echo $article->title; ?> </h1>
                             	<h5 style="margin-left: 100px;margin-top: 15px;">Okunma Sayısı: <?php echo $article->hit; ?>  </h5>  </div>
                            
							<br>
							<p><?php echo $article->content; ?> </p>
							 
						</div> 
					</div>
				</div> 
			</div>
 

			<div class="col-md-6 col-sm-12 col-lg-3">  
				<div   class="beautypress-single-details">
					<h3>Yazıyı Puanlayın</h3>  
				</div>  
				<div class="beautypress-add-to-chart-form">
					<h3> <?php echo $article->like; ?></h3>
					<div  class="beautypress-wishlist">
						<a href="/yazi/like/<?php echo $article->id;?>"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
					</div>
				</div>   
			</div>


		</div>
	</div>
</div>  



@endsection
