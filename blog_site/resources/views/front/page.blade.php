@extends('front.layouts.master')

@section('title','Kategori Yazıları')

@section('content')

@include('front.widgets.sliderWidget')  
		 
		<section class="beautypress-blog-post-section section-padding">
			<div class="container">
				<div class="row">   
					<div class="col-md-12 col-xl-12 col-lg-12">
						<div class="beautypress-blog-post-group">
							<div class="beautypress-blog-post-wraper">
								<img src="img/blog-post-img.jpg" alt=""> 
								<h2><?php echo $degerler->title;  ?></h2>  
								<br>
								<br> 
                                <div class="row" > 
                                	<div class="col-6">
                                		<h5 style="color: grey;"><?php echo $degerler->content; ?> </h5>
                                	</div>
                                	<div class="col-6">
                                		<img src=" <?php echo $degerler->image; ?> ">
                                	</div> 
                                </div> 
							</div>  
						</div> 
					</div> 
				</div>
			</div>
		</section> 


@endsection
