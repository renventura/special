(function($) {

	/**
	 * Handles the sticky header
	 */


	var	header = $("#logo_nav_wrap"),
		didScroll,
		offset = header.outerHeight() + 10;

	// Bail if sticky header is not enabled
	if ( header.data('sticky-header') !== 'enabled' ) {
		return;
	}

	// Set time interval to reduce payload
	setInterval(function() {
		if ( didScroll ) {
			hasScrolled();
			didScroll = false;
		}
	}, 250);

	// User scrolled
	$(window).scroll(function() {
		didScroll = true;
	});

	function hasScrolled() {

		// Get distance from top
		var scroller = $(this).scrollTop();

		// Outside offset
		if ( Math.abs( scroller ) > offset ) {

			header.addClass('stuck');

		} else {

			// Within the offset
			if ( header.hasClass('stuck') ) {
				header.removeClass('stuck');
			}
		}
	}



	/**
	 * Handles toggling the navigation menu
	 */


	// Get supported menus that are in use
	var menus = {
			main_nav: $('#primary_menu').clone()
		},
		offcanvas = $('#offcanvas'),
		open_menu = $('#open-offcanvas'),
		close_menu = $('#close-offcanvas');

	// Loop through each menu and add it to mobile menu
	$.each(menus,function(index, el) {
		el.removeClass();
		offcanvas.append(el);
	});


	// Open offcanvas
	open_menu.click(function() {
		offcanvas.addClass('toggled');
		offcanvas.attr('aria-expanded', 'true');
		open_menu.attr('aria-expanded', 'true');
	});

	// Close offcanvas
	close_menu.click(function() {
		offcanvas.removeClass('toggled');
		offcanvas.attr('aria-expanded', 'false');
		open_menu.attr('aria-expanded', 'false');
	});

})(jQuery);