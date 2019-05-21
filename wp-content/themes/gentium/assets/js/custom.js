
jQuery(document).ready(function(){
    initFixedHeader();
    initMoreServices();
    initJcf();
    initSlickSliders();
    initFormPopup();
	initServiceFormPopup();
	formValidation();
	initFormValidation();
    initAjaxForm();
    removeLoaderIfNotFound();
})

function initJcf() {
	jQuery(function() {
		jcf.replaceAll();
	});
}

function initFixedHeader() {
	var fixedItem = jQuery("#masthead"),
		win = jQuery(window);
	win.on('load resize scroll', function(e){
		var winTop = win.scrollTop();
		if(winTop && winTop > 700) {
			fixedItem.addClass("slideUp");
		}else {
			fixedItem.removeClass("slideUp");
		}
		pointRemember = winTop;
	});
}

function initMoreServices() {
	jQuery('#btn-more-services').on('click', function(e){
		e.preventDefault();
		jQuery('#main-services').toggleClass('more');
		if(jQuery('#main-services').hasClass('more')){
			jQuery(this).find('.pr-service-box-inner .title').text('ПОКАЗАТЬ МЕНЬШЕ');
		}
		else jQuery(this).find('.pr-service-box-inner .title').text('ПОКАЗАТЬ БОЛЬШЕ');
	})
}

function initSlickSliders(){
	jQuery("img[src$='https://viral.com.ua/wp-content/uploads/2019/04/barsa_logo1.png']").parents('.elementor-inner-column').remove();//hide BARSA client
	
    if(jQuery(window).width() < 768){
        jQuery('.client-slider .elementor-row').slick({
            autoplay: false,
            vertical: false,
            speed	: 1000,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
            draggable: true,
            pauseOnFocus: false,
            pauseOnHover: false,
            pauseOnClick: false,
			centerMode: true,
			variableWidth: true,
			bullets: true,
            // prevArrow: $('.slick-prev'),
            // nextArrow: $('.slick-next'),
        })
    }
	else {
		jQuery('.client-slider .elementor-row').slick({
			autoplay: false,
			vertical: false,
			speed	: 1000,
			autoplay: true,
			autoplaySpeed: 2000,
			centerMode: true,
			infinite: true,
			slidesToShow: 6,
			slidesToScroll: 1,
			dots: true,
			arrows: true,
			draggable: true,
			pauseOnFocus: false,
			pauseOnHover: false,
			pauseOnClick: false,
		})
	}
}

function initFormPopup(){
    var form = jQuery('.order-form-wrapper');
    jQuery('.btn-contact').on('click', function(e){
		e.preventDefault();
        form.addClass('display');
        setTimeout(function(){form.addClass('opacity');},10);
        jQuery('#shadow-bg').addClass('enable');
        jQuery('body').addClass('scroll-off');
        //formFilling(); 
    });

//     jQuery(document).mouseup(function (e) {
//         var container = jQuery(".order-form-wrapper");
//         if (container.has(e.target).length === 0 && e.target.className !== 'popup-form enable'){
// 			formCloser();
//         }
// 	});

	function formCloser(){
		jQuery('.order-form-wrapper').removeClass('display');
        jQuery('.order-form-wrapper').removeClass('opacity');
        jQuery('#shadow-bg').removeClass('enable');
        jQuery('body').removeClass('scroll-off');
	}

	jQuery('#shadow-bg').click(function(){
		formCloser();	
	});
	jQuery('.btn-form-close').click(function(){
		formCloser();	
	});
}

function initServiceFormPopup(){
    var form = jQuery('.order-service-form-wrapper');
    jQuery('.btn-order-service .elementor-button').on('click', function(e){
		e.preventDefault();
		jQuery('#orderService').val(jQuery('.breadcrumbs__current').text());
        form.addClass('display');
        setTimeout(function(){form.addClass('opacity');},10);
        jQuery('#shadow-bg').addClass('enable');
        jQuery('body').addClass('scroll-off');
        //formFilling(); 
    });

//     jQuery("#shadow-bg").click(function (e) {
//         var container = jQuery(".order-service-form-wrapper");
//         formCloser();
// 	});

	function formCloser(){
		jQuery('.order-service-form-wrapper').removeClass('display');
        jQuery('.order-service-form-wrapper').removeClass('opacity');
        jQuery('#shadow-bg').removeClass('enable');
        jQuery('body').removeClass('scroll-off');
	}

	jQuery('#shadow-bg').click(function(){
		formCloser();	
	});
	jQuery('.btn-form-close').click(function(){
		formCloser();	
	});
}

function formValidation() {
        var name = jQuery(this).parent().find('input[name=orderName]');
		var email = jQuery(this).parent().find('input[name=orderEmail]');
		var tel = jQuery(this).parent().find('input[name=orderPhone]');
        var comment = jQuery(this).parent().find('textarea[name=orderMessage]');
		var returnError = false;
		
        //If error found, add hightlight class to the text field
        if (name.val()=='') {
            name.addClass('error');
            returnError = true;
        } else name.removeClass('error');

		if (tel.val()=='') {
            tel.addClass('error');
            returnError = true;
        } else tel.removeClass('error');

        if (email.val()=='') {
            email.addClass('error');
            returnError = true;
        } else email.removeClass('error');

        if (comment.val()=='') {
            comment.addClass('error');
            returnError = true;
        } else comment.removeClass('error');

        // Highlight all error fields, then quit.
        if(returnError == true) {
            return false;	
		}
}
function initFormValidation() {
	jQuery('#submit').click(function () {initFormValidation()});
	jQuery('input[name=orderName], input[name=orderEmail], input[name=orderPhone], textarea[name=orderMessage]').change(function(){initFormValidation()});
}

function initAjaxForm(){
	e.preventDefault();
	var errors = jQuery('#order-form .error');
	if(errors.length){
		return false;
	}
	jQuery('.btn-submit-order').on('click', function(e){
		e.preventDefault();
		var errors = jQuery('#order-form .error');
        if(errors.length){
            return false;
        }
        var form_data = jQuery('#order-form').serialize();
            // $.ajax({  //mail to admins 
            //     type: "POST", 
            //     url: "mail.php",
            //     data: popup_form_data + "&moredata=" + form_data,
            //     success: function() {
            //         location = 'thankPage.html'
            //     },  
            // });
            jQuery.ajax({  //telegram to admins 
                type: "POST", 
                url: "https://viral.com.ua/telegram.php",
				data: form_data, 
				success: function() {
					// alert('Спасибо! мы свяжемся с Вами');
					jQuery('.done-massage').addClass('done');
					setTimeout(function(){jQuery('.done-massage').removeClass('done');}, 3000);	
				}, 
		    });
        return false;
	})
	jQuery('.btn-submit-order-2').on('click', function(e){
		e.preventDefault();
		var errors = jQuery('#order-form-2 .error');
        if(errors.length){
            return false;
        }
        var form_data = jQuery('#order-form-2').serialize();
            // $.ajax({  //mail to admins 
            //     type: "POST", 
            //     url: "mail.php",
            //     data: popup_form_data + "&moredata=" + form_data,
            //     success: function() {
            //         location = 'thankPage.html'
            //     },  
            // });
            jQuery.ajax({  //telegram to admins 
                type: "POST", 
                url: "https://viral.com.ua/telegram.php",
				data: form_data, 
				success: function() {
					// alert('Спасибо! мы свяжемся с Вами');
					jQuery('.done-massage').addClass('done');	
					setTimeout(function(){jQuery('.done-massage').removeClass('done');}, 3000);
				}, 
		    });
        return false;
	})
	jQuery('.btn-submit-order-service').on('click', function(e){
		e.preventDefault();
		var errors = jQuery('#order-service-form .error');
        if(errors.length){
            return false;
        }
        var form_data = jQuery('#order-service-form').serialize();
            // $.ajax({  //mail to admins 
            //     type: "POST", 
            //     url: "mail.php",
            //     data: popup_form_data + "&moredata=" + form_data,
            //     success: function() {
            //         location = 'thankPage.html'
            //     },  
            // });
            jQuery.ajax({  //telegram to admins 
                type: "POST", 
                url: "https://viral.com.ua/telegram-service.php",
				data: form_data, 
				success: function() {
					// alert('Спасибо! мы свяжемся с Вами');
					jQuery('.done-massage').addClass('done');	
					setTimeout(function(){jQuery('.done-massage').removeClass('done');}, 7000);
				}, 
		    });
		return false;
	})	
}

function initIntroVideo() {
	jQuery('#intro-video').prepend('<video autoplay="autoplay" loop muted playsinline><source src="https://viral.com.ua/wp-content/uploads/2019/04/VIRAL-MosCatalogue.net_-4.mp4" type="video/mp4"></video>');
}

function removeLoaderIfNotFound() {
	if(jQuery('.page-404-content')){
		jQuery('#loader').remove();
	}
}