<?php



// Create login vs my account shortcode
// Consider if necessary, could call both links My Account
// Can also use this to change links.
function hct_loginout_label() {

	?>
	<?php 
	if (is_user_logged_in() ) {
		return 'My account';
	}					
	
	else {
	    return 'Login';
	}
	?>
	<?php
}
add_shortcode( 'loginout', 'hct_loginout_label' );



// Allow shortcode in menu label
function do_menu_shortcodes( $menu ){ 
        return do_shortcode( $menu ); 
} 
add_filter('wp_nav_menu', 'do_menu_shortcodes'); 