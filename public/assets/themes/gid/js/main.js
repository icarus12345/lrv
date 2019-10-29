(function ($) {
 "use strict";
	
    /*----------------------------
        Mobile Menu (Mean Menu)
    ------------------------------ */
	$('.main-menu').meanmenu({
        meanScreenWidth: '991',
        meanMenuContainer: '.mobile-menu',
        meanMenuClose: '<span class="menu-close"></span>',
        meanMenuOpen: '<span class="menu-bar"></span>',
        meanRevealPosition: 'right',
        meanMenuCloseSize: '0',
    });
 
    /*----------------------------
        Product Slider
    ------------------------------ */
    /*Product Slider 4 Column*/
    $(".product-slider").owlCarousel({
        autoPlay: false, 
        slideSpeed:2000,
        pagination:false,
        navigation:true,	  
        items : 4,
        navigationText:["<i class='fa fa-angle-double-left'></i>","<i class='fa fa-angle-double-right'></i>"],
        itemsDesktopSmall : [991,3],
        itemsTablet: [767,2],
        itemsMobile: [479,1]
    });
    /*Product Slider 2 Column (Deal Product)*/
    $(".product-slider-2").owlCarousel({
        autoPlay: false, 
        slideSpeed:2000,
        pagination:true,
        navigation:false,	  
        items: 2,
        itemsDesktop : [1199,2],
        itemsDesktopSmall : [991,1],
        itemsTablet: [767,1],
        itemsMobile: [479,1]
    });
    /*Product Slider 1 Column (Category Small Product)*/
    $(".product-slider-3").owlCarousel({  
        items: 1,
        autoPlay: false,
        slideSpeed:2000,
        pagination:false,
        navigation:false,
    });
    /*Product Slider 3 Column*/
    $(".product-slider-4").owlCarousel({
        autoPlay: false,
        slideSpeed:2000,
        pagination:false,
        navigation:true,
        items: 3,
        navigationText:["<i class='fa fa-angle-double-left'></i>","<i class='fa fa-angle-double-right'></i>"],
        itemsDesktop : [1199,2],
        itemsDesktopSmall : [991,1],
        itemsTablet: [767,2],
        itemsMobile: [479,1]
    });
    /*Product Slider 1 Column (Category Small Product)*/
    $(".product-slider-5").owlCarousel({  
        items: 1,
        autoPlay: false, 
        slideSpeed:2000,
        pagination:false,
        navigation:false,
        itemsDesktop : [1199,1],
        itemsDesktopSmall : [991,2],
        itemsTablet: [767,1]
    });
    /*Single Product Thumbnail Slider*/
    $(".thumb-slider").owlCarousel({  
        items: 4,
        autoPlay: false, 
        slideSpeed:2000,
        pagination:false,
        navigation:true,
        navigationText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        itemsDesktop : false,
        itemsDesktopSmall : [991,3],
        itemsTablet: [767,4],
        itemsMobile: false,
    });
    /*Single Product Thumbnail & Image Tab Function*/
    $('.thumb-slider').on('click', 'a', function(e){
        e.preventDefault();
        var $this = $(this),
            $target = $this.attr('href'),
            $image = $('.single-product-image').find($target);
        $image.addClass('active').siblings().removeClass('active');
    });
    
    /*----------------------------
        Testimonial Slider 
    ------------------------------ */  
    $(".testimonial-slider").owlCarousel({
        autoPlay: false, 
        slideSpeed:2000,
        pagination:true,
        navigation:false,	  
        singleItem : true
    });
    
    /*----------------------------
        Brand Slider 
    ------------------------------ */  
    $(".brand-slider").owlCarousel({
        autoPlay: false, 
        slideSpeed:2000,
        pagination:false,
        navigation:false,	  
        items : 6,
        itemsDesktop : [1199,6],
        itemsDesktopSmall : [991,4],
        itemsTablet: [767,3],
        itemsMobile: [479,2]
    });
    
    /*----------------------------
        Blog Slider 
    ------------------------------ */  
    $(".blog-slider").owlCarousel({
        autoPlay: false, 
        slideSpeed:2000,
        pagination:false,
        navigation:true,	  
        items : 3,
        navigationText:["<i class='fa fa-angle-double-left'></i>","<i class='fa fa-angle-double-right'></i>"],
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [991,2],
        itemsTablet: [767,1],
        itemsMobile: [479,1]
    });
 
    
    /*---------------------
        Countdown
    --------------------- */
    $('[data-countdown]').each(function() {
        var $this = $(this), finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('<span class="cdown days"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hour</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Min</p></span> <span class="cdown second"> <span><span class="time-count">%S</span> <p>Sec</p></span>'));
        });
    });	 
    
    /*---------------------
        scrollUp
    --------------------- */	
    $.scrollUp({
        scrollText: '<i class="fa fa-arrow-up"></i>',
        easingType: 'linear',
        scrollSpeed: 1000,
        animation: 'fade'
    });	
    
    /*----------------------------
        WOW js Active
    ------------------------------ */
    new WOW().init();
    
    /*----------------------------
        Price Range
    ------------------------------ */  
    $("#price-range").slider({
        range: true,
        min: 40,
        max: 600,
        values: [ 60, 570 ],
        slide: function( event, ui ) {
            $(".price-amount").text("£"+ui.values[0]+" - £"+ui.values[1]);
        }
    });
    $(".price-amount").text("£"+$("#price-range").slider("values", 0)+" - £"+$("#price-range").slider("values", 1));
 
    /*--------------------------------
        Custom Toggle Function
    ---------------------------------*/
	$('.toggle-btn').on('click', function(e) {
		e.preventDefault();
        var $this = $(this),
            $target = $this.data('target');
		$($target).slideToggle();
	});

    /* ---------------------------------
        payment-accordion
    * ---------------------------------*/ 
	$(".payment-accordion").collapse({
		accordion:true,
		open: function() {
		this.slideDown(550);
		},
		close: function() {
		this.slideUp(550);
		}		
	});
	
    /*---------------------
        Venobox
    --------------------- */
    $('.venobox').venobox(); 
    
    /*----------------------------
        Input Plus Minus Button
    ------------------------------ */ 
    $(".qtybtn").on("click", function() {
        var $btn = $(this),
            $oldValue = $btn.parent().find("input").val();
        if ($btn.text() == "+") {
            var $newVal = parseFloat($oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if ($oldValue > 1) {
                var $newVal = parseFloat($oldValue) - 1;
            } else {
                $newVal = 1;
            }
        }
        $btn.parent().find("input").val($newVal);
    });
    
    /*----------------------------
        Ajax Contact Form
    ------------------------------ */ 
    $(function() {
        // Get the form.
        var form = $('#contact-form');
        // Get the messages div.
        var formMessages = $('.form-message');
        // Set up an event listener for the contact form.
        $(form).submit(function(e) {
            // Stop the browser from submitting the form.
            e.preventDefault();
            // Serialize the form data.
            var formData = $(form).serialize();
            // Submit the form using AJAX.
            $.ajax({
                type: 'POST',
                url: $(form).attr('action'),
                data: formData
            })
            .done(function(response) {
                // Make sure that the formMessages div has the 'success' class.
                formMessages.removeClass('error');
                formMessages.addClass('success');
                // Set the message text.
                formMessages.text(response);
                // Clear the form.
                $('#contact-form input:not([type="submit"]), #contact-form textarea').val('');
            })
            .fail(function(data) {
                // Make sure that the formMessages div has the 'error' class.
                formMessages.removeClass('success');
                formMessages.addClass('error');
                // Set the message text.
                if (data.responseText !== '') {
                    formMessages.text(data.responseText);
                } else {
                    formMessages.text('Oops! An error occured and your message could not be sent.');
                }
            });
        });
    });
	
 
})(jQuery); 