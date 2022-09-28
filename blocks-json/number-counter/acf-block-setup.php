<?php

wp_enqueue_script('block-number-counter', get_stylesheet_directory_uri() . '/blocks/number-counter/number-counter.js', array( 'jquery' ), '', false);
register_block_type( get_stylesheet_directory() . '/blocks/number-counter/block.json' );
