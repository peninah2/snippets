<?php


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