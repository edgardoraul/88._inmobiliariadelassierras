<?php
function register_tax() {
	$args = array(
		'hierachical'	=> true,
		'labels'		=> array(
			'name'				=> __('Clasificaciones de las propiedades', 'inmobiliariadelassierras'),
			'singular_name'		=> __('Clasificación de la propiedad', 'inmobiliariadelassierras'),
			),
		'show_in_menu'		=> true,
		'show_admin_column'	=> true,
		'rewrite'			=> array( 'slug'		=> 'clasificacion-propiedad' )
	);
	register_taxonomy( 'clasificacion-propiedad', array( 'post' ) );
}
// add_action('init', 'register_tax');



if ( ! function_exists( 'category' ) ) {

	// Register Custom Taxonomy
	function category() {

		$labels = array(
			'name'                       => _x( 'Clasificaciones de las Propiedades', 'Taxonomy General Name', 'inmobiliariadelasierras' ),
			'singular_name'              => _x( 'Clasificación de la Propiedad', 'Taxonomy Singular Name', 'inmobiliariadelasierras' ),
			'menu_name'                  => __( 'Categoría', 'inmobiliariadelasierras' ),
			'all_items'                  => __( 'All Items', 'inmobiliariadelasierras' ),
			'parent_item'                => __( 'Parent Item', 'inmobiliariadelasierras' ),
			'parent_item_colon'          => __( 'Parent Item:', 'inmobiliariadelasierras' ),
			'new_item_name'              => __( 'New Item Name', 'inmobiliariadelasierras' ),
			'add_new_item'               => __( 'Add New Item', 'inmobiliariadelasierras' ),
			'edit_item'                  => __( 'Edit Item', 'inmobiliariadelasierras' ),
			'update_item'                => __( 'Update Item', 'inmobiliariadelasierras' ),
			'view_item'                  => __( 'View Item', 'inmobiliariadelasierras' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'inmobiliariadelasierras' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'inmobiliariadelasierras' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'inmobiliariadelasierras' ),
			'popular_items'              => __( 'Popular Items', 'inmobiliariadelasierras' ),
			'search_items'               => __( 'Search Items', 'inmobiliariadelasierras' ),
			'not_found'                  => __( 'Not Found', 'inmobiliariadelasierras' ),
			'no_terms'                   => __( 'No items', 'inmobiliariadelasierras' ),
			'items_list'                 => __( 'Items list', 'inmobiliariadelasierras' ),
			'items_list_navigation'      => __( 'Items list navigation', 'inmobiliariadelasierras' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
		);
		register_taxonomy( 'category', array( 'post' ), $args );

	}
	add_action( 'init', 'category', 0 );

	}
?>