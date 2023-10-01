<?php
// Desactiva cosas innecesarias
require_once "includes/desactivador.php";

// Regenerar los thumbnails
require_once "includes/regenerate-thumbnails.php";

// Pie de página, favicon en el backoffice
require_once "includes/soporte-backoffice.php";

// Soporte a menús
require_once "includes/menu.php";

// Minificación
// require_once "includes/minificacion.php";

// Urls relativas
require_once "includes/url-relativas.php";

// Soporte a títulos
function init_template()
{
	add_theme_support('title-tag');
}
add_action('after_setup_theme', 'init_template');

// Registro de estilos y scripts

function assets()
{
	$css_bootstrap_url = get_stylesheet_directory_uri() . '/css/bootstrap.min.css';
	$js_bootstrap_url = get_stylesheet_directory_uri() . '/js/bootstrap.bundle.min.js';

	wp_register_style('boostrap', $css_bootstrap_url, '', '2.0', 'all' );
	wp_enqueue_style('estilos', get_stylesheet_uri(), array('boostrap'), '2.0', 'all');

	wp_enqueue_script('boostraps', $js_bootstrap_url, array('jquery'), '5.3.2', true);
	wp_enqueue_script('custom', get_template_directory_uri().'/js/custom.js', '', '2.0', true);
}
add_action('wp_enqueue_scripts', 'assets');
?>