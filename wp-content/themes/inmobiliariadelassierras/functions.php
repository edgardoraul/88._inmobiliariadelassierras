<?php
// Desactiva cosas innecesarias
require_once "includes/desactivador.php";

// Las miniaturas
require_once "includes/thumbnails.php";

// Regenerar los thumbnails
require_once "includes/regenerate-thumbnails.php";

// Pie de página, favicon en el backoffice
require_once "includes/soporte-backoffice.php";

// Soporte a menús
require_once "includes/menu.php";

// Walker para los menús de bootstrap
require_once "includes/walker.php";

// Minificación
// require_once "includes/minificacion.php";

// Breadcrumb
require_once "includes/breadcrumb.php";

// Urls relativas
// require_once "includes/url-relativas.php";

// Paginación
require_once "includes/paginacion.php";

// Soporte al slider
require_once "includes/slider.php";

// Taxonomía
// require_once "includes/novedades.php";

// Limitar el exerpt
function limitar_exerpt() {
	return 20;
}
add_filter('excerpt_length', 'limitar_exerpt');

// Sin imagen en modo función
function sin_imagen() {
	echo '<img src="' . get_stylesheet_directory_uri() . '/img/no-img.png" alt="img" class="figure-img img-thumbnail rounded w-100" />';
}
function sin_imagen2() {
	echo '<img src="' . get_stylesheet_directory_uri() . '/img/img.png" alt="img2" class="figure-img img-thumbnail rounded" />';
}

function texto_capilla() {
	_e('Texto capilla de ejemplo.', 'inmobiliariadelassierras');
}

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
	$css_bootstrap_icons_url = get_stylesheet_directory_uri() . '/css/bootstrap-icons.css';
	$js_bootstrap_url = get_stylesheet_directory_uri() . '/js/bootstrap.bundle.min.js';

	wp_register_style('bootstrap', $css_bootstrap_url, '', '5.3.2', 'all' );
	wp_enqueue_style('estilos', get_stylesheet_uri(), array('bootstrap'), '2.0', 'all');

	wp_register_style('bootstrap-iconos', $css_bootstrap_icons_url, '', '1.11.1', 'all' );
	wp_enqueue_style('iconos', get_stylesheet_uri(), array('bootstrap-iconos'), '2.0', 'all');

	wp_enqueue_script('bootstrap', $js_bootstrap_url, array('jquery'), '5.3.2', true);
	wp_enqueue_script('inmobiliariadelassierras', get_template_directory_uri() . '/js/inmobiliariadelassierras.js', '', '2.0', true);
}
add_action('wp_enqueue_scripts', 'assets');


// Probando los metaboxes
require_once "includes/meta-box/meta-box.php";
require_once "includes/demo.php";

// Metaboxes viejos
// require_once "includes/additional_functions.php";

// Metabox de galería de imágenes
// require_once "includes/mostrar_miniaturas_galeria_metabox.php";
// require_once "includes/pasaje_galeria.php";

// Soporte de mapas
// require_once "includes/mapas.php";

// Funciones de SEO
require_once "includes/seo.php";

// Cargar Panel de Opciones
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/includes/' );
	require_once dirname( __FILE__ ) . '/includes/options-framework.php';
}
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function()
{
	jQuery('#example_showhidden').click(function()
	{
		jQuery('#section-example_text_hidden').fadeToggle(400);
	});
	if (jQuery('#example_showhidden:checked').val() !== undefined)
	{
		jQuery('#section-example_text_hidden').show();
	}
});
</script>
<?php };

