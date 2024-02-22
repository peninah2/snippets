<?php 
	
	register_block_type( get_stylesheet_directory() . '/blocks/logo-carousel' );
	
	wp_register_script(  'swiper-js', '//unpkg.com/swiper@8.0.3/swiper-bundle.min.js', array( 'jquery' ), '', true	); 		
	wp_register_style( 	 'swiper-styles', '//unpkg.com/swiper@8.0.3/swiper-bundle.min.css', array(), );
	wp_register_script(  'logo-carousel', 	'/wp-content/themes/{-------THEME SLUG--------}/blocks/logo-carousel/logo-carousel.js', [ 'jquery', 'acf' ], '', true );