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
function soporte_plantilla()
{
	add_theme_support(
		'align-wide',
		'caption',
		'editor-color-palette',
		'editor-font-sizes',
		'editor-styles',
		'featured-content',
		'gallery',
		'html5',
		'post-thumbnails',
		'search-form',
		'title-tag',
		'widgets',
		'widgets-block-editor',
	);

	// Soporte al logo
	add_theme_support( 'custom-logo', array(
		'width'					=> 295,
		'height'				=> 93,
		'header-text'			=> array( 'site-title', 'site-description' ),
		'flex-width'			=> true,
        'flex-height'			=> true,
		'unlink-homepage-logo'	=> true,
	) );

	// Background personalizado
	$defaults = array(
		'default-image'          => '',
		'default-preset'         => 'default', // 'default', 'fill', 'fit', 'repeat', 'custom'
		'default-position-x'     => 'left',    // 'left', 'center', 'right'
		'default-position-y'     => 'top',     // 'top', 'center', 'bottom'
		'default-size'           => 'cover',    // 'auto', 'contain', 'cover'
		'default-repeat'         => 'repeat',  // 'repeat-x', 'repeat-y', 'repeat', 'no-repeat'
		'default-attachment'     => 'scroll',  // 'scroll', 'fixed'
		'default-color'          => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-background', $defaults );
}
add_action('after_setup_theme', 'soporte_plantilla');


// Registro de estilos y scripts
function assets()
{
	$css_bootstrap_url = get_stylesheet_directory_uri() . '/css/bootstrap.min.css';
	$js_bootstrap_url = get_stylesheet_directory_uri() . '/js/bootstrap.bundle.min.js';

	wp_register_style('boostrap', $css_bootstrap_url, '', '5.3.2', 'all' );
	wp_enqueue_style('estilos', get_stylesheet_uri(), array('boostrap'), '2.0', 'all');

	wp_enqueue_script('boostraps', $js_bootstrap_url, array('jquery'), '5.3.2', true);
	wp_enqueue_script('inmobiliariadelassierras', get_template_directory_uri() . '/js/inmobiliariadelassierras.js', '', '2.0', true);
}
add_action('wp_enqueue_scripts', 'assets');
