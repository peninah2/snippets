<?php


	wp_register_script( 'block-accordion', get_stylesheet_directory() . '/blocks/accordion/accordion.js', [ 'jquery', 'acf' ] );
	
	register_block_type( get_template_directory() . '/blocks/spacer/block.json' );