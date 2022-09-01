<?php 

	
	
	acf_register_block_type( array(
		'name'				=> 'rotating-testimonials',
		'title'				=> __( 'Testimonials', 'hct-theme-blocks' ),
		'render_template'	=> 'blocks/block-rotating-testimonials.php',
		'category'			=> 'formatting',
		'icon'				=> 'format-quote',
		'mode'				=> 'auto',
		'keywords'			=> array( 'testimonials', 'rotating', 'slider', 'theme' ),
	));
	
	
	
	
/*
 * Only load Swiper scripts if slider block is present
 */
add_action( 'wp_enqueue_scripts', 'hct_slider_enqueue_script' );
function hct_slider_enqueue_script() {
	
	if ( has_block( 'acf/slider' ) ) {
		
		wp_enqueue_script(
			'swiper-js',
			'//unpkg.com/swiper@8.0.3/swiper-bundle.min.js',
			array( 'jquery' ),
			CHILD_THEME_VERSION,
			true
		); 
		
		wp_enqueue_style(
			'swiper-styles',
			'//unpkg.com/swiper@8.0.3/swiper-bundle.min.css',
			array(),
		);

	}
}



// Load Swiper configuration for testimonials
add_action( 'wp_footer', 'hct_slider_config_testimonials', 50 );
function hct_slider_config_testimonials() {
	
	if ( has_block( 'acf/rotating-testimonials' ) ) { 
	?>
	
	<script type='text/javascript'>
		jQuery(function ($) {
		$(document).ready(function(){
			
			var testimonials = new Swiper('.testimonials', {
				  
				loop: true,
				
				slidesPerView: 1,
				speed: 800,
				
				autoplay: {
				   delay: 2000,
				},
				  
				pagination: {
					el: '.swiper-pagination',
				  },
				  
			});		
			
		});
		
	});	
	

	</script>

	<?php
	}
}	
