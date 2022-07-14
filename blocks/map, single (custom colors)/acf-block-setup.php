<?php 

// DIRECTIONS:
// Enable on Google Maps: Maps JavaScript API, Geocoding API and Places API.
// Directions for registering API key: https://developers.google.com/maps/documentation/javascript/get-api-key
// Get colors from Snazzymaps


	acf_register_block_type( array(
		'name'				=> 'map',
		'title'				=> __( 'Map', 'hct-theme-blocks' ),
		'render_template'	=> 'blocks/block-map.php',
		'category'			=> 'formatting',
		'icon'				=> 'location-alt',
		'mode'				=> 'edit',
		'keywords'			=> array( 'map', 'address', 'google map', 'hct-theme-blocks' ),
	));
	
// Register Google API key
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
function my_acf_google_map_api( $api ){
    $api['key'] = 'xxx';
    return $api;
}
	
// Enqueue Google Maps for map
add_action( 'wp_enqueue_scripts', 'hct_load_gmaps' );
function hct_load_gmaps() {
	
	if ( has_block( 'acf/map' ) ) { 
		
		wp_enqueue_script('gmaps', get_stylesheet_directory_uri() . '/js/gmaps.js', array( 'jquery' ), '', false);
		wp_enqueue_script( 'google-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDOeHCy2QmCDxsiCl5TkFV-ZtL8x6MO5lM', null, null, true);

	}
	
}