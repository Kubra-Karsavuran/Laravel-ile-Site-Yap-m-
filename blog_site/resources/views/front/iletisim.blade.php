@extends('front.layouts.master')

@section('title','Kategori Yazıları')

@section('content')

@include('front.widgets.sliderWidget') 

<section class="beautypress-contact-us-section">
	<div class="container">
		<div class="beautypress-contact-wraper beautypress-version-2">
			<div class="row">
				<div class="col-sm-12 col-lg-8 col-xl-8">
					<div class="beautypress-contact-form">
						<h2>Bizimle İletişime Geçin </h2>

                       <div>
                       	<h4 style="color: orange;">
                       		<?php if(isset($succes)) { 
                       		echo $succes;	}	 ?> 
                       	
                       	</h4>
                       </div>


						<form action="{{route('iletisim.post')}}" method="POST">
							@csrf
							<div class="beautypress-spilit-container">
								<div class="input-group">
									<input type="text" name="name" id="c_name" placeholder="Adınız-Soyadınız">
									<div class="input-group-addon"><i class="fa fa-user"></i></div>
								</div>
								<div class="input-group">
									<input type="email" name="email" id="c_email" placeholder="Email Adresiniz">
									<div class="input-group-addon"><i class="xsicon icon-envelope5"></i></div>
								</div>
							</div>

							<select name="topic" class="input-group"  >
								<option>Bilgi</option>
								<option>Destek</option>
								<option>Genel</option>
							</select>

							<div class="input-group">
								<textarea name="message" id="c_massage" cols="30" rows="10" placeholder="Konu Hakkında"></textarea>
								<div class="input-group-addon"><i class="fa fa-pencil"></i></div>
							</div>
							<input type="submit" value="Gönder" id="c_submit">
						</form>

					</div>
				</div>
				<div class="col-sm-12 col-lg-4 col-xl-4">
					<div class="beautypress-contact-details bg-color-purple">
						<div class="beautypress-separetor-sub-heading beautypress-version-2">
							<h2>İletişim Adreslerimiz</h2>
						</div><!-- .beautypress-separetor-sub-heading END -->
						<ul class="beautypress-icon-with-text">
							<li><i class="fa fa-map-marker"></i>121 King Street, Melbourne Victoria 3000 Australia</li>
							<li><i class="xsicon icon-phone3"></i>+91 00 00 00 00</li>
							<li><i class="xsicon icon-envelope5"></i>mail@domain.com</li>
							<li><i class="fa fa-facebook"></i>facebok.com/name</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<br>
<br> 
<br>
<br>

@endsection
