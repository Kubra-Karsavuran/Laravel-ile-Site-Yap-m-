
 
<section class="beautypress-our-features-section beautypress-padding-bottom">
    <div class="container">
        <div class="beautypress-section-headinig beautypress-watermark-title">
            <i class="xsicon icon-lotus"></i>
            <h2 data-title="Yazılarımız" class="color-black">Konu Başlıklarımız</h2>
            <p>Konu başlıklarımız ve yazılarımız çok eğlenceli ve akıcıdır.</p>
        </div>
        <div class="row">

            <?php foreach ($veri as $value) { ?> 

                <div class="col-md-4 col-xl-3 col-lg-3">
                    <div class="beautypress-single-our-feature beautypress-black-gradient-overlay">
                        <i class="xsicon icon-cosmetics"></i>
                        <img src="{{asset('front/')}}/img/features-1.jpg" alt="">
                        <div class="beautypress-our-features-content">
                            <h3 style="color: white;" > <?php echo $value->sayi(); ?></h3>
                            <h3> <?php echo $value->menu_ad; ?></h3>
                            <div class="beautypress-btn-wraper">
                                <a href="{{route('categori',$value->slug)}}" class="xs-btn round-btn box-shadow-btn bg-color-purple">Kategorinin Yazıları<span></span></a>
                            </div>
                        </div>
                    </div> 
                </div>

            <?php } ?>
 
             
        </div>
    </div>
</section> 
 
