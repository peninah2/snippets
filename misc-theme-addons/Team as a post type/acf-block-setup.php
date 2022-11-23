<?php 



register_block_type( get_stylesheet_directory() . '/blocks/team/block.json' );


wp_register_script( 'featherlight', get_stylesheet_directory_uri() . '/lib/featherlight/featherlight.min.js', [ 'jquery', 'acf' ] );
wp_register_style(  'featherlight', get_stylesheet_directory_uri() . '/lib/featherlight/featherlight.css' );