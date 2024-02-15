<?php
// Verifica que WordPress esté cargado.
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

// Carga el archivo wp-load.php para acceder al núcleo de WordPress.
require_once( ABSPATH . '/wp-load.php' );

// Obtener todas las entradas con datos en el campo "galeria".
$args = array(
    'post_type'      => 'post', // Cambia 'post' al tipo de entrada que estés utilizando si es diferente.
    'posts_per_page' => -1,
    'meta_query'     => array(
        array(
            'key'     => 'galeria', // Nombre del campo personalizado.
            'compare' => 'EXISTS', // Verificar si el campo existe.
        ),
    ),
);
$posts_with_gallery = new WP_Query( $args );

// Procesar las imágenes y exportarlas.
if ( $posts_with_gallery->have_posts() ) {
    while ( $posts_with_gallery->have_posts() ) {
        $posts_with_gallery->the_post();

        // Obtener las imágenes del campo "galeria".
        $gallery_images = get_post_meta( get_the_ID(), 'galeria', true );

        echo "<pre>".var_dump($gallery_images)."</pre>";

        // Verificar si hay imágenes.
        if ( ! empty( $gallery_images ) ) {
            foreach ( $gallery_images as $image_url ) {
                // Procesar y exportar las imágenes según tus necesidades.
                // Por ejemplo, podrías copiar las imágenes a una carpeta específica.
                $image_data = file_get_contents( $image_url );
                $image_name = basename( $image_url );
                file_put_contents( ABSPATH . '/pruebas/' . $image_name, $image_data );
            }
        }
    }
    wp_reset_postdata(); // Restaurar los datos de la consulta original.
}
