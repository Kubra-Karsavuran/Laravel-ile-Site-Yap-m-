@extends('front.layouts.master')

@section('title','Blog Sitesi')

@section('content')

<?php 
$deger=asset('front/')."/";
?>

@include('front.widgets.sliderWidget')

@include('front.widgets.yazilarWidget')

<!-- Tüm Yazılar Bulunacak -->

<section class="beautypress-newsfeed-section beautypress-padding-bottom bg-color-gray">
    <div class="container">
        <div class="beautypress-section-headinig beautypress-watermark-title">
            <i class="xsicon icon-newspaper"></i>
            <h2 data-title="Yazılarımızı İnceleyin" class="color-black">Yazılarımızı İnceleyin</h2>
            <p>Konu başlıklarımız ve yazılarımız çok eğlenceli ve akıcıdır.</p>
        </div> 
        <div class="row">

            <?php foreach ($yazilar as $value) { ?>

                <div class="col-md-12 col-sm-12 col-xl-3 col-lg-3">
                    <div class="beautypress-single-newsletter">
                        <div class="beautypress-newsfeed-header beautypress-black-gradient-overlay">
                            <img src=" <?php echo $value->image; ?>" alt="">
                            <div class="beautypress-newsfeed-header-content">
                                <div class="beautypress-newsfeed-img"> 
                                    <a href="<?php echo $value->get_name->slug."/".$value->title_slug; ?> "> <h3><?php echo $value->get_name->menu_ad; ?></h3> </a>
                                     <h5 style="margin-left: 50px;" ><?php echo $value->created_at->diffForHumans(); ?></h5>
                                </div> 
                            </div> 
                        </div> 
                        <div class="beautypress-newsfeed-footer">
                            <a href=" "> <?php echo $value->title; ?> </a>
                            <?php
                            $nokta="...";
                            $write=substr($value->content,0,100);
                            ?>
                            <p> <?php echo $write.$nokta; ?> </p>
                        </div> 
                    </div> 
                </div>

            <?php  }  ?>


        </div>
    </div>
</section> 



<!-- site ıcınde bulunmasını ıstedıgım bılgıler  -->

<section class="beautypress-simple-text-with-img-section bg-color-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xl-6 col-lg-6">
                <div class="beautypress-simple-text beautypress-watermark-icon">
                    <div class="beautypress-separetor-sub-heading">
                        <h2>Our Secrets</h2>
                    </div><!-- . END -->
                    <p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly.</p>
                    <div class="beautypress-btn-wraper">
                        <a href="#" class="xs-btn bg-color-purple round-btn box-shadow-btn">learn more <span></span></a>
                    </div>
                </div><!-- . END -->
            </div>
            <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
                <div class="beautypress-simple-img-wraper">
                    <img src="{{asset('front/')}}/img/tawel_stone.png" alt="">
                </div><!-- .beautypress-simple-img-wraper END -->
            </div>
        </div>
    </div>
</section><!-- .beautypress-simple-text-with-img-section END -->
<!-- Simple text with image end -->

<!-- Simple text with image version 2-->
<section class="beautypress-simple-text-with-img-section beautypress-simple-text-with-img-section-v2 beautypress-no-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
                <div class="beautypress-simple-img-wraper">
                    <img src="{{asset('front/')}}/img/feature_img_1.png" alt="">
                </div><!-- .beautypress-simple-img-wraper END -->
            </div>
            <div class="col-md-12 col-sm-12 col-xl-6 col-lg-6">
                <div class="beautypress-simple-text beautypress-watermark-icon">
                    <div class="beautypress-separetor-sub-heading beautypress-no-separetor">
                        <h2>Our Vission</h2>
                    </div><!-- . END -->
                    <p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly.</p>
                    <div class="beautypress-btn-wraper">
                        <a href="#" class="xs-btn bg-color-purple round-btn box-shadow-btn">learn more <span></span></a>
                    </div>
                </div><!-- . END -->
            </div>					
        </div>
    </div>
</section> 






@endsection


