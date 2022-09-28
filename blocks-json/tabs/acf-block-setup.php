<?php


wp_enqueue_script('block-tabs', get_stylesheet_directory_uri() . '/blocks/tabs/tabs.js', array( 'jquery' ), '', false);
register_block_type( get_stylesheet_directory() . '/blocks/tabs/block.json' );