<?php 
	$terms = get_terms(
		'TAXONOMY SLUG', array(
			'orderby' => 'id',
		) );
		
		foreach ( $terms as $term ) { 
			echo '<li id=".'.$term->slug.'"><a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</a></li>';
		}
			 
?>