<?php 
	
	register_block_type( get_stylesheet_directory() . '/blocks/logo-carousel' );

	
	
	// Swiper
	if (  has_block( 'acf/logo-carousel' )  ) {
		wp_enqueue_script(  'swiper-js', '//unpkg.com/swiper@8.0.3/swiper-bundle.min.js', array( 'jquery' ), '', true	); 		
		wp_enqueue_style( 	'swiper-styles', '//unpkg.com/swiper@8.0.3/swiper-bundle.min.css', array(), );
	}
	
	
	// Logo carousel
	if ( has_block( 'acf/logo-carousel' ) ) {	
		wp_enqueue_script(  'logo-carousel', 	get_stylesheet_directory_uri() . '/blocks/logo-carousel/logo-carousel.js', [ 'jquery', 'acf' ], '', true );
	}