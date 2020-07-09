<?php

// Register menus
function prefix_added_menus() {

	$locations = array(
		'secondary-header' => __( 'Small menu in header, above main/primary menu', 'text_domain' ),
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'prefix_added_menus' );

// Place menu: 
wp_nav_menu( array( 'theme_location' => 'header-menu' ) );


// Register Sidebars
function prefix_custom_sidebars() {

	$args = array(
		'id'            => 'footer-sitemap',
		'class'         => 'footer-sitemap',
		'name'          => __( 'Footer Sitemap', 'text_domain' ),
		'description'   => __( 'Main footer with sitemap', 'text_domain' ),
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'prefix_custom_sidebars' );

// Place sidebar
dynamic_sidebar( $sidebar );