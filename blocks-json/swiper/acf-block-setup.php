<?php 


	acf_register_block_type( array(
		'name'				=> 'slider',
		'title'				=> __( 'Slider', 'hct-theme-blocks' ),
		'render_template'	=> 'blocks/block-slider.php',
		'category'			=> 'formatting',
		'icon'				=> 'slides',
		'mode'				=> 'auto',
		'keywords'			=> array( 'carousel', 'slider', 'gallery', 'theme' ),
	));
	
	
	
/*
 * Only load Swiper scripts if slider block is present
 */
add_action( 'wp_enqueue_scripts', 'hct_slider_enqueue_script' );
function hct_slider_enqueue_script() {
	
	if ( has_block( 'acf/slider' ) ) {
		
		wp_enqueue_script( 'featherlight-js', get_stylesheet_directory_uri() . '/lib/featherlight/featherlight.js', true ); 
		wp_enqueue_script( 'featherlight-gallery-js', get_stylesheet_directory_uri() . '/lib/featherlight/featherlight.gallery.js', true ); 
		wp_enqueue_style( 'featherlight-css', get_stylesheet_directory_uri() . '/lib/featherlight/featherlight.css', true ); 
		wp_enqueue_style( 'featherlight-gallery-css', get_stylesheet_directory_uri() . '/lib/featherlight/featherlight.gallery.css', true ); 		
		
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

// Load Swiper configuration for slider
add_action( 'wp_footer', 'hct_slider_config', 50 );
function hct_slider_config() {
	
	if ( has_block( 'acf/slider' ) ) { 
	?>
	
		<script type='text/javascript'>
		jQuery(function ($) {
		$(document).ready(function(){
			
			var swiper = new Swiper('.slider', {
				  
				loop: true,
				
				slidesPerView: 1,
				speed: 800,
				
				initialSlide: 3,
				
				breakpoints: {
					600: {
					  slidesPerView: 2,
					  spaceBetween: 30,
					},
					
					1280: {
					  slidesPerView: 3,
					  spaceBetween: 30,
					  slidesPerGroup: 1,
					},
				},
				  
				  
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
				  },
			});		
			
		});
		
	});	
	

	</script>
	
	<?php
	}
}