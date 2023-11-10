<?php
if ( ! function_exists('post_novedades') ) {

// Register Custom Post Type
function post_novedades() {

	$labels = array(
		'name'                  => _x( 'Post Types', 'Post Type General Name', 'inmobiliariadelasierras' ),
		'singular_name'         => _x( 'Post Type', 'Post Type Singular Name', 'inmobiliariadelasierras' ),
		'menu_name'             => __( 'Post Types', 'inmobiliariadelasierras' ),
		'name_admin_bar'        => __( 'Post Type', 'inmobiliariadelasierras' ),
		'archives'              => __( 'Item Archives', 'inmobiliariadelasierras' ),
		'attributes'            => __( 'Item Attributes', 'inmobiliariadelasierras' ),
		'parent_item_colon'     => __( 'Parent Item:', 'inmobiliariadelasierras' ),
		'all_items'             => __( 'All Items', 'inmobiliariadelasierras' ),
		'add_new_item'          => __( 'Add New Item', 'inmobiliariadelasierras' ),
		'add_new'               => __( 'Add New', 'inmobiliariadelasierras' ),
		'new_item'              => __( 'New Item', 'inmobiliariadelasierras' ),
		'edit_item'             => __( 'Edit Item', 'inmobiliariadelasierras' ),
		'update_item'           => __( 'Update Item', 'inmobiliariadelasierras' ),
		'view_item'             => __( 'View Item', 'inmobiliariadelasierras' ),
		'view_items'            => __( 'View Items', 'inmobiliariadelasierras' ),
		'search_items'          => __( 'Search Item', 'inmobiliariadelasierras' ),
		'not_found'             => __( 'Not found', 'inmobiliariadelasierras' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'inmobiliariadelasierras' ),
		'featured_image'        => __( 'Featured Image', 'inmobiliariadelasierras' ),
		'set_featured_image'    => __( 'Set featured image', 'inmobiliariadelasierras' ),
		'remove_featured_image' => __( 'Remove featured image', 'inmobiliariadelasierras' ),
		'use_featured_image'    => __( 'Use as featured image', 'inmobiliariadelasierras' ),
		'insert_into_item'      => __( 'Insert into item', 'inmobiliariadelasierras' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'inmobiliariadelasierras' ),
		'items_list'            => __( 'Items list', 'inmobiliariadelasierras' ),
		'items_list_navigation' => __( 'Items list navigation', 'inmobiliariadelasierras' ),
		'filter_items_list'     => __( 'Filter items list', 'inmobiliariadelasierras' ),
	);
	$args = array(
		'label'                 => __( 'Post Type', 'inmobiliariadelasierras' ),
		'description'           => __( 'Post Type Description', 'inmobiliariadelasierras' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-quote',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'noveades', $args );

}
add_action( 'init', 'post_novedades', 0 );

}