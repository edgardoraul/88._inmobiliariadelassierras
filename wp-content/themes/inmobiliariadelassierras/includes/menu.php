<?php
// Soporte de menus
function menu_principal() {
	register_nav_menu ( 'primary_menu', __( 'Menú Principal', 'inmobiliariadelassierras' ) );
}
add_action( 'after_setup_theme', 'menu_principal' );


function menu_secundario() {
	register_nav_menu ( 'second_menu', __( 'Menú Secundario', 'inmobiliariadelassierras' ) );
}
add_action( 'after_setup_theme', 'menu_secundario' );


function add_additional_class_on_li($classes, $item, $args) {
	if(isset($args->add_li_class)) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

