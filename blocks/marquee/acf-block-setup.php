<?php 

/*
 CSS: 
 
.hct-marquee {
	overflow: hidden;
	margin: auto !important;
}



 */




// Create blocks
function hct_register_custom_blocks() {
	
	if( ! function_exists( 'acf_register_block_type' ) )
		return;
	
	acf_register_block_type( array(
		'name'				=> 'marquee',
		'title'				=> __( 'Marquee', 'hct-theme-blocks' ),
		'render_template'	=> 'blocks/block-marquee.php',
		'category'			=> 'hct-theme',
		'icon'				=> 'slides',
		'mode'				=> 'auto',
		'keywords'			=> array( 'carousel', 'marquee', 'slider', 'gallery', 'hct-theme-blocks' ),
	));

}
add_action('acf/init', 'hct_register_custom_blocks' );

/* --------------------------------------------------------------------------
 * Marquee
 * https://github.com/aamirafridi/jQuery.Marquee
 * --------------------------------------------------------------------------*/

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

// Marquee instance
add_action( 'wp_footer', 'hct_marquee_run', 50 );
function hct_marquee_run() {
	
	if ( has_block( 'acf/marquee' ) ) { 
	?>
	
		<script type='text/javascript'>
		
		jQuery(function ($) {
			$(document).ready(function(){
				$('.hct-marquee').marquee({
					
					duplicated: true,
					delayBeforeStart: 0,
					speed: 300,
					gap: 20,
					startVisible: true,
					pauseOnHover: true,
					
				});
			});	
		});	
		
		</script>
	
	<?php
	}
}