<?php 

// Create blocks
function hct_register_custom_blocks() {
	
	if( ! function_exists( 'acf_register_block_type' ) )
		return;
	
	acf_register_block_type( array(
		'name'				=> 'marquee',
		'title'				=> __( 'Marquee', 'hct-theme-blocks' ),
		'render_template'	=> 'blocks/block-marquee.php',
		'category'			=> 'formatting',
		'icon'				=> 'slides',
		'mode'				=> 'auto',
		'keywords'			=> array( 'carousel', 'marquee', 'slider', 'gallery', 'hct-theme-blocks' ),
	));

}
add_action('acf/init', 'hct_register_custom_blocks' );


/*
 * Only load Marquee scripts if marquee block is present
 */
add_action( 'wp_enqueue_scripts', 'hct_marquee_enqueue_script' );
function hct_marquee_enqueue_script() {
	
	if ( has_block( 'acf/marquee' ) ) {
		wp_enqueue_script(
			'marquee-js',
			'//cdn.jsdelivr.net/npm/jquery.marquee@1.6.0/jquery.marquee.min.js',
			array( 'jquery' ),
			CHILD_THEME_VERSION,
			true
		);

	}
}