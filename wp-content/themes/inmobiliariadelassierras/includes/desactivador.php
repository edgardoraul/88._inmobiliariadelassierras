<?php
/**  * Desactiva los emojis */
function desactiva_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'desactiva_emojis_tinymce' ); }
	add_action( 'init', 'desactiva_emojis' );

	/**  * Filtro que elimina el plugin de emojis de TinyMCE */
	function desactiva_emojis_tinymce( $plugins ) {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
			} else {
		return array();
	}
}

// Optimización Contact Form 7
function contactform_dequeue_scripts() {
	$load_scripts = false;
	if (is_singular()) {
		$post = get_post();

		if (has_shortcode($post->post_content, 'contact-form-7')) {
			$load_scripts = true;
		}
	}
	if (!$load_scripts) {
		wp_dequeue_script('contact-form-7');
		wp_dequeue_script('google-recaptcha');
		wp_dequeue_script('wpcf7-recaptcha');
		wp_dequeue_style('contact-form-7');
		wp_dequeue_style('wpcf7-recaptcha');
	}
}
add_action( 'wp_enqueue_scripts', 'contactform_dequeue_scripts', 99 );


// Para hacer posible que esta plantilla pueda cambiar de idioma
load_theme_textdomain( 'inmobiliariadelassierras', TEMPLATEPATH . '/language' );
$locale = get_locale();
$locale_file = TEMPLATEPATH . "/language/$locale.php";
if( is_readable( $locale_file ) ) require_once( $locale_file );


// Detén las adivinanzas de URLs de WordPress
add_filter( 'redirect_canonical', 'stop_guessing' );
function stop_guessing( $url )
{
	if( is_404() )
	{
		return false;
	}
	return $url;
}


// Ocultar los errores en la pantalla de Inicio de sesión de WordPress
function no__rrors_please()
{
	return __( '¡Sal de mi jardín! ¡AHORA MISMO!', 'inmobiliariadelassierras' );
};
add_filter( 'login__rrors', 'no__rrors_please' );


// Eliminar palabras cortas de URL
function remove_short_words( $slug )
{
	if ( !is_admin() ) return $slug;
	$slug = explode( '-', $slug );
	foreach  ($slug as $k => $word )
	{
		if ( strlen( $word ) < 3 )
		{
			unset( $slug[$k] );
		}
	}
	return implode( '-', $slug );
};
add_filter( 'sanitize_title', 'remove_short_words' );


// Acortar títulos en todos los posts en el momento de la carga
function titulolargo( $title )
{
	global $post;
	$title = $post->post_title;
	if ( str_word_count( $title ) >= 12 ) //aqui definimos el máximo de palabras permitidas
	wp_die( __( 'Error: tu título sobrepasa el máximo de palabras razonable, vuelve atrás y mejóralo, tus lectores te lo agradecerán.', 'inmobiliariadelassierras' ) );
}
add_action( 'publish_post', 'titulolargo' );


// REMOVE GUTENBERG BLOCK LIBRARY CSS FROM LOADING ON FRONTEND
function remove_wp_block_library_css() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-block-style' ); // REMOVE WOOCOMMERCE BLOCK CSS
	wp_dequeue_style( 'global-styles' ); // REMOVE THEME.JSON
}
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );


// Remover clases e ids automáticos de los menúes
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
	return is_array($var) ? array_intersect($var, array('current-menu-item', 'current_page_item')) : '';
};
?>