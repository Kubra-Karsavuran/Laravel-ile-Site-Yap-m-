/* =====================================
All JavaScript fuctions Start
======================================*/

/*--------------------------------------------------------------------------------------------
	document.ready ALL FUNCTION START
---------------------------------------------------------------------------------------------*/
 /* 

	> Top Search bar Show Hide function by = custom.js  
	> On scroll content animated function by = Viewportchecker.js 	
	> Video responsive function by = custom.js 
	> magnificPopup function	by = magnific-popup.js
	> magnificPopup for video function	by = magnific-popup.js
	> Vertically center Bootstrap modal popup function by = custom.js
	> Main menu sticky on top  when scroll down function by = custom.js
	> page scroll top on button click function by = custom.js	
	> input type file function by = custom.js	 
	> input Placeholder in IE9 function by = custom.js
	> footer fixed on bottom function by = custom.js	
	> accordion active calss function by = custom.js
    > Nav submenu show hide on mobile by = custom.js
	> Vertical Nav submenu show hide on mobile by = custom.js
	> Home Carousel_1 Full Screen with no margin function by = owl.carousel.js
	> related with content function by = owl.carousel.js
	> Fade slider for home function by = owl.carousel.js
	> home_carousel_1 Full Screen with no margin function by = owl.carousel.js
	> home_carousel_2 Full Screen with no margin function by = owl.carousel.js
	> home_projects_filter Full Screen with no margin function by = owl.carousel.js
	> Home page testimonial function by = owl.carousel.js
    > home_client_carouse function by = owl.carousel.js 
	> work carousel  function by = owl.carousel.js
    > Hover Tab  function
    > Fade slider for home function by = owl.carousel.js ========================== //
	
    > Portfolio Carousel no margin function by = owl.carousel.js ========================== //

	
 */	

/*--------------------------------------------------------------------------------------------
	window on load ALL FUNCTION START
---------------------------------------------------------------------------------------------*/
 /* 
	 > equal each box
	 > text animation function 
	 > masonry function function by = isotope.pkgd.min.js
	 > page loader function by = custom.js
 */	
 
/*--------------------------------------------------------------------------------------------
	Window Scroll ALL FUNCTION START
---------------------------------------------------------------------------------------------*/
 /*
 	 > Window on scroll header color fill 
 */

/*--------------------------------------------------------------------------------------------
	Window Resize ALL FUNCTION START
---------------------------------------------------------------------------------------------*/

(function ($) {
	
    'use strict';
/*--------------------------------------------------------------------------------------------
	document.ready ALL FUNCTION START
---------------------------------------------------------------------------------------------*/	

 
// > Video responsive function by = custom.js ========================= //	
	function video_responsive(){	
		jQuery('iframe[src*="youtube.com"]').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');
		jQuery('iframe[src*="vimeo.com"]').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');	
	}  

// > magnificPopup function	by = magnific-popup.js =========================== //
	function magnific_popup(){
        jQuery('.mfp-gallery').magnificPopup({
          delegate: '.mfp-link',
          type: 'image',
          tLoading: 'Loading image #%curr%...',
          mainClass: 'mfp-img-mobile',
          gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
          },
          image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
          }
       });
	}

// > magnificPopup for video function	by = magnific-popup.js ===================== //	
	function magnific_video(){	
		jQuery('.mfp-video').magnificPopup({
			type: 'iframe',
		});
	}

// Vertically center Bootstrap modal popup function by = custom.js ==============//
	function popup_vertical_center(){	
		jQuery(function() {
			function reposition() {
				var modal = jQuery(this),
				dialog = modal.find('.modal-dialog');
				modal.css('display', 'block');
				
				// Dividing by two centers the modal exactly, but dividing by three 
				// or four works better for larger screens.
				dialog.css("margin-top", Math.max(0, (jQuery(window).height() - dialog.height()) / 2));
			}
			// Reposition when a modal is shown
			jQuery('.modal').on('show.bs.modal', reposition);
			// Reposition when the window is resized
			jQuery(window).on('resize', function() {
				jQuery('.modal:visible').each(reposition);
			});
		});
	}

// > Main menu sticky on top  when scroll down function by = custom.js ========== //		
	function sticky_header(){
		if(jQuery('.sticky-header').length){
			var sticky = new Waypoint.Sticky({
			  element: jQuery('.sticky-header')
			})
		}
	}
	

	// > Sidebar sticky  when scroll down function by = custom.js ========== //		
	function sticky_sidebar(){		
		$('.rightSidebar')
			.theiaStickySidebar({
				additionalMarginTop: 100
			});		
	}	


// > page scroll top on button click function by = custom.js ===================== //	
	function scroll_top(){
		jQuery("button.scroltop").on('click', function() {
			jQuery("html, body").animate({
				scrollTop: 0
			}, 1000);
			return false;
		});

		jQuery(window).on("scroll", function() {
			var scroll = jQuery(window).scrollTop();
			if (scroll > 900) {
				jQuery("button.scroltop").fadeIn(1000);
			} else {
				jQuery("button.scroltop").fadeOut(1000);
			}
		});
	}
	
// > input type file function by = custom.js ========================== //	 	 
	function input_type_file_form(){
		jQuery(document).on('change', '.btn-file :file', function() {
			var input = jQuery(this),
				numFiles = input.get(0).files ? input.get(0).files.length : 1,
				label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
			input.trigger('fileselect', [numFiles, label]);
		});

		jQuery('.btn-file :file').on('fileselect', function(event, numFiles, label) {
			var input = jQuery(this).parents('.input-group').find(':text'),
				log = numFiles > 10 ? numFiles + ' files selected' : label;
			if (input.length) {
				input.val(log);
			} else {
				if (log) alert(log);
			}
		});	
	}

// > input Placeholder in IE9 function by = custom.js ======================== //	
	function placeholderSupport(){
	/* input placeholder for ie9 & ie8 & ie7 */
		jQuery.support.placeholder = ('placeholder' in document.createElement('input'));
		/* input placeholder for ie9 & ie8 & ie7 end*/
		/*fix for IE7 and IE8  */
		if (!jQuery.support.placeholder) {
			jQuery("[placeholder]").on('focus', function () {
				if (jQuery(this).val() === jQuery(this).attr("placeholder")) jQuery(this).val("");
			}).blur(function () {
				if (jQuery(this).val() === "") jQuery(this).val(jQuery(this).attr("placeholder"));
			}).blur();

			jQuery("[placeholder]").parents("form").on('submit', function () {
				jQuery(this).find('[placeholder]').each(function() {
					if (jQuery(this).val() === jQuery(this).attr("placeholder")) {
						 jQuery(this).val("");
					}
				});
			});
		}
		/*fix for IE7 and IE8 end */
	}	


// > footer fixed on bottom function by = custom.js ======================== //	
	function footer_fixed() {
	  jQuery('.site-footer').css('display', 'block');
	  jQuery('.site-footer').css('height', 'auto');
	  var footerHeight = jQuery('.site-footer').outerHeight();
	  jQuery('.footer-fixed > .page-wraper').css('padding-bottom', footerHeight);
	  jQuery('.site-footer').css('height', footerHeight);
	}
	
	
// > accordion active calss function by = custom.js ========================= //	
	function accordion_active() {
		$('.acod-head a').on('click', function() {
			$('.acod-head').removeClass('acc-actives');
			$(this).parents('.acod-head').addClass('acc-actives');
			$('.acod-title').removeClass('acc-actives'); //just to make a visual sense
			$(this).parent().addClass('acc-actives'); //just to make a visual sense
			($(this).parents('.acod-head').attr('class'));
		 });
	}	

	// > My Account Nav submenu show hide on mobile by = custom.js
	function Submenu_toogle_adminnav() {			
		jQuery(".sub-menu").parent('li').addClass('has-child');
		jQuery(".mega-menu").parent('li').addClass('has-child');
		jQuery("<div class='fa fa-angle-right open-close-admin-btn'></div>").insertAfter(".admin-nav .has-child > a");
		jQuery('.has-child a+.open-close-admin-btn').click(function(ev) {
			jQuery(this).next(jQuery('.sub-menu')).slideToggle('fast', function(){
				jQuery(this).parent().toggleClass('nav-active');
			});
			ev.stopPropagation();
		});
	}

// > Nav submenu show hide on mobile by = custom.js
	 function mobile_nav(){
		jQuery(".sub-menu").parent('li').addClass('has-child');
		jQuery(".mega-menu").parent('li').addClass('has-child');
		jQuery("<div class='fa fa-angle-right submenu-toogle'></div>").insertAfter(".has-child > a");
		jQuery('.has-child a+.submenu-toogle').on('click',function(ev) {
			jQuery(this).next(jQuery('.sub-menu')).slideToggle('fast', function(){
				jQuery(this).parent().toggleClass('nav-active');
			});
			ev.stopPropagation();
		});
	 }
	 
	// Mobile side drawer function by = custom.js
	function mobile_side_drawer(){
		jQuery('#mobile-side-drawer').on('click', function () { 
			jQuery('.mobile-sider-drawer-menu').toggleClass('active');
		});
	}		
	
// Home page Services function by = owl.carousel.js ========================== //
	function services_slider(){
	jQuery('.services-slider').owlCarousel({
		loop:true,
		autoplay:true,
		nav:true,
		dots: false,	
		margin:30,
		navText: ['<i>Prev</i>', '<i>Next</i>'],
		responsive:{
			0:{
				items:1,
			},
			640:{
				items:2,
			},			
			767:{
				items:2,
     		},				
			991:{
				items:3,
			},
			1024:{
				items:3,
			},	
			
			1200:{
				items:4,
			},					
			1366:{
				items:4,
			},			
			1400:{
				items:5
			}		
		}
	});
	}
	
// Home page Gallery Center Slider function by = owl.carousel.js ========================== //
	function gallery_center_slider(){
	jQuery('.gallery-center-slider').owlCarousel({
		loop:true,
		autoplay:false,
		center:true,
		nav:true,
		dots: false,	
		margin:0,
		navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
		responsive:{
			0:{
				items:1,
			},
			640:{
				items:2,
			},			
			767:{
				items:2,
     		},				
			991:{
				items:3,
			},
			1024:{
				items:3,
			},	
			
			1200:{
				items:4,
			},					
			1366:{
				items:4,
			},			
			1400:{
				items:4
			}		
		}
	});
	}

// Gallery slider function by = owl.carousel.js ========================== //
	function gallery_slider(){
	jQuery('.gallery-slider').owlCarousel({
		loop:true,
		autoplay:true,
		nav:true,
		dots: false,	
		margin:30,
		navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
		responsive:{
			0:{
				items:1,
			},
			640:{
				items:2,
			},			
			767:{
				items:2,
     		},				
			991:{
				items:3,
			},
			1024:{
				items:3,
			},	
			
			1200:{
				items:4,
			},					
			1366:{
				items:4,
			},			
			1400:{
				items:5
			}		
		}
	});
	}	
	
	
// Gallery slider function by = owl.carousel.js ========================== //
	function gallery_slider2(){
	jQuery('.gallery-slider2').owlCarousel({
		loop:true,
		autoplay:true,
		nav:false,
		dots: true,	
		margin:30,
		navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
		responsive:{
			0:{
				items:1,
			},
			640:{
				items:2,
			},			
			767:{
				items:2,
     		},				
			991:{
				items:3,
			},
			1024:{
				items:3,
			}
		}
	});
	}		
	
// Home page instagram function by = owl.carousel.js ========================== //
	function instagram_slider(){
	jQuery('.instagram-slider').owlCarousel({
		loop:true,
		autoplay:true,
		nav:true,
		dots: false,	
		margin:10,
		navText: ['<i>Prev</i>', '<i>Next</i>'],
		responsive:{
			0:{
				items:1,
			},
			640:{
				items:2,
			},			
			767:{
				items:2,
     		},				
			991:{
				items:3,
			},
			1024:{
				items:3,
			},	
			
			1200:{
				items:4,
			},					
			1366:{
				items:4,
			},			
			1400:{
				items:5
			}		
		}
	});
	}

//  home_client_carouse function by = owl.carousel.js ========================== //
	function home_client_carousel_2(){
	jQuery('.home-client-carousel-2').owlCarousel({
		loop:true,
		nav:false,
		dots: false,				
		margin:10,
		autoplay:true,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		responsive:{
			0:{
				items:2,
			},
			480:{
				items:3,
			},			
			767:{
				items:4,
			},
			1000:{
				items:6
			}
		}
	});
	}	
		
	// Video Carousel  function by = owl.carousel.js
	function home_video_slider(){
		jQuery('.home-video-slider').owlCarousel({
			rtl: false,
			loop:true,
			item:1,
			nav:true,
			dots: false,					
     		autoplay:false,			
			margin:0,
			navText: ['<i>Prev</i>', '<i>Next</i>'],
			responsive:{
				0:{
					items:1
				},				
				1200:{
					items:1
				}
			}
		})
	}	

	//  Counter Section function by = counterup.min.js
	function counter_section(){
		jQuery('.counter').counterUp({
			delay: 10,
			time: 3000
		});	
	}	
	
	//  MAKE AN APPOINTMENT Section function by = counterup.min.js
	function contact_slide(){
	jQuery('.contact-slide-show').on('click', function () {	
		jQuery('.contact-slide-hide').animate({'right': '0%'});
	});
	jQuery('.contact_close').on('click', function () {	
		jQuery('.contact-slide-hide').animate({'right': '-100%'});
	});		
	};			

//menu navigation 

	function menu_navigation(){
    jQuery(".menu-btn").on('click', function () {
        jQuery(".full-menu").fadeIn(500);
    });
    jQuery('.full-menu-close').on('click', function () {
        jQuery(".full-menu").fadeToggle(500);
    });
	}
		
	jQuery('.nav-tabs a').on('click', function() {
		e.preventDefault();
		jQuery(this).tab('show');
	});
	
	jQuery('.wt-accordion a').on('click', function() {
		e.preventDefault();
		jQuery(this).tab('show');
	});	
	

	
//gallery slider start=========================//
  var sync1 = $("#testimonial-2-content");
  var sync2 = $("#testimonial-2-pic");
  var slidesPerPage = 4; //globaly define number of elements per page
  var syncedSecondary = true;

	  sync1.owlCarousel({
		items : 1,
		slideSpeed : 2000,
		nav: false,
		autoplay: false,
		dots: false,
		loop: true,
		responsiveRefreshRate : 200,
		navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
	  }).on('changed.owl.carousel', syncPosition);

	  sync2
		.on('initialized.owl.carousel', function () {
		  sync2.find(".owl-item").eq(0).addClass("current");
		})
		.owlCarousel({
		items : slidesPerPage,
		dots: false,
		nav: false,
		items : 3,
		margin:0,
		smartSpeed: 200,
		slideSpeed : 500,
		slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
		responsiveRefreshRate : 100
	  }).on('changed.owl.carousel', syncPosition2);

  function syncPosition(el) {
    //if you set loop to false, you have to restore this next line
    //var current = el.item.index;
    
    //if you disable loop you have to comment this block
    var count = el.item.count-1;
    var current = Math.round(el.item.index - (el.item.count/2) - .5);
    
    if(current < 0) {
      current = count;
    }
    if(current > count) {
      current = 0;
    }
    
    //end block

    sync2
      .find(".owl-item")
      .removeClass("current")
      .eq(current)
      .addClass("current");
    var onscreen = sync2.find('.owl-item.active').length - 1;
    var start = sync2.find('.owl-item.active').first().index();
    var end = sync2.find('.owl-item.active').last().index();
    
    if (current > end) {
      sync2.data('owl.carousel').to(current, 100, true);
    }
    if (current < start) {
      sync2.data('owl.carousel').to(current - onscreen, 100, true);
    }
  }
  
  function syncPosition2(el) {
    if(syncedSecondary) {
      var number = el.item.index;
      sync1.data('owl.carousel').to(number, 100, true);
    }
  }
  
  sync2.on("click", ".owl-item", function(e){
    e.preventDefault();
    var number = $(this).index();
    sync1.data('owl.carousel').to(number, 300, true);
  });
  
 //gallery slider End=========================//


/*--------------------------------------------------------------------------------------------
	Window on load ALL FUNCTION START
---------------------------------------------------------------------------------------------*/

// > equal each box function by  = custom.js =========================== //	 
	function equalheight(container) {
		var currentTallest = 0, 
			currentRowStart = 0, 
			rowDivs = new Array(), 
			$el, topPosition = 0,
			currentDiv = 0;

		jQuery(container).each(function() {
			$el = jQuery(this);
			jQuery($el).height('auto');
			var topPostion = $el.position().top;
			if (currentRowStart != topPostion) {
				for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
					rowDivs[currentDiv].height(currentTallest);
				}
				rowDivs.length = 0; // empty the array
				currentRowStart = topPostion;
				currentTallest = $el.height();
				rowDivs.push($el);
			} else {

				rowDivs.push($el);
				currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
			}

			for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
				rowDivs[currentDiv].height(currentTallest);
			}
		});
	}


	// > masonry function function by = isotope.pkgd.min.js ========================= //	
	function masonryBox() {
        if ( jQuery().isotope ) {      
            var $container = jQuery('.masonry-wrap');
                $container.isotope({
                    itemSelector: '.masonry-item',
                    transitionDuration: '1s',
					//originLeft: true
                });

            jQuery('.masonry-filter li').on('click',function() {                           
                var selector = jQuery(this).find("a").attr('data-filter');
                jQuery('.masonry-filter li').removeClass('active');
                jQuery(this).addClass('active');
                $container.isotope({ filter: selector });
                return false;
            });
    	};
	}		
	
	
	
	

// > background image parallax function by = stellar.js ==================== //	
	function bg_image_stellar(){
		jQuery(function(){
				jQuery.stellar({
					horizontalScrolling: false,
					verticalOffset:100
				});
			});			
	}	

// > page loader function by = custom.js ========================= //		
	function page_loader() {
		$('.loading-area').fadeOut(1000)
	};

/*--------------------------------------------------------------------------------------------
    Window on scroll ALL FUNCTION START
---------------------------------------------------------------------------------------------*/

    function color_fill_header() {
        var scroll = $(window).scrollTop();
        if(scroll >= 100) {
            $(".is-fixed").addClass("color-fill");
        } else {
            $(".is-fixed").removeClass("color-fill");
        }
    };	
	
	// Bootstrap Select box function by  = bootstrap-select.min.js
	function Bootstrap_Select(){	
			jQuery('.selectpicker').selectpicker();
		}	

/*--------------------------------------------------------------------------------------------
	document.ready ALL FUNCTION START
---------------------------------------------------------------------------------------------*/
	jQuery(document).ready(function() {
		//menu navigation
		menu_navigation(),
		// > Video responsive function by = custom.js 
		video_responsive(),
		// > magnificPopup function	by = magnific-popup.js
		magnific_popup(),
		// > magnificPopup for video function	by = magnific-popup.js
		magnific_video(),
		// > Vertically center Bootstrap modal popup function by = custom.js
		popup_vertical_center();
		// > Main menu sticky on top  when scroll down function by = custom.js		
		sticky_header(),
	    // > Sidebar sticky  when scroll down function by = custom.js ========== //		
	    sticky_sidebar()		
		// > page scroll top on button click function by = custom.js	
		scroll_top(),
		// > input type file function by = custom.js	 	
		input_type_file_form(),
		// > input Placeholder in IE9 function by = custom.js		
		placeholderSupport(),
		// > footer fixed on bottom function by = custom.js	
		footer_fixed(),
		// > accordion active calss function by = custom.js ========================= //			
		accordion_active(),
	    // > My Account Nav submenu show hide on mobile by = custom.js
	    Submenu_toogle_adminnav(),				
		// > Nav submenu on off function by = custome.js ===================//
		mobile_nav(),
		// Mobile side drawer function by = custom.js
		mobile_side_drawer(),
		// Gallery slider function by = owl.carousel.js ========================== //
	    gallery_slider2(),		
		// Home page visited place function by = owl.carousel.js ========================== //
		services_slider(),
		// Home page Gallery Center Slider function by = owl.carousel.js ========================== //
		gallery_center_slider(),
		// Gallery slider function by = owl.carousel.js ========================== //
		gallery_slider(),		
		// Home page instagram function by = owl.carousel.js ========================== //
		instagram_slider(),	
		//  Client logo Carousel function by = owl.carousel.js ========================== //
		home_client_carousel_2(),
		//  Counter Section function by = counterup.min.js ========================== //
		counter_section(),
		//  MAKE AN APPOINTMENT Section function by = counterup.min.js
		contact_slide(),		
		// Video Carousel  function by = owl.carousel.js
        home_video_slider()
				
	}); 	

/*--------------------------------------------------------------------------------------------
	Window Load START
---------------------------------------------------------------------------------------------*/
	jQuery(window).on('load', function () {
		// Bootstrap Select box function by  = bootstrap-select.min.js
		 Bootstrap_Select(),		
		// > equal each box function by  = custom.js			
		equalheight(".equal-wraper .equal-col"),
		// > masonry function function by = isotope.pkgd.min.js		
		masonryBox(),
		// > background image parallax function by = stellar.js	
		bg_image_stellar(),
		// > page loader function by = custom.js		
		page_loader()
});

 /*===========================
	Window Scroll ALL FUNCTION START
===========================*/

	jQuery(window).on('scroll', function () {
	// > Window on scroll header color fill 
		color_fill_header()
	});
	
/*===========================
	Window Resize ALL FUNCTION START
===========================*/

	jQuery(window).on('resize', function () {
	// > footer fixed on bottom function by = custom.js		 
	 	footer_fixed(),
	    equalheight(".equal-wraper .equal-col")	
	});

/*===========================
	Document on  Submit FUNCTION START
===========================*/

	// > Contact form function by = custom.js	
	jQuery(document).on('submit', 'form.cons-contact-form', function(e){
		e.preventDefault();
		var form = jQuery(this);
		/* sending message */
		jQuery.ajax({
			url: 'http://thewebmax.com/saloni/form-handler2.php',
			data: form.serialize() + "&action=contactform",
			type: 'POST',
			dataType: 'JSON',
			beforeSend: function() {
				jQuery('.loading-area').show();
			},

			success:function(data){
				jQuery('.loading-area').hide();
				if(data['success']){
				jQuery("<div class='alert alert-success'>"+data['message']+"</div>").insertBefore('form.cons-contact-form');
				}else{
				jQuery("<div class='alert alert-danger'>"+data['message']+"</div>").insertBefore('form.cons-contact-form');	
				}
			}
		});
		jQuery('.cons-contact-form').trigger("reset");
		return false;
	});
	
	
		

/*===========================
	Document on  Submit FUNCTION END
===========================*/	




	jQuery(document).on("scroll", onScroll);
    
    //smoothscroll
    jQuery('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        jQuery(document).off("scroll");
        
        jQuery('a').each(function () {
            jQuery(this).removeClass('active');
        })
        jQuery(this).addClass('active');
      
        var target = this.hash,
            menu = target;
        $target = jQuery(target);
        jQuery('html, body').stop().animate({
            'scrollTop': $target.offset().top+2
        }, 500, 'swing', function () {
            window.location.hash = target;
            jQuery(document).on("scroll", onScroll);
        });
    });

	function onScroll(event){}
	
	
	
})(window.jQuery);