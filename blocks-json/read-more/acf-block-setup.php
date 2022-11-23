<?php 

register_block_type( get_stylesheet_directory() . '/blocks/read-more/block.json' );

wp_register_script(  'read-more', 	'/wp-content/themes/{-----THEME SLUG----}/blocks/read-more/readmore.js', [ 'jquery', 'acf' ], '', true );
	