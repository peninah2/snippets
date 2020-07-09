<?php

// Custom loop for CPT

$args = array(
	'posts_per_page'
	'orderby' 	=> 'title', // https://codex.wordpress.org/Class_Reference/WP_Query#Pagination_Parameters
	'orderby'	=> 'meta_value', Order by meta key such as ACF
	'meta_key'	=> 'start_date',
	'order'		=> 'DESC',
	'post_type' => 'post',
	'tax_query' => array(
		array(
			'taxonomy' => 'people',
			'field'    => 'slug', // term_id, 'name', 'slug' or 'term_taxonomy_id'. Default value is 'term_id'.
			'terms'    => 'bob',
			'include_children' => 'true', // true = default
			'operator' => 'NOT IN', // (string) Operator to test. Possible values are 'IN', 'NOT IN', 'AND', 'EXISTS' and 'NOT EXISTS'. Default value is 'IN'.
		),
	),
);
$the_query = new WP_Query( $args );

// Args for several custom taxonomies
$args = array(
	'post_type' => 'post',
	'tax_query' => array(
		'relation' => 'AND',
		array(
			'taxonomy' => 'movie_genre',
			'field'    => 'slug',
			'terms'    => array( 'action', 'comedy' ),
		),
		array(
			'taxonomy' => 'actor',
			'field'    => 'term_id',
			'terms'    => array( 103, 115, 206 ),
			'operator' => 'NOT IN',
		),
	),
);
$query = new WP_Query( $args );



// The Loop
if ( $the_query->have_posts() ) {
	echo '<ul>';
	while ( $the_query->have_posts() ) {
		$the_query->the_post(); ?>
		<li>
			<h5><a href="<?php get_the_permalink(); ?>"><?php get_the_title(); ?></a></h5>
			<?php the_excerpt(); ?>
		</li>
	<?php
	}
	echo '</ul>';
	/* Restore original Post Data */
	wp_reset_postdata();
} else {
	// no posts found
}




// https://codex.wordpress.org/Class_Reference/WP_Query