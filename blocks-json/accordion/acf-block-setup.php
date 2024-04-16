<?php


	
	register_block_type( get_stylesheet_directory() . '/blocks/accordion/block.json' );
	
	
	// Accordion
	if ( has_block( 'acf/accordion' ) ) {	
		wp_enqueue_script(  'accordion-js', get_stylesheet_directory_uri() . '/blocks/accordion/accordion.js', [ 'jquery', 'acf' ], '', true );
	}
		