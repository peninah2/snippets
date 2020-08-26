<?php

// Quick & easy
$term_obj_list = get_the_terms( $post->ID, 'taxonomy' );
$terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));



// from KOY, loads into function but has comma regardless so prob should not use
function function_name() {

	global $post;	
						
	$terms = wp_get_post_terms( $post->ID, 'TAX-SLUG', array( 'orderby' => 'id' ) );
	$count = count($terms); 
		 if ( $count > 0 ){ 
			foreach ( $terms as $term ) { 
				echo $term->name . ', ';
			}
		} 			 
}
