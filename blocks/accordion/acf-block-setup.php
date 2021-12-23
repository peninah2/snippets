<?php


	
	acf_register_block_type( array(
		'name'				=> 'accordion-block',
		'title'				=> __( 'Accordion', 'hct-theme-blocks' ),
		'render_template'	=> 'blocks/block-accordion.php',
		'category'			=> 'hct-theme',
		'icon'				=> 'list-view',
		'mode'				=> 'auto',
		'keywords'			=> array( 'accordion', 'faq', 'hct-theme-blocks' ),
	));
	
	
	
/*
 * Only load accordion script if accordion block is present
 */
add_action( 'wp_enqueue_scripts', 'hct_accordion_block_enqueue_script' );	
function hct_accordion_block_enqueue_script() {
	
	if ( has_block( 'acf/accordion-block' ) ) {
		wp_enqueue_script(
			'accordion-js',
			get_stylesheet_directory_uri() . '/js/accordion.js',
			array( 'jquery' ),
			CHILD_THEME_VERSION,
			true
		);
	}
}
	