<?php
/**
 * Funciones para configurar meta tags y opengraph en el head.
 */
function custom_seo_meta_tags() {
    // Obtener el tipo de página actual
    $page_type = custom_get_page_type();

    // Configurar el título
    $title = custom_get_title($page_type);
    echo "<title>{$title}</title>\n";

    // Configurar la descripción
    $description = custom_get_description($page_type);
    echo "<meta name='description' content='{$description}' />\n";

    // Configurar las keywords
    $keywords = custom_get_keywords($page_type);
    echo "<meta name='keywords' content='{$keywords}' />\n";

    // Configurar opengraph
    custom_setup_opengraph($page_type);
}

/**
 * Obtener el tipo de página actual.
 */
function custom_get_page_type() {
    if (is_home() || is_front_page()) {
        return 'home';
    } elseif (is_page() || is_single()) {
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
function custom_get_title($page_type) {
    if ($page_type === 'post') {
        return get_the_title() . " - " . get_bloginfo('name');
    }

    if ($page_type === 'archive') {
        return get_the_title() . " - " . get_bloginfo('name');
    }
    
    elseif ($page_type === 'category') {
        return single_cat_title() . " - " . get_bloginfo('name');
    }
    
    elseif ($page_type === 'tag') {
        return single_tag_title() . " - " . get_bloginfo('name');
    }

    elseif ($page_type === 'tax') {
        return get_taxonomy() . " - " . get_bloginfo('name');
    }
    
    else {
        return get_bloginfo('name'). " - " . get_bloginfo('description');
    }
}

/**
 * Obtener la descripción de la página.
 */
function custom_get_description($page_type) {
    if ($page_type === 'post') {
        return rwmb_meta('meta_paginas_meta_descripcion', '');
    } else {
        return of_get_option('meta_description', '');
    }
}

/**
 * Obtener las keywords de la página.
 */
function custom_get_keywords($page_type) {
    if ($page_type === 'post') {
        return rwmb_meta('meta_paginas_meta_keywords', '');
    } else {
        return of_get_option('meta_keywords2', '');
    }
}

/**
 * Configurar opengraph de acuerdo al tipo de página.
 */
function custom_setup_opengraph($page_type) {
    echo "<meta property='og:type' content='{$page_type}' />\n";

    if ($page_type === 'post') {
        $image_url = get_the_post_thumbnail_url(null, 'large');
    } elseif ($page_type === 'archive') {
        $first_post = new WP_Query('posts_per_page=1');
        $image_url = get_the_post_thumbnail_url($first_post->post->ID, 'large');
        wp_reset_postdata();
    } else {
        $image_url = get_template_directory_uri() . '/img/screenshot.png';
    }

    if ($image_url) {
        echo "<meta property='og:image' content='{$image_url}' />\n";
    }
}

// Añadir las funciones al hook wp_head
add_action('wp_head', 'custom_seo_meta_tags');
