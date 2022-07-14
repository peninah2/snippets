<?php 

// Social menu 
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
			echo '<li><a href="' . $facebook . '" target="_blank"><i class="icon-facebook"></i></a></li>';
		
		if ( !empty( $twitter ) )
			echo '<li><a href="' . $twitter . '" target="_blank"><i class="icon-twitter"></i></a></li>';
		
		if ( !empty( $instagram ) )
			echo '<li><a href="' . $instagram . '" target="_blank"><i class="icon-instagram"></i></a></li>';

		if ( !empty( $youtube ) )
			echo '<li><a href="' . $youtube . '" target="_blank"><i class="icon-youtube-play"></i></a></li>';

		if ( !empty( $vimeo ) )
			echo '<li><a href="' . $vimeo . '" target="_blank"><i class="icon-vimeo"></i></a></li>';
		
		if ( !empty( $linkedin ) )
			echo '<li><a href="' . $linkedin . '" target="_blank"><i class="icon-linkedin"></i></a></li>';	
		
		echo '</ul>';
	
	return ob_get_clean();
}


