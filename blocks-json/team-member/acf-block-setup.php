<?php 


wp_enqueue_script('featherlight', get_stylesheet_directory_uri() . '/lib/featherlight/featherlight.min.js', array( 'jquery' ), '', false);
register_block_type( get_stylesheet_directory() . '/blocks/team-member/block.json' );