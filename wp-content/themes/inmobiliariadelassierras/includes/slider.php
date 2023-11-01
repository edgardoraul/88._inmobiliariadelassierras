<?php
if ( ! function_exists('pt_carrusel') ) {

	// Register Custom Post Type
	function pt_carrusel() {

		$labels = array(
			'name'                  => _x( 'Diapositivas', 'Post Type General Name', 'inmobiliariadelasierras' ),
			'singular_name'         => _x( 'Diapositiva', 'Post Type Singular Name', 'inmobiliariadelasierras' ),
			'menu_name'             => __( 'Carrusel', 'inmobiliariadelasierras' ),
			'name_admin_bar'        => __( 'Carrusel', 'inmobiliariadelasierras' ),
			'archives'              => __( 'Diapositiva', 'inmobiliariadelasierras' ),
			'attributes'            => __( 'Atributos del item', 'inmobiliariadelasierras' ),
			'parent_item_colon'     => __( 'Item superior', 'inmobiliariadelasierras' ),
			'all_items'             => __( 'Todas las diapositivas', 'inmobiliariadelasierras' ),
			'add_new_item'          => __( 'Agregar una diapositiva', 'inmobiliariadelasierras' ),
			'add_new'               => __( 'Agregar una nueva', 'inmobiliariadelasierras' ),
			'new_item'              => __( 'Nueva diapositiva', 'inmobiliariadelasierras' ),
			'edit_item'             => __( 'Editar diapositiva', 'inmobiliariadelasierras' ),
			'update_item'           => __( 'Actualizar diapositiva', 'inmobiliariadelasierras' ),
			'view_item'             => __( 'Ver diapositiva', 'inmobiliariadelasierras' ),
			'view_items'            => __( 'Ver las diapositivas', 'inmobiliariadelasierras' ),
			'search_items'          => __( 'Buscar diapositiva', 'inmobiliariadelasierras' ),
			'not_found'             => __( 'No hay ninguna', 'inmobiliariadelasierras' ),
			'not_found_in_trash'    => __( 'No hay ninguna en la papelera', 'inmobiliariadelasierras' ),
			'featured_image'        => __( 'Imagen de la diapositiva', 'inmobiliariadelasierras' ),
			'set_featured_image'    => __( 'Subir imagen', 'inmobiliariadelasierras' ),
			'remove_featured_image' => __( 'Remover imagen', 'inmobiliariadelasierras' ),
			'use_featured_image'    => __( 'Usar una imagen', 'inmobiliariadelasierras' ),
			'insert_into_item'      => __( 'Insertar adentro del item', 'inmobiliariadelasierras' ),
			'uploaded_to_this_item' => __( 'Subido a este item', 'inmobiliariadelasierras' ),
			'items_list'            => __( 'Lista de items', 'inmobiliariadelasierras' ),
			'items_list_navigation' => __( 'Listado de navegacion de items', 'inmobiliariadelasierras' ),
			'filter_items_list'     => __( 'Filtrar listado de items', 'inmobiliariadelasierras' ),
		);
		$args = array(
			'label'                 => __( 'Diapositiva', 'inmobiliariadelasierras' ),
			'description'           => __( 'Carrusel de imágenes', 'inmobiliariadelasierras' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 20,
			'menu_icon'             => 'dashicons-images-alt2',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'query_var'             => 'pt_slider',
			'rewrite'               => false,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
			'rest_base'             => 'carrusel',
			'rest_controller_class' => 'diapositiva',
		);
		register_post_type( 'pt_carrusel', $args );

	}
	add_action( 'init', 'pt_carrusel', 0 );

	}

?>