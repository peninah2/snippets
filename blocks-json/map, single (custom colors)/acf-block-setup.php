<?php 

// DIRECTIONS:
// Enable on Google Maps: Maps JavaScript API, Geocoding API and Places API.
// Directions for registering API key: https://developers.google.com/maps/documentation/javascript/get-api-key
// Get colors from Snazzymaps


wp_enqueue_script('block-gmaps', get_stylesheet_directory_uri() . '/blocks/map/gmaps.js', array( 'jquery' ), '', false);
wp_enqueue_script( 'google-api', 'https://maps.googleapis.com/maps/api/js?key=XXXXXXXXXXXXXXX', null, null, true);

register_block_type( get_stylesheet_directory() . '/blocks/map' );
	
// Register Google API key
add_filter('acf/fields/google_map/api', 'hct_acf_google_map_api');
function hct_acf_google_map_api( $api ){
    $api['key'] = 'xxx';
    return $api;
}
