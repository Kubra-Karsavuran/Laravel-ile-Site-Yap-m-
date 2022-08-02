<!-- REVOLUTION SLIDER FUNCTION FOR HOME PAGE STYLE 1 ===== -->
var revapi318,
	tpj=jQuery;
			
tpj(document).ready(function() {
	if(tpj("#welcome").revolution === undefined){
		revslider_showDoubleJqueryError("#welcome");
	}else{
		revapi318 = tpj("#welcome").show().revolution({
			sliderType:"standard",
			sliderLayout:"fullscreen",
			dottedOverlay:"none",
			delay:5000,
			navigation: {
				keyboardNavigation:"off",
				keyboard_direction: "horizontal",
				mouseScrollNavigation:"off",
 				mouseScrollReverse:"default",
				onHoverStop:"off",
				touch:{
					touchenabled:"on",
					touchOnDesktop:"off",
					swipe_threshold: 75,
					swipe_min_touches: 1,
					swipe_direction: "horizontal",
					drag_block_vertical: false
				}
				,
				arrows: {
					style:"uranus",
					enable:false,
					hide_onmobile:false,
					hide_onleave:false,
					tmp:'',
					left: {
						h_align:"right",
						v_align:"bottom",
						h_offset:80,
						v_offset:25
					},
					right: {
						h_align:"right",
						v_align:"bottom",
						h_offset:25,
						v_offset:25
					}
				},
				bullets: {
					enable:false,
					hide_onmobile:false,
					hide_over:479,
					style:"hermes",
					hide_onleave:false,
					direction:"horizontal",
					h_align:"center",
					v_align:"bottom",
					h_offset:0,
					v_offset:20,
					space:5,
					tmp:''
				}
			},
			viewPort: {
				enable:true,
				outof:"wait",
				visible_area:"100%",
				presize:true
			},
			responsiveLevels:[1240,1024,778,480],
			visibilityLevels:[1240,1024,778,480],
			gridwidth:[1240,1024,778,480],
			gridheight:[729,768,768,720],
			lazyType:"single",
			parallax: {
				type:"scroll",
				origo:"slidercenter",
				speed:400,
				levels:[5,10,15,20,25,30,35,40,45,46,47,48,49,50,51,55],
			},
			shadow:0,
			spinner:"spinner3",
			stopLoop:"off",
			stopAfterLoops:-1,
			stopAtSlide:1,
			shuffle:"off",
			autoHeight:"off",
			fullScreenAutoWidth:"off",
			fullScreenAlignForce:"off",
			fullScreenOffsetContainer: ".site-header",
			fullScreenOffset: "",
			disableProgressBar:"on",
			hideThumbsOnMobile:"off",
			hideSliderAtLimit:0,
			hideCaptionAtLimit:0,
			hideAllCaptionAtLilmit:0,
			debugMode:false,
			fallbacks: {
				simplifyAll:"off",
				nextSlideOnWindowFocus:"off",
				disableFocusListener:false,
			}
		});
	}
	try{initSocialSharing("318")} catch(e){}
});
/*ready*/

<!-- REVOLUTION SLIDER FUNCTION FOR HOME PAGE STYLE 1 END  ===== -->