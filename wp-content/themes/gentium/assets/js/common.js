function initFixedHeader() {
	var fixedItem = jQuery("#masthead"),
		win = jQuery(window);
	win.on('load resize scroll', function(e){
		var winTop = win.scrollTop();
		if(winTop && winTop > jQuery("#pr_hero").height()) {
			fixedItem.addClass("slideUp");
		}else {
			fixedItem.removeClass("slideUp");
		}
		pointRemember = winTop;
	});
}

initFixedHeader()


function initMoreServices() {
	jQuery('#btn-more-services').on('click', function(e){
		e.preventDefault();
		jQuery('#main-services').toggleClass('more');
	})
}

initMoreServices()
