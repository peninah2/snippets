<?php 

	wp_register_script(  'swiper-js', '//unpkg.com/swiper@8.0.3/swiper-bundle.min.js', array( 'jquery' ), '', true	); 		
	wp_register_style( 	 'swiper-styles', '//unpkg.com/swiper@8.0.3/swiper-bundle.min.css', array(), );
	wp_register_script(  'logo-slider', 	'/wp-content/themes/{-------THEME SLUG--------}/blocks/logo-slider/logo-slider.js', [ 'jquery', 'acf' ], '', true );