<?php


https://github.com/kenwheeler/slick

function hct_enqueue_slick_slider() {

	wp_enqueue_script(
		'slick-js',
		'//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
		array( 'jquery' ),
		CHILD_THEME_VERSION,
		true
	);

	wp_enqueue_style(
		'slick-css',
		'//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',
		array(),
		CHILD_THEME_VERSION
	);

}
add_action( 'wp_enqueue_scripts', 'hct_enqueue_slick_slider' );

// Now add specific for this slider 
function hct_slick_slider() {
	?>
	
		<script type='text/javascript'>
		jQuery(function ($) {
		$(document).ready(function(){
			
			$("#client-logo-gallery").slick({

				autoplay	: true,
				autoplaySpeed: 200,
				speed		: 10000,
				slidesToShow: 5,
				infinite: true,
				useCSS : true,
				cssEase: 'linear',
				arrows 		: false,
				dots 		: false,
				mobileFirst	: true,
				responsive	: [{

				  breakpoint: 600,
				  settings : {
					slidesToShow: 1,
				  },

				  breakpoint: 960,
				  settings : {
					slidesToShow: 3,
				  }
				}],
				
				
				
			  });
			
			
			
			  
			$("#testimonials-slider").slick({
				speed		: 3000,
				slidesToShow: 2,
				autoplay 	: true,
				//autoplaySpeed : 7000,
				arrows		: false,
				dots		: true,
				appendDots	: '#testimonials-nav',
				responsive	: [{

				  breakpoint: 700,
				  settings: {
					slidesToShow: 1,
				  }

				}],
			  }); 
	
			
		});	
	});	
	</script>
	
	<?php
}
add_action( 'wp_footer', 'hct_slick_slider', 50 );