<?php

// Adds hookable function for retrieving slug
function the_slug($echo=true) {
  	$slug = basename(get_permalink());
  		do_action('before_slug', $slug);

  	$slug = apply_filters('slug_filter', $slug);
  	if( $echo ) echo $slug;
  		do_action('after_slug', $slug);
  		return $slug;
}