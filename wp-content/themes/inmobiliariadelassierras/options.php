<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
/*function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}*/
function optionsframework_option_name()
{

	// Nombre de la plantilla
	$themename = wp_get_theme();
	$themename = preg_replace("/W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */


function optionsframework_options()
{
	// Almacenamos las páginas de wordpress
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = __('Seleccione una página de destino', 'options_framework_theme');
	foreach ($options_pages_obj as $page)
	{
		$options_pages[$page->ID] = $page->post_title;
	}


	//Pestaña Configuración general
	$options[]	=	array(
	'name'	=>	__('Configuración General', 'options_framework_theme'),
	'type'	=>	'heading');


	// Titular del Portfolio de la home
	$options[]	=	array(
		'name'			=>	__('Titular secundario en el encabezado', 'options_framework_theme'),
		'desc'			=>	__('Introduca un titular.', 'options_framework_theme'),
		'id'			=>	'portfolio_home',
		'placeholder'	=>	'Titular de ejemplo...',
		'class'			=>	'',
		'type'			=>	'text',
	);

	/* // Contenido o mensaje para el porfolio de la home
	$options[]	=	array(
		'name'			=>	__('Mensaje para el porfolio de la home', 'options_framework_theme'),
		'desc'			=>	__('Introduzca un contenido o mensaje para el porfolio de la home.', 'options_framework_theme'),
		'id'			=>	'contenido_portfolio_home',
		'placeholder'	=>	'Contenido de ejemplo...',
		'class'			=>	'',
		'type'			=>	'textarea'
	); */

	// Imagen del mensaje 1
	$options[] = array(
		'name'			=>	__('Cartel, imagen u otro logo', 'options_check'),
		'desc'			=>	__('Selecciona una imagen de 600px por 300px.', 'options_check'),
		'id'			=>	'header_logo',
		'type'			=>	'upload',
	);

	// Meta: keywords
	$options[]	=	array(
		'name'			=>	__('Meta: Palabras claves', 'options_framework_theme'),
		'desc'			=>	__('Introducir palabras (separadas por comas) claves de la web que son útiles para algunos buscadores. Muy importantes para SEO. Máximo 160 caracteres.', 'options_framework_theme'),
		'id'			=>	'meta_keywords2',
		'placeholder'	=>	'palabra1, palabra2, palabra3...',
		'class'			=>	'',
		'type'			=>	'text',
	);

	// Meta: Descripción
	$options[]	=	array(
		'name'			=>	__('Meta: Descripción de la web', 'options_framework_theme'),
		'desc'			=>	__('Introducir una descripción breve acerca de lo que trata esta web. Muy importante para el SEO. Máximo 160 caracteres.', 'options_framework_theme'),
		'id'			=>	'meta_description',
		'placeholder'	=>	'Este sitio web está dedicado a la ...',
		'class'			=>	'',
		'type'			=>	'textarea',
	);

	// Google Analitics
	$options[]	=	array(
		'name'			=>	__('Google Analitycs', 'options_framework_theme'),
		'desc'			=>	__('Introduzca el script de Google Analitycs.', 'options_framework_theme'),
		'id'			=>	'google_analitycs',
		'placeholder'	=>	'var _gaq = _gaq || []; _gaq.push(["_setAccount", "UA-40089469-1"]); _gaq.push(["_trackPageview"]); etc...',
		'class'			=>	'',
		'type'			=>	'textarea'
	);


	/*====================================================================================*/
	/* =================== Pestaña información de contacto ============================== */
	$options[]	=	array(
	'name'	=>	__('Redes Sociales', 'options_framework_theme'),
	'type'	=>	'heading' );

	// Facebook
	$options[] = array(
		'name'			=>	__('Facebook', 'options_framework_theme'),
		'desc'			=>	__('Introduzca el enlace a Facebook.', 'options_framework_theme'),
		'id'			=>	'facebook_contact',
		'class'			=>	'',
		'placeholder'	=>	'www.facebook.com/usuario',
		'type'			=>	'text'
	);


	// Twitter
	$options[] = array(
		'name' => __('Twitter X', 'options_framework_theme'),
		'desc' => __('Introduzca usuario de Twitter.', 'options_framework_theme'),
		'id' => 'twitter_contact',
		'placeholder' => '@twitter_usuario_x',
		'class' => '',
		'type' => 'text'
	);

	// Instagram
	$options[] = array(
		'name' => __('Instagram', 'options_framework_theme'),
		'desc' => __('Introduzca su usuario de Instagram.', 'options_framework_theme'),
		'id' => 'instagram_contact',
		'placeholder' => '@usuario_instagram',
		'class' => '',
		'type' => 'text'
	);

	// LinkedIn
	$options[] = array(
		'name' => __('LinkedIn', 'options_framework_theme'),
		'desc' => __('Introduzca su enlace al perfil de LinkedIn.', 'options_framework_theme'),
		'id' => 'linkedin_contact',
		'placeholder' => 'www.linkedin.com/usuario',
		'class' => '',
		'type' => 'text'
	);


	// Add This. Solo el enlace al script
	/*$options[] = array(
		'name' => __('Compartir en Redes Sociales', 'options_framework_theme'),
		'desc' => __('Introduzca el enlace a AddThis.', 'options_framework_theme'),
		'id' => 'add_this',
		'placeholder' => '<a class="addthis_button alignright" href="http://www.addthis.com/bookmark.php?v=250&amp;username=xa-4c8ff9282b8657a0">...',
		'class' => '',
		'type' => 'textarea'
	);*/


	/* para guardar los campos en variable y para mostrarlos con un condicional
	<ul>
		<?php
			if($tel_contact){echo "<li><strong>Teléfono:</strong>" . $tel_contact . "</li>";}
			if($email_contact){ echo "<li><strong>Email:</strong>" . $email_contact . "</li>";}
			if($dir_contact){ echo"<li><strong>Dirección:</strong>" . $dir_contact . "</li>";}
			if($cp_contact){echo"<li><strong>Cp:</strong>" . $cp_contact . "</li>";}
		?>
	</ul>

	*/

	/* ============================================================================== */
	/* Panel de la home page =========================================================*/
	$options[] = array(
	'name' => __('Datos de Contacto', 'options_framework_theme'),
	'type' => 'heading');

	// Email de contacto
	$options[] = array(
		'name' => __('E-mail de contacto', 'options_framework_theme'),
		'desc' => __('Introduzca el Email de contacto.', 'options_framework_theme'),
		'id' => 'email_web',
		'placeholder' => 'tu-mail@lo-que-sea.com.ar',
		'class' => '',
		'type' => 'text'
	);

	// Matrícula de contacto
	$options[] = array(
		'name' => __('Matrícula Profesional', 'options_framework_theme'),
		'desc' => __('Introduzca la Matrícula Profesional.', 'options_framework_theme'),
		'id' => 'matricula_contact',
		'placeholder' => 'MP-1234',
		'class' => 'mini',
		'type' => 'text'
	);

	// Teléfono Fijo
	$options[] = array(
		'name' => __('Teléfono Fijo', 'options_framework_theme'),
		'desc' => __('Introduzca su teléfono fijo incluyendo el código de área.', 'options_framework_theme'),
		'id' => 'telefono_fijo',
		'placeholder' => '0351-4882213',
		'class' => 'mini',
		'type' => 'text'
	);

	// WhatsApp
	$options[] = array(
		'name'			=>	__('WhatsApp', 'options_framework_theme'),
		'desc'			=>	__('Introduzca número de WhatsApp.', 'options_framework_theme'),
		'id'			=>	'celular_contact',
		'class'			=>	'mini',
		'placeholder'	=>	'543511234567',
		'type'			=>	'text'
	);


	// Calle y número
	$options[] = array(
		'name' => __('Dirección', 'options_framework_theme'),
		'desc' => __('Introduzca calle y número.', 'options_framework_theme'),
		'id' => 'direccion_web',
		'placeholder' => __('Calle 13 al 14, 15° 16.', 'options_framework_theme'),
		'class' => '',
		'type' => 'text'
	);

	// Código Postal
	$options[] = array(
		'name' => __('Código Postal', 'options_framework_theme'),
		'desc' => __('Introduzca código postal.', 'options_framework_theme'),
		'id' => 'cp_web',
		'placeholder' => __('5001', 'options_framework_theme'),
		'class' => 'mini',
		'type' => 'text'
	);

	// Ciudad o pueblucho
	$options[] = array(
		'name' => __('Ciudad o pueblo', 'options_framework_theme'),
		'desc' => __('Introduzca el pueblito o ciudad.', 'options_framework_theme'),
		'id' => 'ciudad_web',
		'placeholder' => __('Alaska Titas', 'options_framework_theme'),
		'class' => 'mini',
		'type' => 'text'
	);

	// Provincia
	$options[] = array(
		'name' => __('Provincia', 'options_framework_theme'),
		'desc' => __('Introduzca la provincia/partido/distrito/departamento.', 'options_framework_theme'),
		'id' => 'provincia_web',
		'placeholder' => __('Oruro', 'options_framework_theme'),
		'class' => 'mini',
		'type' => 'text'
	);

	// Lunes a viernes de 9 a 13 hs y de 16 a 20 hs sábados de 9 a 13 hs.
	// Días y horario de atención al público
	$options[] = array(
		'name' => __('Horario de atención', 'options_framework_theme'),
		'desc' => __('Introduzca los días de la semana y el horario de atención al público.', 'options_framework_theme'),
		'id' => 'horario_web',
		'placeholder' => __('Domingos a Martes; de 2 de la tarde a 14hs.', 'options_framework_theme'),
		'class' => '',
		'type' => 'text'
	);


	/* ============================================================================== */
	/* Panel de la home page =========================================================*/
	$options[] = array(
	'name'		=>	__('Mensajes, propagandas y banners.', 'options_framework_theme'),
	'type'		=>	'heading',
);

// =================================== MENSAJE 1

// Imagen del mensaje 1
$options[] = array(
	'name'			=>	__('Banner 1', 'options_check'),
	'desc'			=>	__('Selecciona una imagen de 600px por 300px.', 'options_check'),
	'id'			=>	'mensaje_1__imagen',
	'type'			=>	'upload',
);
/* // Imagen del mensaje 1
$options[] = array(
	'name'			=>	__('Mensaje 1', 'options_check'),
	'desc'			=>	__('Selecciona una imagen cuadrada de 600px por 600px', 'options_check'),
	'id'			=>	'mensaje_1__imagen_x2',
	'type'			=>	'upload',
); */

// Titular del mensaje 1
$options[] = array(
		'name'			=>	__('Título del Banner 1.', 'options_framework_theme'),
		'desc'			=>	__('Introduzca titular que se mostrará en el Banner 1.', 'options_framework_theme'),
		'id'			=>	'mensaje_1__titulo',
		'placeholder'	=> __('Título de ejemplo 1.', 'options_framework_theme'),
		'class'			=>	'',
		'type'			=>	'text',
	);

// Elegir la página al cual se enlazará el banner 1
$options[] = array(
	'name' => __('Redirección del banner N° 1', 'options_framework_theme'),
	'desc' => __('Elegir a cual página se enlazará el banner.', 'options_framework_theme'),
	'id' => 'enlace_boton_1',
	'std' => 'three',
	'type' => 'select',
	'class' => 'small', //mini
	'options' => $options_pages
	);

$options[] = array(
	'name'		=> '====================================================',
	'type'		=> 'info'
);
	/* // Campo de texto
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 7,
		'tinymce' => array( 'plugins' => 'wordpress, wplink' ),
	);
	// Contenido del Mensaje 1
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 7,
		'tinymce' => array( 'plugins' => 'wordpress, wplink' ),
	);
	$options[] = array(
		'name' => __('Contenido del Mensaje 1', 'options_framework_theme'),
		'desc' => __('Introduzca el contenido que se mostrará en el Mensaje 1.', 'options_framework_theme'),
		'id' => 'mensaje_1__contenido',
		'placeholder' => __('Contenido ...', 'options_framework_theme'),
		'class' => 'big',
		'type' => 'editor',
		'settings' => $wp_editor_settings,
	); */

	// ================================ MENSAJE 2
	// Imagen del Mensaje 2
	$options[] = array(
	'name'			=>	__('Banner 2', 'options_check'),
	'desc'			=>	__('Selecciona una imagen de 600px por 300px.', 'options_check'),
	'id'			=>	'mensaje_2__imagen',
	'type'			=>	'upload',
	);
	/* // Imagen del Mensaje 2
	$options[] = array(
	'name'			=>	__('Mensaje 2', 'options_check'),
	'desc'			=>	__('Selecciona una imagen cuadrada de 600px por 600px', 'options_check'),
	'id'			=>	'mensaje_2__imagen_x2',
	'type'			=>	'upload',
); */

// Titular del Mensaje 2
$options[] = array(
		'name'			=>	__('Título del Banner 2.', 'options_framework_theme'),
		'desc'			=>	__('Introduzca titular que se mostrará en el Banner 2.', 'options_framework_theme'),
		'id'			=>	'mensaje_2__titulo',
		'placeholder'	=> __('Título de ejemplo 2.', 'options_framework_theme'),
		'class'			=>	'',
		'type'			=>	'text',
	);

// Elegir la página al cual se enlazará el banner 2
$options[] = array(
	'name' => __('Redirección del banner N° 2', 'options_framework_theme'),
	'desc' => __('Elegir a cual página se enlazará el banner.', 'options_framework_theme'),
	'id' => 'enlace_boton_2',
	'std' => 'three',
	'type' => 'select',
	'class' => 'small', //mini
	'options' => $options_pages
	);

$options[] = array(
		'name'		=> '====================================================',
		'type'		=> 'info'
	);


	// =================================== MENSAJE 3
	// Imagen del Mensaje 3
	$options[] = array(
	'name'			=>	__('Banner 3', 'options_check'),
	'desc'			=>	__('Selecciona una imagen cuadrada de 600px por 300px.', 'options_check'),
	'id'			=>	'mensaje_3__imagen',
	'type'			=>	'upload',
	);
	// Imagen del Mensaje 3
	/* $options[] = array(
	'name'			=>	__('Mensaje 3', 'options_check'),
	'desc'			=>	__('Selecciona una imagen cuadrada de 600px por 600px', 'options_check'),
	'id'			=>	'mensaje_3__imagen_x2',
	'type'			=>	'upload',
); */

// Titular del Mensaje 3
$options[] = array(
	'name'			=>	__('Título del Banner 3.', 'options_framework_theme'),
	'desc'			=>	__('Introduzca un titular que se mostrará en el Banner 3.', 'options_framework_theme'),
		'id'			=>	'mensaje_3__titulo',
		'placeholder'	=> __('Título de ejemplo 3.', 'options_framework_theme'),
		'class'			=>	'',
		'type'			=>	'text',
	);

	// Enlace del Mensaje 3
	$options[] = array(
		'name' => __('URL Banner 3', 'options_framework_theme'),
		'desc' => __('Introduzca el enlace o URL de destino del banner 3.', 'options_framework_theme'),
		'id' => 'enlace_boton_3',
		'placeholder' => __('www.destino.com.ar', 'options_framework_theme'),
		'class' => '',
		'type' => 'text'
	);

	/*

	// =================================== MENSAJE 4
	// Imagen del Mensaje 4
	$options[] = array(
	'name'			=>	__('Mensaje 4', 'options_check'),
	'desc'			=>	__('Selecciona una imagen cuadrada de 300px por 300px.', 'options_check'),
	'id'			=>	'mensaje_4__imagen',
	'type'			=>	'upload',
	);
	// Imagen del Mensaje 4
	$options[] = array(
	'name'			=>	__('Mensaje 4', 'options_check'),
	'desc'			=>	__('Selecciona una imagen cuadrada de 600px por 600px', 'options_check'),
	'id'			=>	'mensaje_4__imagen_x2',
	'type'			=>	'upload',
	);

	// Titular del Mensaje 4
	$options[] = array(
		'name'			=>	__('Título del Mensaje 4.', 'options_framework_theme'),
		'desc'			=>	__('Introduzca un titular que se mostrará en el Mensaje 4.', 'options_framework_theme'),
		'id'			=>	'mensaje_4__titulo',
		'placeholder'	=> __('Título de ejemplo 4.', 'options_framework_theme'),
		'class'			=>	'',
		'type'			=>	'text',
	);

	// Contenido del Mensaje 4
	$options[] = array(
		'name' => __('Enlace, URL', 'options_framework_theme'),
		'desc' => __('Introduzca el enlace o URL de destino.', 'options_framework_theme'),
		'id' => 'mensaje_4__contenido',
		'placeholder' => __('www.destino.com.ar', 'options_framework_theme'),
		'class' => 'big',
		'type' => 'editor',
		'settings' => $wp_editor_settings,
	);
	// Desafectado por no usarse
	// Almacenamos las páginas de wordpress
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = __('Seleccione una página de destino', 'options_framework_theme');
	foreach ($options_pages_obj as $page)
	{
		$options_pages[$page->ID] = $page->post_title;
	}

	// Elegir la página al cual se enlazará el botón del E-Book 3
	$options[] = array(
		'name' => __('Redirección del botón N° 3', 'options_framework_theme'),
		'desc' => __('Elegir a cual página se enlazará el botón.', 'options_framework_theme'),
		'id' => 'enlace_boton_3',
		'std' => 'three',
		'type' => 'select',
		'class' => 'small', //mini
		'options' => $options_pages
		);

	// Elegir la página al cual se enlazará el botón principal
	$options[] = array(
		'name' => __('Redirección del botón N° 4', 'options_framework_theme'),
		'desc' => __('Elegir a cual página se enlazará el botón.', 'options_framework_theme'),
		'id' => 'enlace_boton_4',
		'std' => 'three',
		'type' => 'select',
		'class' => 'small', //mini
		'options' => $options_pages
		);
 */
	return $options;
}
