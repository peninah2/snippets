register_block_type( get_stylesheet_directory() . '/blocks/tabcordion' );
	
wp_register_script(  'tabcordion', get_stylesheet_directory_uri() . '/blocks/tabcordion/tabcordion.js', [ 'jquery', 'acf' ], '', true );
wp_register_script(  'resizeObserver', get_stylesheet_directory_uri() . '/blocks/tabcordion/resizeObserver.js', [ 'jquery', 'acf' ], '', true );