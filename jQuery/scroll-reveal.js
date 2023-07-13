
Enqueue the js:
	wp_enqueue_script( 'scrollreveal', '//unpkg.com/scrollreveal/dist/scrollreveal.min.js', true );   


ON PAGE:
	Use a class for anything animated
 
HEADER: -- I don't use this anymore
// ScrollReveal - hide elements until load (with fallback) Use class "load-hidden"
// function hct_hide_scrollreveal() {
	// ?>
	// <style>
		// html.sr .load-hidden {
			// visibility: hidden;
		// }
	 // </style>
	// <?php
// }
// add_action( 'wp_head', 'hct_hide_scrollreveal' );


global.js:

(function($) {
		
		/*
		* Scroll Reveal classes/objects
		*/
		window.sr = ScrollReveal();
	
		sr.reveal('.riseUp, .wp-block-column, .wp-block-media-text__media, .wp-block-media-text__content', {
			delay: 0,
			useDelay: 'onload',
			distance: '30px',
			duration: 800,
			easing : 'ease-in-out',
			opacity: 0,
			origin: 'bottom',
			interval: 100,
			scale: 1,
			reset: false
		});		

		sr.reveal('.slowRiseUp', {
			delay: 600,
			useDelay: 'onload',
			distance: '100px',
			duration: 1800,
			easing : 'ease-in-out',
			opacity: 0,
			origin: 'bottom',
			interval: 100,
			scale: 1,
			reset: false
		});		

		sr.reveal('.fadeIn', {
				duration: 1000,
				easing : 'ease-in-out',
				opacity: 0,
				interval: 300,
				scale: 1,
				reset: false
		});
		
		sr.reveal('.slowFade', {
			delay: 1000,
			useDelay: 'onload',
			duration: 800,
			easing : 'ease-in-out',
			opacity: 0,
			interval: 0,
			scale: 1,
			reset: false
		});	
		
		
		// Scroll to top
		$(document).ready(function(){
	
			//Check to see if the window is top if not then display button
			$(window).scroll(function(){
				if ($(this).scrollTop() > 700) {
					$('#scroll-top').fadeIn();
				} else {
					$('#scroll-top').fadeOut();
				}
			});
			
			//Click event to scroll to top
			$('#scroll-top').click(function(){
				$('html, body').animate({scrollTop : 0},400);
				return false;
			});
			
		});
		
		
})(jQuery);
