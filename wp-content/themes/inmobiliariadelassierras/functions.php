<?php
// Desactiva cosas innecesarias
require_once "includes/desactivador.php";

// Regenerar los thumbnails
require_once "includes/regenerate-thumbnails.php";

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



?>