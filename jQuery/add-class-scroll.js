

// Add class to header on scroll
	$(function() {
		var logo = $(".site-title");
		$(window).scroll(function() {
			var scroll = $(window).scrollTop();

			if (scroll >= 100) {
				logo.addClass("scroll");
			} else {
				logo.removeClass("scroll");
			}
		});
	});