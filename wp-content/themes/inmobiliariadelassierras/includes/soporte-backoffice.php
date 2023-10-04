<?php
// Modifica el pie de página del panel de administarción
function remove_footer_admin()
{
	echo __('Desarrollado por', 'inmobiliariadelassierras') . ' <a title="'.__('WebModerna | Estudio Contable y Agencia Web', 'inmobiliariadelassierras') . '" href="https://webmoderna.com.ar" target="_blank"> <img title="'.__('WebModerna | Estudio Contable y Agencia Web', 'inmobiliariadelassierras') .'" src="' . get_stylesheet_directory_uri() . '/img/webmoderna.png" width="140" style="display:inline-block;vertical-align:middle;" alt="'.__('WebModerna | Estudio Contable y Agencia Web', 'inmobiliariadelassierras') .'" /></a>';
};
add_filter('admin_footer_text', 'remove_footer_admin');

// Agregando un favicon al área de administración
function admin_favicon()
{
	echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_stylesheet_directory_uri() . '/img/favicon.ico" />';
}
add_action('admin_head', 'admin_favicon', 1);


// Personalizar el Logotipo en el ingreso
function inmobiliariadelassierras_login() {
	// Un logotipo predeterminado
	$logo_url = get_theme_file_uri('img/logo.png');
	$background_url = get_theme_file_uri('img/background.jpg');
	
	/*
		Utilizo un operador ternario. Si no tiene un logo personalizado, muestro uno por defecto.
		Background: idem.
	*/

	?>
	<link rel="icon" href="<?php echo get_theme_file_uri();?>/img/favicon.ico" />
	<style type="text/css">
		.login {
			background: url(<?php echo $background_url;?>) top left no-repeat;
			background-size: cover;
		}

		#login h1 a,
		.login h1 a {
			background: url(<?php echo $logo_url;?>) top left no-repeat;
			background-size: cover;
			border-radius: 5px;
			box-shadow: 3px 3px 3px #454723;
			height: 93px;
			width: 317px;
		}
	</style>

<?php }
add_action('login_enqueue_scripts', 'inmobiliariadelassierras_login');

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );


?>