/* Custome Js */
jQuery(document).ready(function() {
    "use strict";
	
	/* Page Scroll */
	jQuery('body').append('<a href="javascript:void(0);" id="toTop"></a>');
		
	/* Mobile Menu Click Effect Canvas */
    jQuery('.dl-trigger').on('click', function(event) {
        event.preventDefault();
        jQuery('body').toggleClass('offcanvas');
    });
	
    jQuery('.close_offcanvas, .offcanvas_overlay').on('click', function(event) {
        event.preventDefault();
        jQuery('body').removeClass('offcanvas');
    });
	
	jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 50) {
            jQuery('nav').addClass("sticky")			
            jQuery('.slider_txtwrap').addClass("padd_140");
			jQuery('#toTop').show();
        } else {
            jQuery('nav').removeClass("sticky");
            jQuery('.slider_txtwrap').removeClass("padd_140");
			jQuery('#toTop').hide();
        }
    });
	
	jQuery("#toTop").on('click', function(event) {
		jQuery("html, body").animate({ scrollTop: 0}, 1200, 'linear');
	});
	
	var windowSize = jQuery(window).width();

	if (windowSize <= 768) {
		jQuery(window).scroll(function() {
			if (jQuery(this).scrollTop() > 50) {
				jQuery('nav').addClass("sticky")
				jQuery('.slider_txtwrap').addClass("mt_minus_40");			
			} else {
				jQuery('nav').removeClass("sticky");
				jQuery('.slider_txtwrap').removeClass("mt_minus_40");
			}
		});
	}
	
	/* Navigation */
	jQuery('.main_menu li a, .offcanvas_menu li a, .logo a, .logo_scroll a, .header_btnwrap a, .btns a').on('click', function(event) {
		if ( jQuery(this).hasClass('h_menu') ) {
			e.preventDefault();
			var this_attr = jQuery(jQuery(this).attr('href'));
			jQuery('html,body').animate({
			'scrollTop': this_attr.offset().top+'px'
		}, 1000);
			return false;
		}
	});
	
	/* Course Slider */
	jQuery("#course_slider .slider-items").owlCarousel({
		items: 3, //10 items above 1000px browser width
		itemsDesktop: [1024, 3], //5 items between 1024px and 901px
		itemsDesktopSmall: [900, 2], // 3 items betweem 900px and 601px
		itemsTablet: [640, 1], //2 items between 600 and 0;
		itemsMobile: [480, 1],
		navigation: true,
		navigationText: ["<a class=\"flex-prev\"><i class=\"fa fa-angle-left\"></i></a>", "<a class=\"flex-next\"><i class=\"fa fa-angle-right\"></i></a>"],
		slideSpeed: 500,
		pagination: true,
		autoPlay: 6000
	});
		
	jQuery('.map iframe').css("pointer-events", "none");
	
	/* Counter */
	funfact();
	function funfact() {
        jQuery('.animate-number').appear();
        jQuery(document.body).on('appear', '.animate-number', function() {
            jQuery('.animate-number').each(function() {
                if (!jQuery(this).hasClass('appeared')) {
                    jQuery(this).animateNumbers(jQuery(this).attr("data-value"), true, parseInt(jQuery(this).attr("data-animation-duration"), 10));
                    jQuery(this).addClass('appeared');
                }
            });
        });
    }
	
	/* Team Slider */
	var owlSlider = jQuery('.o-slider-detail').owlCarousel({
        loop: false,
        margin: 0,
        nav: false,
        items: 1,
        URLhashListener: true,
        startPosition: 'URLHash',
        dots: false
    });
    jQuery(".o-lecturers-bg").on("click", ".o-lecturers-teacher", function(e) {
        /* Act on the event */
        jQuery(".o-lecturers-teacher").removeClass("active")
        jQuery(this).addClass("active");
    });    
    if (window.location.hash) {
        jQuery(".o-lecturers-teacher").removeClass("active");
        jQuery("a[href*=" + window.location.hash + "]").parent().addClass('active');
    }
		
});

/* Mobile Menu */
jQuery(function() {
	jQuery( '#dl-menu' ).dlmenu({
		animationClasses : { classin : 'dl-animate-in-3', classout : 'dl-animate-out-3' }
	});
});