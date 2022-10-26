<?php 


/* Social menu
-----------------------------------------------*/

// Add ACF options page

/* Options page
------------------------------------------*/
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Social Menu',
		'menu_title'	=> 'Social Menu',
		'menu_slug' 	=> 'social-menu',
		'capability'	=> 'edit_posts',
		'icon_url'	 	=> 'dashicons-facebook',
		'position' 		=> 20,
		'redirect'		=> false
	));
	
}


// Create actual menu (shortcode)
add_shortcode( 'social_menu', 'hct_social_menu', 11 );
function hct_social_menu() {
	
	ob_start();
	
		$linkedin 	= get_field( 'linkedin', 'option' ); 
		$instagram 	= get_field( 'instagram', 'option' );
		$facebook 	= get_field( 'facebook', 'option' );
		$twitter 	= get_field( 'twitter', 'option' ); 
		$youtube 	= get_field( 'youtube', 'option' ); 
		$vimeo 		= get_field( 'vimeo', 'option' ); 
		
		echo '<ul class="social-media-menu">';
		
		
		if ( !empty( $facebook ) )
			echo '<li><a href="' . $facebook . '" target="_blank"><i class="icon-facebook-official" aria-label="facebook"></i></a></li>';
		
		if ( !empty( $twitter ) )
			echo '<li><a href="' . $twitter . '" target="_blank"><i class="icon-twitter-square" aria-label="twitter"></i></a></li>';
		
		if ( !empty( $instagram ) )
			echo '<li><a href="' . $instagram . '" target="_blank"><i class="icon-instagram" aria-label="instagram"></i></a></li>';

		if ( !empty( $youtube ) )
			echo '<li><a href="' . $youtube . '" target="_blank"><i class="icon-youtube-play" aria-label="youtube"></i></a></li>';

		if ( !empty( $vimeo ) )
			echo '<li><a href="' . $vimeo . '" target="_blank"><i class="icon-vimeo" aria-label="vimeo"></i></a></li>';
		
		if ( !empty( $linkedin ) )
			echo '<li><a href="' . $linkedin . '" target="_blank"><i class="icon-linkedin" aria-label="linkedin"></i></a></li>';	
		
		
		echo '</ul>';
	
	return ob_get_clean();
}
