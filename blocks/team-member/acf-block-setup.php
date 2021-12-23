<?php 


	acf_register_block_type( array(
		'name'				=> 'team-member',
		'title'				=> __( 'Team member', 'hct-theme-blocks' ),
		'render_template'	=> 'blocks/block-team-member.php',
		'category'			=> 'hct-theme',
		'icon'				=> 'admin-users',
		'mode'				=> 'auto',
		'keywords'			=> array( 'team', 'member', 'hct-theme-blocks' ),
	));	


/*
 * Only load Featherlight scripts if team member block is present
 */
add_action( 'wp_enqueue_scripts', 'hct_teamblock_featherlight_script' );
function hct_teamblock_featherlight_script() {
	
	if ( has_block( 'acf/team-member' ) ) {
		wp_enqueue_script(
			'featherlight',
			get_stylesheet_directory_uri() . '/js/featherlight.min.js',
			array( 'jquery' ),
			CHILD_THEME_VERSION,
			true
		);
	}
}