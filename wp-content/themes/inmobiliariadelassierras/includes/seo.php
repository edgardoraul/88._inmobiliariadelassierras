<?php

/**
 * Funciones para configurar meta tags y opengraph en el head.
 */
function custom_seo_meta_tags()
{
	// Obtener el tipo de página actual
	$page_type = custom_get_page_type();
	error_log("Página actual: $page_type");

	// Configurar el título
	$title = custom_get_title($page_type);
	echo "<title>{$title}</title>\n";
	echo "<meta name='twitter:title' content='{$title}' />\n";

	// Configurar la descripción
	$description = custom_get_description($page_type);
	echo "<meta name='description' content='{$description}' />\n";
	echo "<meta name='twitter:description' content='{$description}' />\n";

	// Configurar las keywords
	$keywords = custom_get_keywords($page_type);
	echo "<meta name='keywords' content='{$keywords}' />\n";
	error_log("Palabras clave: $keywords");

	// Configurar opengraph
	custom_setup_opengraph($page_type);
}

/**
 * Obtener el tipo de página actual.
 */
function custom_get_page_type()
{
	if (is_page() || is_single()) {
		return 'post';
	} elseif (is_search()) {
		return 'search';
	} elseif (is_404()) {
		return '404';
	} elseif (is_archive()) {
		return 'archive';
	} elseif (is_category()) {
		return 'category';
	} elseif (is_tag()) {
		return 'tag';
	} elseif (is_tax()) {
		return 'tax';
	} else {
		return 'default';
	}
}

/**
 * Obtener el título de la página.
 */
function custom_get_title($page_type)
{
	$blog_name = get_bloginfo('name');
	$separator = ' - ';

	if ($page_type === 'post') {
		$title = get_the_title() . $separator . $blog_name;
	} elseif ($page_type === 'archive') {
		$title = get_the_title() . $separator . $blog_name;
	} elseif ($page_type === 'category') {
		$title = single_cat_title('', false) . $separator . $blog_name;
	} elseif ($page_type === 'tag') {
		$title = single_tag_title() . $separator . $blog_name;
	} elseif ($page_type === 'tax') {
		$title = single_term_title('', false) . $separator . $blog_name;
	} else {
		$title = $blog_name . $separator . get_bloginfo('description');
	}

	error_log("Título: $title");
	return $title;
}

/**
 * Obtener la descripción de la página.
 */
function custom_get_description($page_type)
{
	if ($page_type === 'post') {
		$description = rwmb_meta('meta_paginas_meta_descripcion', '');
	} else {
		$description = of_get_option('meta_description', '');
	}

	error_log("Descripción: $description");
	return $description;
}

/**
 * Obtener las keywords de la página.
 */
function custom_get_keywords($page_type)
{
	if ($page_type === 'post') {
		$keywords = rwmb_meta('meta_paginas_meta_keywords', '');
	} else {
		$keywords = of_get_option('meta_keywords2', '');
	}

	error_log("Palabras clave: $keywords");
	return $keywords;
}

/**
 * Configurar opengraph de acuerdo al tipo de página.
 */
function custom_setup_opengraph($page_type)
{
	// Para los casos
	if ($page_type === 'post') {
		$image_url = get_the_post_thumbnail_url(null, 'large');
	} elseif ($page_type === 'archive' || $page_type === 'category' || $page_type === 'tag' || $page_type === 'tax') {
		$first_post = new WP_Query('posts_per_page=1');
		$image_url = get_the_post_thumbnail_url($first_post->post->ID, 'large');
		wp_reset_postdata();
	} else {
		$image_url = get_template_directory_uri() . '/img/screenshot.png';
	}

	if ($image_url) {
		echo "<meta property='og:image' content='{$image_url}' />\n";
		echo "<meta name='twitter:image' content='{$image_url}' />\n";
		echo "<meta property='og:image:secure_url' content='{$image_url}' />\n";
		echo "<meta name='twitter:card' content='{$image_url}' />\n";
	}

	error_log("Imagen URL: $image_url");
}

// Añadir las funciones al hook wp_head
add_action('wp_head', 'custom_seo_meta_tags');
