<?php 


// Register Team post type

function hct_team_post_type() {

	$labels = array(
		'name'                  => _x( 'Team', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Team', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Team', 'text_domain' ),
		'name_admin_bar'        => __( 'Team', 'text_domain' ),
		'archives'              => __( 'Team Archives', 'text_domain' ),
		'attributes'            => __( 'Team Member Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Team Member:', 'text_domain' ),
		'all_items'             => __( 'All', 'text_domain' ),
		'add_new_item'          => __( 'Add New Team Member', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Team Member', 'text_domain' ),
		'edit_item'             => __( 'Edit Team Member', 'text_domain' ),
		'update_item'           => __( 'Update Team Member', 'text_domain' ),
		'view_item'             => __( 'View Team Member', 'text_domain' ),
		'view_items'            => __( 'View Team', 'text_domain' ),
		'search_items'          => __( 'Search Team Member', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into team member', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Team Member', 'text_domain' ),
		'items_list'            => __( 'Team list', 'text_domain' ),
		'items_list_navigation' => __( 'Team list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter team members list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Team Member', 'text_domain' ),
		'description'           => __( 'Team members', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-businessperson',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => false,
	);
	register_post_type( 'team', $args );

}
add_action( 'init', 'hct_team_post_type', 0 );



add_filter( 'enter_title_here', 'hct_team_cpt_title' );
function hct_team_cpt_title( $input ) {
    if ( 'team' === get_post_type() ) {
        return __( 'Name', 'hct' );
    }

    return $input;
}