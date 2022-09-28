<?php 


wp_enqueue_script('block-read-more', get_stylesheet_directory_uri() . '/blocks/read-more/read-more.js', array( 'jquery' ), '', false);
register_block_type( get_stylesheet_directory() . '/blocks/read-more/block.json' );
	