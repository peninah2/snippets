<?php 



	register_block_type( get_stylesheet_directory() . '/blocks/slider' );


	// Swiper
	if ( has_block( 'acf/slider' ) ) {
		wp_enqueue_script(  'swiper-js', '//unpkg.com/swiper@8.0.3/swiper-bundle.min.js', array( 'jquery' ), '', true	); 		
		wp_enqueue_style( 	'swiper-styles', '//unpkg.com/swiper@8.0.3/swiper-bundle.min.css', array(), );
	}
	
	
	// Slider
	if ( has_block( 'acf/slider' ) ) {	
		wp_enqueue_script(  'slider', get_stylesheet_directory_uri() . '/blocks/slider/slider.js', [ 'jquery', 'acf' ], '', true );
	}