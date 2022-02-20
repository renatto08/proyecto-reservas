/* =================== Load Function =================== */
$(window).load(function() {
	"use strict";
	/* ----------- Page Loader ----------- */
	$(".loader-inner").delay(300).fadeOut();
	$("#pageloader").delay(500).fadeOut("slow");						
	/* ----------- Pretty Photo ----------- */
	$("a[data-rel^='prettyPhoto']").prettyPhoto({
 		social_tools:false,
        deeplinking:false
 	});
	initPortfolioGrid();
});
/* =================== Load Function Ends =================== */


/* =================== Ready Function =================== */
	$(document).ready(function() {
		
	/* ==============================================
	Tooltips Calling
	=============================================== */	
	$(function () {
		"use strict";
		$('[data-toggle="tooltip"]').tooltip();
	});
		
	/* ----------- Scroll Navigation ----------- */
	$(function() {
		"use strict";
		$('.scroll').bind('click', function(event) {
			var $anchor = $(this);
			var headerH = $('#navigation-menu').outerHeight();
				$('html, body').stop().animate({					
					scrollTop : $($anchor.attr('href')).offset().top  - 45 + "px"
				}, 1200, 'easeInOutExpo');		
			event.preventDefault();
		});
	});
	/*  ---------------------------------------------
			Back to top Button 
	----------------------------------------------- */
	$(function() {
		"use strict";
		if( $('.elevator').length !== 0 ) {
			$.elevator({
				align_left: false,
				align_top: false,
				top: true,
				bottom: true,
				nav: false,
				margin: 100,
				classes: {
				elevator: '.elevator',
				top: '.jelevator-document-anchor-top',
				bottom: '.jelevator-document-anchor-bottom',
				section: '.jelevator-section-list',
				anchor: '.jelevator-section-anchor',
				anchor_top: '#jelevator-top',
				anchor_bottom: '#jelevator-bottom'
				},
			});
		}	
	});		
		 
	/* --------------------------------------------
	Popup Model 
	-------------------------------------------- */
	$(document).ready(function() {	

	var id = '#dialog';
		
	//Get the screen height and width 
	var maskHeight = $(document).height();
	var maskWidth = $(window).width();
		
	//Set heigth and width to mask to fill up the whole screen
	$('#mask').css({'width':maskWidth,'height':maskHeight});

	//transition effect
	$('#mask').fadeIn(500);	
	$('#mask').fadeTo("slow",0.8);	
	
	//transition effect
	//$('.window').delay(6000).fadeIn;	
		
	//Get the window height and width
	var winH = $(window).height();
	var winW = $(window).width();
				  
	//Set the popup window to center
	$(id).css('top',  winH/2-$(id).height()/2);
	$(id).css('left', winW/2-$(id).width()/2);
		
	//transition effect
	$(id).fadeIn(2000); 	
		
	//if close button is clicked
	$('.window .close').click(function (e) {
	//Cancel the link behavior
	e.preventDefault();

	$('#mask').hide();
	$('.window').hide();
	});

	//if mask is clicked
	$('#mask').click(function () {
	$(this).hide();
	$('.window').hide();
	});
		
	});
	
	/* --------------------------------------------
	Fixed Menu on Scroll
	-------------------------------------------- */
	$(function() {
		"use strict";
		$(".sticker").sticky({
			topSpacing: 0
		});
	});
	
	
	/* --------------------------------------------
	ACTIVE NAVIGATION
	-------------------------------------------- */
	$(function() {
		"use strict";
		$('body').scrollspy({ 
			target: '.one-page-nav ',
			offset: 95
		});
	});	
	
	/* -------------------------
	   RS Slider
	--------------------- */
	$(function() {
		"use strict";	
		if( $('.tp-banner').length !== 0 ) {
		  jQuery('.tp-banner').revolution(
			{
				delay:9000,
				startwidth:1170,
				startheight:700,
				hideThumbs:200,
				hideTimerBar:"on",
				navigationType:"none",
				navigationArrows:"solo",
				navigationStyle:"preview4",
				soloArrowLeftHalign: "left",
				soloArrowLeftValign: "center",
				soloArrowLeftHOffset: 20,
				soloArrowLeftVOffset: 0,
				soloArrowRightHalign: "right",
				soloArrowRightValign: "center",
				soloArrowRightHOffset: 20,
				soloArrowRightVOffset: 0
			});
		}
		
		/* -------------------------
		
		   RS Slider 3
		   
		--------------------- */
		if( $('.tp-banner3').length !== 0 ) {
		  jQuery('.tp-banner3').revolution(
			{
				delay:5000,
				startwidth:1171,
				startheight:600,
				hideThumbs:150,
				
				navigationType:"bullet",
				navigationArrows:"solo",
				navigationStyle:"round"
			});
		}
		
		if( $('.tp-banner2').length !== 0 ) {
			jQuery('.tp-banner2').show().revolution(
			{
				dottedOverlay:"none",
				delay:16000,
				startwidth:1170,
				startheight:700,
				hideThumbs:200,
				
				thumbWidth:100,
				thumbHeight:50,
				thumbAmount:5,
				
				navigationType:"bullet",
				navigationArrows:"solo",
				navigationStyle:"preview4",
				
				touchenabled:"on",
				onHoverStop:"on",
				
				swipe_velocity: 0.7,
				swipe_min_touches: 1,
				swipe_max_touches: 1,
				drag_block_vertical: false,
										
				parallax:"mouse",
				parallaxBgFreeze:"on",
				parallaxLevels:[7,4,3,2,5,4,3,2,1,0],
										
				keyboardNavigation:"off",
				
				navigationHAlign:"center",
				navigationVAlign:"bottom",
				navigationHOffset:0,
				navigationVOffset:20,

				soloArrowLeftHalign:"left",
				soloArrowLeftValign:"center",
				soloArrowLeftHOffset:20,
				soloArrowLeftVOffset:0,

				soloArrowRightHalign:"right",
				soloArrowRightValign:"center",
				soloArrowRightHOffset:20,
				soloArrowRightVOffset:0,
						
				shadow:0,
				fullWidth:"off",
				fullScreen:"on",

				spinner:"spinner4",
				
				stopLoop:"off",
				stopAfterLoops:-1,
				stopAtSlide:-1,

				shuffle:"off",
				
				autoHeight:"off",						
				forceFullWidth:"off",						
										
										
										
				hideThumbsOnMobile:"off",
				hideNavDelayOnMobile:1500,						
				hideBulletsOnMobile:"off",
				hideArrowsOnMobile:"off",
				hideThumbsUnderResolution:0,
				
				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				startWithSlide:0,
				fullScreenOffsetContainer: ".header"	
			});
		}	
		
		
		/* -------------------------
		
		   RS Slider 4
		   
		--------------------- */
		if( $('.tp-banner4').length !== 0 ) {
		  jQuery('.tp-banner4').revolution(
			{
					delay:5000,
					startwidth:1171,
					startheight:480,
					hideThumbs:150,
					fullWidth:"off",
					fullScreen:"off",
					forceFullWidth:"on",
					dottedOverlay:"none",
					hideTimerBar:"on",
					
					navigationType:"square",	
					navigationArrows:"solo",
					navigationStyle:"round-old"
			});
		}
	});
	/*-------- Charts --------*/
	appMaster.allCharts();
	
	/* ================== Click Open Toggle Menu =============== */
		/* header Contact (Phone) */
		$(document).on( 'click', '.header-contact', function( e ) {
		$( ".header-contact-content" ).show( "fast", function() {});
		
		$(document).on( 'click', '.close', function( e ) {	
		  $(".header-contact-content").hide("fast", function() {});
		})
	   });
	   
	   
	   /* header Search (Search Form) */
		$(document).on( 'click', '.header-search', function( e ) {
		$( ".header-search-content" ).show( "fast", function() {});
		
		$(document).on( 'click', '.close', function( e ) {
		  $(".header-search-content").hide("fast", function() {});
		})
	   });
	   
	   
		/* header Share (Search Form) */
		$(document).on( 'click', '.header-share', function( e ) {
		$( ".header-share-content" ).show( "fast", function() {});
		
		$(document).on( 'click', '.close', function( e ) {
		  $(".header-share-content").hide("fast", function() {});
		})
	   });
/* --------------------------------------------
	Load More 
-------------------------------------------- */
	
	var loadtext = $('.load-more');
	$(document).on( 'click', '.load-posts', function( e ) {	
		if($(this).hasClass('disable')) return false;
		
			$(this).html('<i class="fa fa-spin fa-spinner"></i> Loading');
			
			var $hidden = loadtext.filter(':hidden:first').delay(600);  
   
		   	if (!$hidden.next('.load-more').length) {
			   	$hidden.fadeIn(500);
				$(this).addClass('disable');
				$(this).fadeTo("slow", 0.23)/*.delay(600)*/
				.queue(function(n) {
				 $(this).html('All Posts Loaded <i class="icon-checkmark2"></i>');
				 n();
				}).fadeTo("slow", 1);
			
		   } else {
				$hidden.fadeIn(500);
				$(this).fadeTo("slow", 0.23)/*.delay(600)*/
				.queue(function(g) {
				 $(this).html('Load More Post <i class="icon-curved-arrow">');
				 g();
				}).fadeTo("slow", 1);
			
		   }
	});
   
	
/*------Contact form-----*/
	$(function() {
		"use strict";
		if( $("#contactform").length != 0 ) {
			$('#contactform').bootstrapValidator({
				container: 'tooltip',
				feedbackIcons: {
					valid: ' ',
					invalid: ' ',
					validating: ' '
				},
				fields: {            
					contact_name: {
						validators: {
							notEmpty: {
								message: 'Name is required. Please enter name.'
							}
						}
					},
					contact_number: {
						validators: {
							notEmpty: {
								message: 'Phone is required. Please enter phone number.'
							}
						}
					},
					contact_email: {
						validators: {
							notEmpty: {
								message: 'Email is required. Please enter email.'
							},
							emailAddress: {
								message: 'Please enter a correct email address.'
							}
						}
					},
					contact_message: {
						validators: {
							notEmpty: {
								message: 'Message is required. Please enter your message.'
							}                    
						}
					}
				}
			})
			.on('success.form.bv', function(e) {
							
				var data = $('#contactform').serialize();
				
				$.ajax({
						type: "POST",
						url: "forms/process.php",					
						data: $('#contactform').serialize(),
						success: function(msg){						
							$('.form-message').html(msg);
							$('.form-message').show();
							submitButton.removeAttr("disabled");
							resetForm($('#contactform'));						
						},
						error: function(msg){						
							$('.form-message').html(msg);
							$('.form-message').show();
							submitButton.removeAttr("disabled");
							resetForm($('#contactform'));
						}
				 });
				 
				return false;
			});
		}
	});
	
	if ( $( "#subscribe_form" ).length !== 0 ) {
		$('#subscribe_form').bootstrapValidator({
				container: 'tooltip',
				feedbackIcons: {
					valid: 'fa fa-check',
					warning: 'fa fa-user',
					invalid: 'fa fa-times',
					validating: 'fa fa-refresh'
				},
				fields: { 
					subscribe_email: {
						validators: {
							notEmpty: {
								message: 'Email is required. Please enter email.'
							},
							emailAddress: {
								message: 'Please enter a correct email address.'
							},
							regexp: {
									regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
									message: 'The value is not a valid email address'
							}
						}
					},	
				}
			})	
			.on('success.form.bv', function(e) {
				e.preventDefault();
				var $form        = $(e.target),
				validator    = $form.data('bootstrapValidator'),
				submitButton = validator.getSubmitButton();
				var form_data = $('#subscribe_form').serialize();
				$.ajax({
						type: "POST",
						dataType: 'json',
						url: "forms/subscription.php",					
						data: form_data,
						success: function(msg){						
							$('.form-message1').html(msg.data);
							$('.form-message1').show();
							submitButton.removeAttr("disabled");
							resetForm($('#subscribe_form'));						
						},
						error: function(msg){}
				 });
				return false;
			});
		}
	
	function resetForm($form) {
		$form.find('input:text, input:password, input, input:file, select, textarea').val('');
		$form.find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
		$form.find('.form-control-feedback').css('display', 'none');
	}
	

	
	/* ========== Background image height equal to the browser height.==========*/
	$(function() {
	"use strict";
		$('.wide-container').css({ 'height': $(window).height() });
			$(window).on('resize', function() {
			$('.wide-container').css({ 'height': $(window).height() });
		});
	});
	
	$(function() {
	"use strict";
		if ($(window).width() > 767) {
			$('.wide-container-768').css({ 'height': $(window).height() });
				$(window).on('resize', function() {
				$('.wide-container-768').css({ 'height': $(window).height() });
			});
		}	
	});

	/*------Counter------*/	
	if( $(".count-number").length != 0 ) {
		$(".count-number").appear(function(){
			$('.count-number').each(function(){
				datacount = $(this).attr('data-count');
				$(this).find('.counter').delay(6000).countTo({
					from: 10,
					to: datacount,
					speed: 3000,
					refreshInterval: 50,
				});
			});
		});
	}
	
	/*------Progress Bar-----*/
	var bar = $('.progress-bar');
		$(bar).appear(function() {
		bar_width = $(this).attr('aria-valuenow');
		$(this).width(bar_width + '%');
		$(this).find('span').fadeIn(20000);
	});
	
	 /* ----------- Video Bg ----------- */
	 $(function(){
		"use strict";
		if( $(".movie").length != 0 ) {
			$(".movie").mb_YTPlayer();
		}
	  });
		
	
	
	 /* -------- Background Slider -------- */
	$(function() {
		"use strict";
		if( $("#slides").length != 0 ) {
			$('#slides').superslides({
				inherit_width_from: '.wide-container',
				inherit_height_from: '.wide-container',
				interval: 5000,
				speed: 300
			});
		}	
	});
	/* ============ OWL SLIDERS =============== */
	$(function() {
		"use strict";	
		if( $(".owl-example1").length != 0 ) {
			$(".owl-example1").owlCarousel({
	 
			  navigation : true, // Show next and prev buttons
			  slideSpeed : 800,
			  paginationSpeed : 1900,
			  pagination: false,
			  singleItem:true,
			  navigation : true,
			  navigationText: ['<i class="icon-chevron-left-outline"></i>','<i class="icon-chevron-right-outline"></i>'],		
			  autoPlay: true,
			  stopOnHover: true
		 
			  // "singleItem:true" is a shortcut for:
			  // items : 1, 
			  // itemsDesktop : false,
			  // itemsDesktopSmall : false,
			  // itemsTablet: false,
			  // itemsMobile : false
		 
			});
		}	
		
		/* ============ Owl 2 =============== */
		if( $(".owl-example2").length != 0 ) {
			$(".owl-example2").owlCarousel({
	 
			  navigation : true, // Show next and prev buttons
			  slideSpeed : 300,
			  paginationSpeed : 400,
			  pagination: false,
			  navigation : false,
			  navigationText: ['<i class="icon-chevron-left-outline"></i>','<i class="icon-chevron-right-outline"></i>'],		
			  autoPlay: true,
			  items : 2,
			  itemsDesktop : [1199, 3],
		 
			  // "singleItem:true" is a shortcut for:
			  //
			  // itemsDesktop : false,
			  // itemsDesktopSmall : false,
			  // itemsTablet: false,
			  // itemsMobile : false
		 
		  });
		} 
			
	/* ============ Owl 3 =============== */
		if( $(".owl-example3").length != 0 ) {
			$(".owl-example3").owlCarousel({
				items : 3,
				lazyLoad : true,
				autoPlay: true,
				navigation : true,
				navigationText: ['<i class="icon-chevron-left-outline"></i>','<i class="icon-chevron-right-outline"></i>'],	
				pagination: false,
				itemsCustom : false,
				itemsDesktop : [1199, 3],
				itemsDesktopSmall : [980, 2],
				itemsTablet : [768, 2],
				itemsTabletSmall : [640, 1],
				itemsMobile : [479, 1]
			});
		}
	

	
	/* ============ Owl 4 =============== */
		if( $(".owl-example4").length != 0 ) {
			$(".owl-example4").owlCarousel({
				items : 4,
				lazyLoad : true,
				autoPlay: true,
				navigation : true,
				navigationText: ['<i class="icon-chevron-left-outline"></i>','<i class="icon-chevron-right-outline"></i>'],	
				pagination: false,
				itemsCustom : false,
				itemsDesktop : [1199, 3],
				itemsDesktopSmall : [980, 3],
				itemsTablet : [840, 2],
				itemsTabletSmall : [640, 2],
				itemsMobile : [600, 1]
			});
		}	
	
	
	/* ============ Owl 5 =============== */
		if( $(".owl-example5").length != 0 ) {
			$(".owl-example5").owlCarousel({
				items : 6,
				lazyLoad : true,
				autoPlay: true,
				navigation : false,
				navigationText: ['<i class="icon-chevron-left-outline"></i>','<i class="icon-chevron-right-outline"></i>'],	
				pagination: false,
				itemsCustom : false,
				itemsDesktop : [1199, 5],
				itemsDesktopSmall : [980, 4],
				itemsTablet : [767, 3],
				itemsTabletSmall : [480, 2],
				itemsMobile : [360, 2]
			});
		}	
	/* ============ OWL SLIDERS =============== */
		if( $(".owl-example6").length != 0 ) {
			$(".owl-example6").owlCarousel({
	 
			  navigation : true, // Show next and prev buttons
			  slideSpeed : 300,
			  paginationSpeed : 400,
			  singleItem:true,
			  pagination : true,
			  navigation : false,
			  navigationText: ['<i class="icon-chevron-left-outline"></i>','<i class="icon-chevron-right-outline"></i>'],		
			  autoPlay: true
		 
			  // "singleItem:true" is a shortcut for:
			  // items : 1, 
			  // itemsDesktop : false,
			  // itemsDesktopSmall : false,
			  // itemsTablet: false,
			  // itemsMobile : false
		 
		  });
		} 
		/* ============================= Variation Slider  ========================== */
	
		/* ============ Team 3 Members =============== */
		if( $(".member-3").length != 0 ) {
			$(".member-3").owlCarousel({
				items : 3,
				lazyLoad : true,
				autoPlay: true,
				navigation : false,
				navigationText: ['<i class="icon-chevron-left-outline"></i>','<i class="icon-chevron-right-outline"></i>'],	
				pagination: true,
				itemsCustom : false,
				itemsDesktop : [1199, 3],
				itemsDesktopSmall : [980, 3],
				itemsTablet : [840, 2],
				itemsTabletSmall : [640, 2],
				itemsMobile : [600, 1]
			});
		}
		
		/* ============ Pricing 2 Plan =============== */
		if( $(".pricing-plan-2").length != 0 ) {
			$(".pricing-plan-2").owlCarousel({
				items : 2,
				lazyLoad : true,
				autoPlay: true,
				navigation : true,
				navigationText: ['<i class="icon-chevron-left-outline"></i>','<i class="icon-chevron-right-outline"></i>'],	
				pagination: false,
				itemsCustom : false,
				itemsDesktop : [1199, 3],
				itemsDesktopSmall : [980, 2],
				itemsTablet : [768, 2],
				itemsTabletSmall : [640, 1],
				itemsMobile : [479, 1]
			});
		}
		
		/* ============ Pricing 4 Plan =============== */
		if( $(".pricing-plan-4").length != 0 ) {
			$(".pricing-plan-4").owlCarousel({
				items : 4,
				lazyLoad : true,
				autoPlay: true,
				navigation : false,
				navigationText: ['<i class="icon-chevron-left-outline"></i>','<i class="icon-chevron-right-outline"></i>'],	
				pagination: true,
				itemsCustom : false,
				itemsDesktop : [1199, 3],
				itemsDesktopSmall : [980, 2],
				itemsTablet : [768, 2],
				itemsTabletSmall : [640, 1],
				itemsMobile : [479, 1]
			});
		}
		
		/* ============ Pricing 4 Plan =============== */
		if( $(".testimonial2").length != 0 ) {
			$(".testimonial2").owlCarousel({
				items : 2,
				lazyLoad : true,
				autoPlay: false,
				navigation : false,
				navigationText: ['<i class="icon-chevron-left-outline"></i>','<i class="icon-chevron-right-outline"></i>'],	
				pagination: true,
				itemsCustom : false,
				itemsDesktop : [1199, 2],
				itemsDesktopSmall : [980, 2],
				itemsTablet : [768, 1],
				itemsTabletSmall : [640, 1],
				itemsMobile : [479, 1]
			});
		}
		
	
		/* ============ Company Mac Slider =============== */
		if( $(".company-slider").length != 0 ) {
			$(".company-slider").owlCarousel({
	 
			  navigation : true, // Show next and prev buttons
			  slideSpeed : 300,
			  paginationSpeed : 400,
			  pagination: false,
			  singleItem:true,
			  navigation : true,
			  navigationText: ['<i class="icon-chevron-thin-left"></i>','<i class="icon-chevron-thin-right"></i>'],		
			  autoPlay: true
		 
			  // "singleItem:true" is a shortcut for:
			  // items : 1, 
			  // itemsDesktop : false,
			  // itemsDesktopSmall : false,
			  // itemsTablet: false,
			  // itemsMobile : false
		 
			});
		}	
	});  	
		
	/* -------Text Slider -------------*/
	$(function() {
		"use strict";
		if( $(".text-scroll-slider").length != 0 ) {
			var dd = $('.text-scroll-slider').easyTicker({
				direction: 'up',
				easing: 'easeInOutExpo',
				speed: 'slow',
				interval: 3900,
				height: 'auto',
				visible: 1,
				mousePause: 0,
				controls: {
					up: '.up',
					down: '.down',
					toggle: '.toggle',
					stopText: 'Stop !!!'
				}
			}).data('easyTicker');
		}	
	
		/* -------Text Rotate -------------*/
		if( $(".text-rotate").length != 0 ) {
			var dd = $('.text-rotate').easyTicker({
				direction: 'up',
				easing: 'easeInOutExpo',
				speed: 'slow',
				interval: 3900,
				height: 'auto',
				visible: 1,
				mousePause: 0,
				controls: {
					up: '.up',
					down: '.down',
					toggle: '.toggle',
					stopText: 'Stop !!!'
				}
			}).data('easyTicker');
		}
	});	
	
	/* -----------------Typed Text Slider-------------- */
	$(function() {
		"use strict";
		if( $(".element").length != 0 ) {
			$(".element").each(function(){
				var $this = $(this);
				$this.typed({
				strings: $this.attr('data-elements').split(','),
				loop: true,
				typeSpeed: 100, // typing speed
				backDelay: 3000 // pause before backspacing
				});
			});
		}	
	});	
	  
	
	/*-------------- Magnifinder ------*/
	$(function() {
		"use strict";
		if( $(".magnify").length != 0 ) {
			$('.magnify').magnify({
				speed: 100, // fade in/out speed
				scr: " " // The URI of the large image
			});
		}	
	});	

	/* ---------------------	
		Calendar
	/* --------------------- */
	$(function() {
		"use strict";
		if( $('#calendar').length !== 0 ) {
		$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				defaultDate: '2015-02-12',
				businessHours: true, // display business hours
				editable: true,
				events: [
					{
						title: 'Business Lunch',
						start: '2015-02-03T13:00:00',
						constraint: 'businessHours'
					},
					{
						title: 'Meeting',
						start: '2015-02-13T11:00:00',
						constraint: 'availableForMeeting', // defined below
						color: '#257e4a'
					},
					{
						title: 'Conference',
						start: '2015-02-18',
						end: '2015-02-20'
					},
					{
						title: 'Party',
						start: '2015-02-29T20:00:00'
					},

					// areas where "Meeting" must be dropped
					{
						id: 'availableForMeeting',
						start: '2015-02-11T10:00:00',
						end: '2015-02-11T16:00:00',
						rendering: 'background'
					},
					{
						id: 'availableForMeeting',
						start: '2015-02-13T10:00:00',
						end: '2015-02-13T16:00:00',
						rendering: 'background'
					},

					// red areas where no events can be dropped
					{
						start: '2015-02-24',
						end: '2015-02-28',
						overlap: false,
						rendering: 'background',
						color: '#ff9f89'
					},
					{
						start: '2015-02-06',
						end: '2015-02-08',
						overlap: false,
						rendering: 'background',
						color: '#ff9f89'
					}
				]
			});
		}
	});	
	
	/* --------------------------------------------
	 Day Counter
	-------------------------------------------- */	
	$(function() {
		"use strict";
		if( $(".daycounter").length != 0 ) {
			$('.daycounter').each(function(){
				var counter_id = $(this).attr('id');
				var counter_type = $(this).data('counter');
				var year = $(this).data('year');
				var month = $(this).data('month');
				var date = $(this).data('date');
				var countDay = new Date();
				countDay = new Date(year, month - 1, date);
				if( counter_type == "down" ) {
				$("#"+counter_id).countdown({
					labels: ['Years', 'Months', 'Weeks', 'Days', 'Hours', 'Mins', 'Secs'],
					labels1: ['Year', 'Month', 'Week', 'Day', 'Hour', 'Min', 'Sec'],
					until: countDay
				});
				} else if( counter_type == "up" ) {
					$("#"+counter_id).countdown({
					 labels: ['Years', 'Months', 'Weeks', 'Days', 'Hours', 'Mins', 'Secs'],
					 labels1: ['Year', 'Month', 'Week', 'Day', 'Hour', 'Min', 'Sec'],
					 since: countDay
					});
				}
			});
		}	
	});	
	
	/* ---------------------	
		Background Image Attribute
	/* --------------------- */
	bgImage();
	function bgImage(){		
		var pageSection = $(".image-bg, .parallax-bg");
		pageSection.each(function(indx){
			if ($(this).attr("data-background")){
				$(this).css("background-image", "url(" + $(this).data("background") + ")");
			}
		});
	}
	
	// Social Feed
	locationSocialFeed();
	function locationSocialFeed() {
	  var $ = jQuery,
		  socialFeed = $('.social-feed');
	  
	  if(typeof($.fn.isotope) !== 'undefined') {
		socialFeed.isotope({
		  itemSelector: '.isotope-item',
		}).addClass('loaded');
		
		$(document).on( 'click', '#load-more', function( e ) {
		  var item1, item2, item3, items, tmp;
		  
		  items = socialFeed.find('.item-clone');
		  item1 = $(items[Math.floor(Math.random() * items.length)]).clone();
		  item2 = $(items[Math.floor(Math.random() * items.length)]).clone();
		  item3 = $(items[Math.floor(Math.random() * items.length)]).clone();
		  tmp = $().add(item1).add(item2).add(item3);
	  
		  var images = tmp.find('img');
	  
		  images.imagesLoaded(function(){
			return socialFeed.isotope('insert', tmp);
		  });
		});
	  }
	}

	/* Social Photo Streaming */
	//socialPhotostream();
	function socialPhotostream() {
		if( $(".my-feeds").length != 0 ) {
			/* ================ FLICKR FEED ================ */
			$('.flickr-feed').socialstream({
				socialnetwork: 'flickr',
				limit: 12,
				username: 'Envato'
			})
			/* ================ PINTEREST FEED ================ */
			$('.pinterest-feed').socialstream({
				socialnetwork: 'pinterest',
				limit: 12,
				username: 'vmrkela'
			})
			/* ================ INSTAGRAM FEED ================ */
			$('.instagram-feed').socialstream({
				socialnetwork: 'instagram',
				limit: 12,
				username: 'google'
			})
			/* ================ INSTAGRAM FOOTER FEED ================ */
			$('.instagram-footer-feed').socialstream({
				socialnetwork: 'instagram',
				limit: 10,
				username: 'google'
			})
			 /* ================ DRIBBBLE FEED ================ */
			$('.dribbble-feed').socialstream({
				socialnetwork: 'dribbble',
				limit: 15,
				username: 'envato'
			})
			/* ================ NEWSFEED ================ */
			$('.instagram-footer-feed').socialstream({
				socialnetwork: 'newsfeed',
				limit: 10,
				username: '#'
			}) 
			/* ================ PICASA FEED ================ */
			$('.picasa-feed').socialstream({
				socialnetwork: 'picasa',
				limit: 15,
				username: 'envato'
			});
			/* ================ YOUTUBE FEED ================ */
			$('.youtube-feed').socialstream({
				socialnetwork: 'youtube',
				limit: 15,
				username: 'Envato'
			})
		
		}
	}
	/* ---------------------	
		Animation
	/* --------------------- */
	dataAnimations();
	
	function dataAnimations () {
	  $('[data-animation]').each(function() {
			var element = $(this);
			element.addClass('animated');
			element.appear(function() {
				
				var delay = ( element.data('delay') ? element.data('delay') : 4 );
				if( delay > 4 ) element.css('animation-delay', delay + 'ms');				
				element.addClass( element.data('animation') );
				setTimeout(function() {
					element.addClass('visible');
				}, delay);
				
			});
	  });
	}

});
// Portfolio Filter Js 
function initPortfolioGrid() {
	if( $(".project-grid").length != 0 ) {
	  $('.project-grid').each(function(){  
		   var $port_container = $(this);  
				
			var filter_selector = $port_container.parent().find('.project-filters a.active').data('filter');  
			
			$port_container.isotope({			
				itemSelector: '.item',
				filter: filter_selector,
				animationEngine: "css",
				masonry: {
					columnWidth: '.grid-sizer'
				}
			});	  
	  
			// Portfolio Filter Items
			$(document).on( 'click', '.project-filters a', function( e ) {	
				$(this).parent().parent().find('a.active').removeClass('active');    
				$(this).addClass('active');
				var selector = $(this).parent().parent().find('a.active').attr('data-filter');  
				$(this).parents().find('.project-grid').isotope({ filter: selector, animationEngine : "css" });
			
				return false; 
			});
		});
	}
}
/* --------------------------------------------
Google Map
-------------------------------------------- */	
window.onload = MapLoadScript;
function GmapInit() {
	  Gmap = $('.map-canvas');
	  Gmap.each(function() {
		var $this           = $(this),
			lat             = -35.2835,
			lng             = 149.128,
			zoom            = 12,
			scrollwheel     = false,
			zoomcontrol 	= true,
			draggable       = true,
			mapType         = google.maps.MapTypeId.ROADMAP,
			title           = '',
			contentString   = '',
			dataLat         = $this.data('lat'),
			dataLng         = $this.data('lng'),
			dataZoom        = $this.data('zoom'),
			dataType        = $this.data('type'),
			dataScrollwheel = $this.data('scrollwheel'),
			dataZoomcontrol = $this.data('zoomcontrol'),
			dataHue         = $this.data('hue'),
			dataTitle       = $this.data('title'),
			dataContent     = $this.data('content');
			
		if( dataZoom !== undefined && dataZoom !== false ) {
			zoom = parseFloat(dataZoom);
		}
		if( dataLat !== undefined && dataLat !== false ) {
			lat = parseFloat(dataLat);
		}
		if( dataLng !== undefined && dataLng !== false ) {
			lng = parseFloat(dataLng);
		}
		if( dataScrollwheel !== undefined && dataScrollwheel !== null ) {
			scrollwheel = dataScrollwheel;
		}
		if( dataZoomcontrol !== undefined && dataZoomcontrol !== null ) {
			zoomcontrol = dataZoomcontrol;
		}
		if( dataType !== undefined && dataType !== false ) {
			if( dataType == 'satellite' ) {
				mapType = google.maps.MapTypeId.SATELLITE;
			} else if( dataType == 'hybrid' ) {
				mapType = google.maps.MapTypeId.HYBRID;
			} else if( dataType == 'terrain' ) {
				mapType = google.maps.MapTypeId.TERRAIN;
			}		  	
		}
		if( dataTitle !== undefined && dataTitle !== false ) {
			title = dataTitle;
		}
		if( navigator.userAgent.match(/iPad|iPhone|Android/i) ) {
			draggable = false;
		}
		
		var mapOptions = {
		  zoom        : zoom,
		  scrollwheel : scrollwheel,
		  zoomControl : zoomcontrol,
		  draggable   : draggable,
		  center      : new google.maps.LatLng(lat, lng),
		  mapTypeId   : mapType
		};		
		var map = new google.maps.Map($this[0], mapOptions);
		
		var image = 'img/map-marker.png';
		if( dataContent !== undefined && dataContent !== false ) {
			contentString = '<div class="map-data">' + '<h6>' + title + '</h6>' + '<div class="map-content">' + dataContent + '</div>' + '</div>';
		}
		var infowindow = new google.maps.InfoWindow({
			content: contentString
		});
		
		var marker = new google.maps.Marker({
		  position : new google.maps.LatLng(lat, lng),
		  map      : map,
		  icon     : image,
		  title    : title
		});
		if( dataContent !== undefined && dataContent !== false ) {
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
			});
		}
		
		if( dataHue !== undefined && dataHue !== false ) {
		  var styles = [
			{
			  stylers : [
				{ hue : dataHue },
				{ saturation: 80 },
				{ lightness: -10 }
			  ]
			}
		  ];
		  map.setOptions({styles: styles});
		}
	 });
}
	
function MapLoadScript() {
	var script = document.createElement('script');
	script.type = 'text/javascript';
	script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=GmapInit';
	document.body.appendChild(script);
}

	/* --------------------------------------------
	Charts
	-------------------------------------------- */	
var appMaster = {	
	allCharts: function() {
		
	jQuery(window).load( function(){
			var lineChartData = {
				labels : ["January","February","March","April","May","June","July"],
				datasets : [
					{
						fillColor : "rgba(220,220,220,.5)",
						strokeColor : "rgba(220,220,220,1)",
						pointColor : "rgba(220,220,220,1)",
						pointStrokeColor : "#fff",
						data : [10,20,40,70,100,90,40]
					},
					{
						fillColor : "rgba(151,187,205,0.5)",
						strokeColor : "rgba(151,187,205,1)",
						pointColor : "rgba(151,187,205,1)",
						pointStrokeColor : "#fff",
						data : [70,30,60,40,50,30,60]
					},
					{
						fillColor : "rgba(255,196,0,0.5)",
						strokeColor : "rgba(151,187,205,1)",
						pointColor : "rgba(151,187,205,1)",
						pointStrokeColor : "#fff",
						data : [10,40,100,70,30,80,50]
					}
				]
			};

			var barChartData = {
				labels : ["January","February","March","April","May","June","July"],
				datasets : [
					{
						fillColor : "rgba(255,196,0,0.5)",
						strokeColor : "rgba(220,220,220,1)",
						data : [50,70,90,60,70,40,50]
					}
				]

			};

			var radarChartData = {
				labels : ["Html5","Css3","Jquery","Wordpress","Joomla","Drupal","Design"],
				datasets : [
					{
						fillColor : "rgba(220,220,220,0.5)",
						strokeColor : "rgba(220,220,220,1)",
						pointColor : "rgba(220,220,220,1)",
						pointStrokeColor : "#fff",
						data : [65,59,90,81,56,55,40]
					},
					{
						fillColor : "rgba(255,196,0,0.5)",
						strokeColor : "rgba(255,196,0,1)",
						pointColor : "rgba(255,196,0,1)",
						pointStrokeColor : "#fff",
						data : [28,48,40,19,96,27,100]
					}
				]

			};

			var pieChartData = [
				{
					value: 20,
					color:"#949FB1"
				},
				{
					value : 40,
					color : "#46BFBD"
				},
				{
					value : 50,
					color : "#FDB45C"
				},
				{
					value : 70,
					color : "#4D5360"
				},
				{
					value : 90,
					color : "#F7464A"
				}

			];

			var polarAreaChartData = [
				{
					value : 60,
					color: "#ffc400"
				},
				{
					value : 70,
					color: "#cccccc"
				},
				{
					value : 60,
					color: "#171717"
				},
				{
					value : 30,
					color: "#229e05"
				},
				{
					value : 50,
					color: "#004eff"
				},
				{
					value : 20,
					color: "#584A5E"
				}
			];

			var doughnutChartData = [
				{
					value: 30,
					color:"#ffc400"
				},
				{
					value : 50,
					color : "#cccccc"
				},
				{
					value : 100,
					color : "#171717"
				},
				{
					value : 40,
					color : "#004eff"
				},
				{
					value : 120,
					color : "#4D5360"
				}
			];

			function showLineChart(){
				var ctx = document.getElementById("lineChartmist").getContext("2d");
				 new Chart(ctx).Line(lineChartData, {	responsive: true	});
			}

			function showBarChart(){
				var ctx = document.getElementById("barChartmist").getContext("2d");
				new Chart(ctx).Bar(barChartData, {	responsive: true	});
			}

			function showRadarChart(){
				var ctx = document.getElementById("radarChartmist").getContext("2d");
				new Chart(ctx).Radar(radarChartData, {	responsive: true	});
			}

			function showPolarAreaChart(){
				var ctx = document.getElementById("polarAreaChartmist").getContext("2d");
				new Chart(ctx).PolarArea(polarAreaChartData, {	responsive: true	});
			}

			function showPieChart(){
				var ctx = document.getElementById("pieChartmist").getContext("2d");
				new Chart(ctx).Pie(pieChartData,{	responsive: true	});
			}
			function showDoughnutChart(){
				var ctx = document.getElementById("doughnutChartmist").getContext("2d");
				new Chart(ctx).Doughnut(doughnutChartData,{	responsive: true	});
			}

			if( $("#lineChart").length != 0 ) {
				$('#lineChart').appear( function(){ $(this).css({ opacity: 1 }); setTimeout(showLineChart,300); },{accX: 0, accY: -155},'easeInCubic');
			}
			if( $("#barChart").length != 0 ) {
				$('#barChart').appear( function(){ $(this).css({ opacity: 1 }); setTimeout(showBarChart,300); },{accX: 0, accY: -155},'easeInCubic');
			}
			if( $("#radarChart").length != 0 ) {
				$('#radarChart').appear( function(){ $(this).css({ opacity: 1 }); setTimeout(showRadarChart,300); },{accX: 0, accY: -155},'easeInCubic');
			}
			if( $("#polarAreaChart").length != 0 ) {
				$('#polarAreaChart').appear( function(){ $(this).css({ opacity: 1 }); setTimeout(showPolarAreaChart,300); },{accX: 0, accY: -155},'easeInCubic');
			}
			if( $("#pieChart").length != 0 ) {
				$('#pieChart').appear( function(){ $(this).css({ opacity: 1 }); setTimeout(showPieChart,300); },{accX: 0, accY: -155},'easeInCubic');
			}
			if( $("#doughnutChart").length != 0 ) {
				$('#doughnutChart').appear( function(){ $(this).css({ opacity: 1 }); setTimeout(showDoughnutChart,300); },{accX: 0, accY: -155},'easeInCubic');
			}

		});

	},
}; 

/* --------------------------------------------
	
	Placeholder for Image
	-------------------------------------------- */	
$(window).load(function(){
		
	$('img:not(".site_logo")').each(function() {
		if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){
			var ieversion=new Number(RegExp.$1)
			if (ieversion>=9)
			if (typeof this.naturalWidth === "undefined" || this.naturalWidth === 0) {
			  this.src = "http://placehold.it/" + ($(this).attr('width') || this.width || $(this).naturalWidth()) + "x" + (this.naturalHeight || $(this).attr('height') || $(this).height());
			}
		} else {
			if (!this.complete || typeof this.naturalWidth === "undefined" || this.naturalWidth === 0) {
				this.src = "http://placehold.it/" + ($(this).attr('width') || this.width) + "x" + ($(this).attr('height') || $(this).height());
			}
		}
	});
	
	$('.image-bg').each(function() {
		var imageSrc = $(this).data('background');
		if( imageSrc !== undefined ) {
			var newSrc = imageSrc.replace(/url\((['"])?(.*?)\1\)/gi, '$2').split(',')[0];
		}

		// I just broke it up on newlines for readability        
		var image = new Image();
		image.src = newSrc;

		var width = image.width,
			height = image.height;
		
		if( width === 0 || height === 0 ) {
			$(this).attr('data-background', "http://placehold.it/" + ('1900') + "x" + ('700') + "/2e2e2e/666.jpg" );
			
			$(this).removeAttr('style');
			$(this).css("background-image", "url(" + "http://placehold.it/1900x700/2e2e2e/666.jpg" + ")");
		}
	});
});

						  