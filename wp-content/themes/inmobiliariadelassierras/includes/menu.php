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






?>