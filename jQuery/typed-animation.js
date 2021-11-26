

/* Add above ScrollReveal: */
// Misc
(function($) {

	$('.typed').html(function (i, html) {
		var chars = $.trim(html).split("");
		return '<span>' + chars.join('</span><span>') + '</span>';
	});
		
})(jQuery);	

/* Add to Scroll Reveal: 
 * can use any class, so it could be a block class name */

sr.reveal('.typed span', {
				delay: 500,
				duration: 100,
				easing : 'ease-in',
				opacity: 0,
				interval: 100,
				scale: 1,
				reset: false
		},200);
