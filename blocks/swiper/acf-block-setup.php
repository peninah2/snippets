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


/* 
 If doing a gallery with a featherlight popup for the images, use the following blocks of code.
 

 */
 
 
 
// Enqueue Featherlight to gallery blocks (scripts enqueued in plugin)
add_action( 'wp_enqueue_scripts', 'hct_featherlight_enqueue_script' );
function hct_featherlight_enqueue_script() {
	
	if ( has_block( 'acf/slider' ) ) {
		
		
		/* --------------- UPDATE THIS CODE -------------------- */
		/* Code taken from Parkway Lofts multisite plugin, so needs to be altered so that the urls are from the theme files instead */
		/* Featherlight (lightbox)
 * ---------------------------*/
		wp_register_script('ajh-isotope', WP_PLUGIN_URL . '/ajh-content-addons/lib/featherlight/featherlight.css', array( 'jquery' ), '', true);

		// Enables swipe functionality which is not included in Featherlight by default (must load before Featherlight)
		wp_register_script('swipe-detect', '//cdnjs.cloudflare.com/ajax/libs/detect_swipe/2.1.1/jquery.detect_swipe.min.js', array( 'jquery' ), '', true );

		// Load featherlight, which enables the lightbox
		wp_register_script( 'featherlight-js', WP_PLUGIN_URL . '/ajh-content-addons/lib/featherlight/featherlight.js', array( 'jquery' ), '', true );
			
		wp_register_style('featherlight-styles', WP_PLUGIN_URL . '/ajh-content-addons/lib/featherlight/featherlight.css', array(), );
			
		// Featherlight gallery enables turning the lightbox links into 1 gallery
		wp_register_script( 'featherlight-gallery-js', WP_PLUGIN_URL . '/ajh-content-addons/lib/featherlight/featherlight.gallery.js', array( 'jquery' ), '', true );		
		wp_register_style( 'featherlight-gallery-styles', WP_PLUGIN_URL . '/ajh-content-addons/lib/featherlight/featherlight.gallery.css', array(), );
		
		wp_enqueue_script( 'swipe-detect');
        wp_enqueue_script( 'featherlight-js');
        wp_enqueue_script( 'featherlight-gallery-js');
        wp_enqueue_style( 'featherlight-styles');		
        wp_enqueue_style( 'featherlight-gallery-styles');	

	}
}	