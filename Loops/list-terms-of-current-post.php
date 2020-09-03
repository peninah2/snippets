<?php

// Gets linked list with comma separator
$terms = get_the_term_list( $post->ID, 'taxonomy-slug', '', ', ' );


// Gets just the name, with comma separator
$terms = '';

$post_taxonomy = get_the_terms( $post->ID, 'taxonomy' );
if ( ! empty( $post_locations ) && ! is_wp_error( $post_taxonomy ) ) {
    $terms = join(', ', wp_list_pluck($post_taxonomy, 'name'));
}

echo $terms;



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
