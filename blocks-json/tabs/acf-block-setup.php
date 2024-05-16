<?php


register_block_type( get_stylesheet_directory() . '/blocks/tabs/block.json' );



	// Tabs 
	if ( has_block( 'acf/tabs' ) ) {	
		wp_enqueue_script(  'tabs', 	get_stylesheet_directory_uri() . '/blocks/tabs/tabs.js', [ 'jquery', 'acf' ], '', true );
	}
	