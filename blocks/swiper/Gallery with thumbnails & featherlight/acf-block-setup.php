<?php 

	acf_register_block_type( array(
		'name'				=> 'gallery',
		'title'				=> __( 'Gallery', 'hct-theme-blocks' ),
		'render_template'	=> 'blocks/block-gallery.php',
		'category'			=> 'formatting',
		'icon'				=> 'slides',
		'mode'				=> 'auto',
		'keywords'			=> array( 'carousel', 'slider', 'gallery', 'theme' ),
	));
	
	
	
	

/*
 * Only load Featherlight & Swiper scripts with correct blocks
 */
add_action( 'wp_enqueue_scripts', 'hct_featherlight_swiper_scripts' );
function hct_featherlight_swiper_scripts() {
	
	if ( has_block( 'acf/gallery' ) ) {
		
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
	
	if ( has_block( 'acf/gallery' ) ) { 
	?>

		<script type='text/javascript'>
		jQuery(function ($) {
		$(document).ready(function(){
			
			var thumbs = new Swiper( '.thumbsSlider', {
				
				spaceBetween: 12,
				slidesPerView: 5,
				freeMode: true,
				watchSlidesProgress: true,
			});
			
			var swiper = new Swiper('.slider', {
				  
				loop: true,
				
				slidesPerView: 1,
				speed: 800,
				
				initialSlide: 0,
				  
				  
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
				  },
				  
				thumbs: {
					swiper: thumbs,
				}
			});		
			
		});
		
	});	
	

	</script>
	
	<?php
	}
}


	